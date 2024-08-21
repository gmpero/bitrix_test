<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Errorable;
use \Bitrix\Main\Engine\Contract\Controllerable;
use \Bitrix\Main\Error;
use \Bitrix\Main\ErrorCollection;
use \Bitrix\Main\Application;
use \Bitrix\Main\Data\Cache;
use \Bitrix\Main\Data\TaggedCache;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Highloadblock\HighloadBlockTable;
use \Bitrix\Main\Engine\ActionFilter;

class AgentsList extends CBitrixComponent implements Controllerable, Errorable
{
    protected ErrorCollection $errorCollection;
    protected Cache $cache;
    protected TaggedCache $taggedCache;
    protected int $cacheTime;
    protected bool $cacheInvalid;
    protected string $cacheKey;
    protected string $cachePatch;

    /**
     * Получение ошибок
     */
    final public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    final public function getErrorByCode($code): Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    /**
     * Добавление ошибки
     */
    private function addError(Error $error): void
    {
        $this->errorCollection[] = $error;
    }

    /**
     * Добавление ошибок
     */
    private function addErrors(array $errors): void
    {
        $this->errorCollection->add($errors);
    }

    /**
     * Вывод ошибок в публичке
     */
    private function showErrors(): bool
    {
        if (count($this->getErrors())) {
            foreach ($this->getErrors() as $error) {
                if ((int)$error->getCode() === 404) {
                    ShowError($error->getMessage());
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Обязательный метод, запускается всегда при загрузки класса, используется для проверки Параметров
     */
    final public function onPrepareComponentParams($arParams): array
    {
        $this->initCache($arParams); // создание параметров для работы кеша


        // Проверка подключение модуля highloadblock, отдать ошибку если модуль не подключен
        if (!Loader::includeModule('highloadblock')) {
            $this->addError(
                new Error(Loc::getMessage('MCART_AGENTS_LIST_MODULE_NOT_INSTALLED', ['#MODULE#' => 'highloadblock']), 404)
            );
        }


        /*
         * Нужно проверить, что заданы значения в $arParams "Время кеширования" и "Количество элементов"
         * Если не заданы, то указать дефолтные значения
         */
        $arParams["CACHE_TIME"] = $arParams["CACHE_TIME"] ?? 3600;
        $arParams["ELEMENTS_COUNT"] = $arParams["PAGE_SIZE"] ?? 10;


        return parent::onPrepareComponentParams($arParams);
    }

    private function initCache($arParams): void
    {
        $this->cacheInvalid = false;
        $this->errorCollection = new ErrorCollection();
        $this->cacheKey = self::class . '_' . md5(json_encode($arParams)) . '_' . md5(json_encode($_REQUEST)); // тут указывается от каких параметров зависит кэш
        $this->cachePatch = self::class; // директория для хранения файлов кеша

        $this->cache = Cache::createInstance();
        $this->taggedCache = Application::getInstance()->getTaggedCache();
    }

    final public function executeComponent(): void
    {
        if (empty($this->arParams["HLBLOCK_TNAME"])) {
            /**
             * Если параметр Название таблицы (TABLE_NAME) Highload-блока не задан,
             * нужно отдать ошибку (Loc::getMessage('MCART_AGENTS_LIST_NOT_HLBLOCK_TNAME')).
             * Пример как создать ошибку есть выше при проверки подключения модуля "highloadblock"
             */
            $this->addError(
                new Error(Loc::getMessage('MCART_AGENTS_LIST_NOT_HLBLOCK_TNAME'), 404)
            );
        }

        if ($this->showErrors()) {
            return;
        }

        // https://dev.1c-bitrix.ru/api_help/main/reference/cphpcache/initcache.php в данном компоненте используется Bitrix\Main\Data\Cache::initCache из нового ядра
        if ($this->cache->initCache(
            $this->arParams["CACHE_TIME"],
            $this->cacheKey,
            $this->cachePatch
        )) { // если кеш есть
            $this->arResult = $this->cache->getVars();
        } elseif ($this->cache->startDataCache()) { // если кеша нет
            $this->taggedCache->startTagCache($this->cachePatch); // старт для области, для тегированного кеша

            $this->arResult = []; // объявим результирующий массив

            $arHlblock = self::getHlblockTableName($this->arParams["HLBLOCK_TNAME"]); // получить хлблок по TABLE_NAME

            $this->taggedCache->registerTag('hlblock_table_name_' . $arHlblock['TABLE_NAME']); // Регистрируем кеш, чтобы по нему на событиях добавление/изменение/удаление элементов хлблока сбрасывать кеш компонента

            $entity = self::getEntityDataClassById($arHlblock); // получить класс для работы с хлблоком
            $arTypeAgents = self::getFieldListValue($arHlblock, 'UF_TYPE'); // получить массив со значениями списочного свойства Виды деятельности агентов
            $this->arResult = $this->getAgents($entity, $arTypeAgents); // получить массив со списком агентов и объектом для пагинации


            if ($this->cacheInvalid) {
                $this->taggedCache->abortTagCache();
                $this->cache->abortDataCache();
            }

            $this->taggedCache->endTagCache(); // конец области, для тегированого кеша
            $this->cache->endDataCache($this->arResult); // запись arResult в кеш
        }

        /*
         * Получить Избранных агентов для текущего пользователя записать их в массив $this->arResult['STAR_AGENTS']
         * Это можно зделать с помощью CUserOptions::GetOption
         * $this->arResult['STAR_AGENTS'] = CUserOptions::GetOption($category, $name);
         */
        $this->arResult['STAR_AGENTS'] = CUserOptions::GetOption('mcart.agents', 'favorites', []);
        /*
         * Данного метода нет в документации, код метода и его параметры можно найти в ядре (/bitrix/modules/main/) или в гугле
         * $category - это категория настройки, можете придумать любую, например mcart_agent
         * $name - это название настройки, например options_agents_star
         * Эти настройки храняться в таблице b_user_option
         */


        $this->IncludeComponentTemplate(); // вызов шаблона компонента
    }

    /**
     * Метод для получения данных хлблока по TABLE_NAME
     * @param string $hl_block_name - название таблицы хлблока
     * @return array
     */
    private static function getHlblockTableName(string $hl_block_name): array
    {
        if (empty($hl_block_name) || strlen($hl_block_name) < 1) {
            return [];
        }

        /*
         * Делаем запрос для получения данных хлблока по TABLE_NAME, используя HighloadBlockTable::getList
         * https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=5753
         */
        $result = HighloadBlockTable::getList([
            'filter' => [
                // Указать фильтр по полю "TABLE_NAME"
                '=TABLE_NAME' => $hl_block_name
            ],
        ]);

        if ($row = $result->fetch()) { // Получим результат запросв
            return $row;
        }


        return [];
    }

    /**
     * Метод для получения класса для работы с элементами хлблока
     * @param array $arHlblock - массив с данными хлблока
     * @return string
     */
    private static function getEntityDataClassById(array $arHlblock): string
    {
        if (empty($arHlblock)) {
            return '';
        }

        /*
         * Написать запрос для получения класса хлблока (нужно использовать getDataClass())
         * https://tichiy.ru/wiki/rabota-s-highload-blokami-bitriks-cherez-api-d7/
         */
        $entity = HighloadBlockTable::compileEntity($arHlblock);
        return $entity->getDataClass();

    }

    /**
     * Метод для получения значений списочного свойства
     * @param array $arHlblock - массив с данными хлобка (нужен ID хлобка)
     * @param string $fieldName - Код списочного свойства
     * @return array
     */
    private function getFieldListValue(array $arHlblock, string $fieldName): array
    {
        $result = [];

        //Получаем ID пользовательского поля, по его коду
        $fieldID = Bitrix\Main\UserFieldTable::getList([
            'filter' => [
                "ENTITY_ID" => "HLBLOCK_" . $arHlblock['ID'],
                "FIELD_NAME" => $fieldName,
            ],
        ])->Fetch()["ID"];

        if ($fieldID) {
            //Получить список свойств для $fieldID используя класс CUserFieldEnum
            $res = CUserFieldEnum::GetList(
                [],
                ['USER_FIELD_ID' => $fieldID['ID']]
            );
            while ($arRes = $res->fetch()) {
                $result[$arRes['ID']] = $arRes['VALUE'];
            }
        }

        return $result;
    }

    private function getActivityTypeName($activityTypeId)
    {
        $res = \CUserFieldEnum::GetList([], ['ID' => $activityTypeId]);

        if ($arEnum = $res->Fetch()) {
            return $arEnum['VALUE'];
        }

        return null; // если не найдено
    }

    /**
     * Метод для получения списка агентов
     * @param string $entity - класс хлблока
     * @param array $arTypeAgents - массив Видов деятельности агентов
     * @return array|array[]
     */
    private function getAgents(string $entity, array $arTypeAgents): array
    {
        $arAgents = [
            'NAV_OBJECT' => [], // для построения постраничной навигации
            'ITEMS' => [], // список агентов
        ];
        //var_dump($this->arParams);
        // Объек для для пагинации, подробнее можно почитать
        $nav = new \Bitrix\Main\UI\PageNavigation("nav-agents");
        $nav->allowAllRecords(true)
            ->setPageSize($this->arParams['ELEMENTS_COUNT']) //Нужно передать параметр Количество элементов из мввсива $this->arParams
            ->initFromUri();


        $rsAgents = $entity::GetList([
            /*
             * С помощью GetList запросить список "Активных" агентов,
             * в запросе ограничить количество агентов (использовать объект для пагинации)
             * https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2741
             */
            'order' => ['ID' => 'ASC'], // Устанавливаем порядок сортировки
            'filter' => ['UF_ACTIVE' => 1], // Фильтр для выбора только активных агентов
            'select' => ['ID', 'UF_*'], // Выбираем все пользовательские поля
            'count_total' => true, // Включаем подсчет общего количества элементов
            'offset' => $nav->getOffset(), // Устанавливаем смещение для пагинации
            'limit' => $nav->getLimit(), // Устанавливаем лимит для пагинации
        ]);


        while ($arAgent = $rsAgents->fetch()) {
            /**
             * Обработает полученный массив
             *
             * 1. В свойстве Вид деятельности записан ID значения списка,
             * с помощью массива $arTypeAgents определить значение
             */
            if (isset($arTypeAgents[$arAgent['UF_ACTIVITY_TYPE']])) {
                $arAgent['UF_ACTIVITY_TYPE_NAME'] = $arTypeAgents[$arAgent['UF_ACTIVITY_TYPE']];
            }
            /*
             * 2. В свойстве Фото записан ID файла из таблицы b_file,
             * если значение есть, то получить путь через класс \CFile
             */
            if (!empty($arAgent['UF_PHOTO'])) {
                $arAgent['UF_PHOTO_SRC'] = \CFile::GetPath($arAgent['UF_PHOTO']);
            }
            if (isset($arAgent['UF_ACTIVITY_TYPE'])) {
                // Получаем название вида деятельности
                $arAgent['UF_ACTIVITY_TYPE_NAME'] = $this->getActivityTypeName($arAgent['UF_ACTIVITY_TYPE']);
            }

            $arAgents['ITEMS'][$arAgent['ID']] = $arAgent; // Записываем получившийся массив в $arAgents['ITEMS']
        }

        $nav->setRecordCount($rsAgents->getCount()); // В объект для пагинации передаем общее количество агентов
        $arAgents['NAV_OBJECT'] = $nav; // Записываем получившийся объект в $arAgents['NAV_OBJECT']

        return $arAgents; // Возвращаем результат
    }



    // Далее код для ajax, к нему можно вернуться после внедрения верски и js
    /**
     * Конфигурация событий для ajax
     */
    final public function configureActions(): array
    {
        return [
            'clickStar' => [
                'prefilters' => [
                    new ActionFilter\Authentication(),
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ]
            ],
        ];
    }

    /**
     * Метод для изменения избранных агентов через ajax
     * @param $agentID - ID элемента агента
     * @return array|string[]
     */
    public function clickStarAction($agentID)
    {
        $result = []; // ответ, который уйдет на фронт

        // 1. Получить значения свойства из настроек пользователя (CUserOptions) для текущего пользователя
        $value = CUserOptions::GetOption("mcart.agents", "favorites", []);

        // 2. Если значение есть, то
        if ($value) {
            // 2.1. Проверить, что значение массив, если нет, то сделать массивом
            if (!is_array($value)) {
                $value = [$value];
            }

            // 2.2. Проверить, есть ли в массиве $agentID
            $key = array_search($agentID, $value);
            if ($key !== false) {
                // 2.2.3. Если есть, удалить из массива
                unset($value[$key]);
                $result['status'] = 'removed';
            } else {
                // 2.2.4. Если нет, добавить в массив
                $value[] = $agentID;
                $result['status'] = 'added';
            }
        } else {
            // 3. Если значения нет, создаем новый массив с текущим ID
            $value = [$agentID];
            $result['status'] = 'added';
        }

        // 4. Сохранить обновленный массив в настройки пользователя
        CUserOptions::SetOption("mcart.agents", "favorites", $value);

        // 5. Вернуть статус операции и обновленный массив на фронт
        $result['favorites'] = $value;

        return $result;
    }


}

