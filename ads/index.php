<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$APPLICATION->SetTitle("Объявления");
//print_r( $_GET);
?>


<? if (empty($_GET)): ?>
    <div class="pt-5">
        <div class="container">
            <form class="row">

                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                            <option value="">Lot Area</option>
                            <option value="1000">1000</option>
                            <option value="800">800</option>
                            <option value="600">600</option>
                            <option value="400">400</option>
                            <option value="200">200</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                            <option value="">Property Status</option>
                            <option value="For Sale">For Sale</option>
                            <option value="For Rent">For Rent</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                            <option value="">Location</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Canada">Canada</option>
                            <option value="Belgium">Belgium</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                            <option value="">Lot Area</option>
                            <option value="1000">1000</option>
                            <option value="800">800</option>
                            <option value="600">600</option>
                            <option value="400">400</option>
                            <option value="200">200</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                            <option value="">Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5+">5+</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                            <option value="">Bathrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5+">5+</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="mb-4">
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                               disabled=""/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0"
                           value="Search">
                </div>

            </form>


        </div>
    </div>
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <? endif; ?>
        <? $APPLICATION->IncludeComponent("bitrix:news", "news_ads", array(
            "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
            "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",    // Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
            "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
            "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",    // Учитывать права доступа
            "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
            "CACHE_TYPE" => "A",    // Тип кеширования
            "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
            "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
            "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
            "DETAIL_DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
            "DETAIL_FIELD_CODE" => array(    // Поля
                0 => "",
                1 => "",
            ),
            "DETAIL_PAGER_SHOW_ALL" => "Y",    // Показывать ссылку "Все"
            "DETAIL_PAGER_TEMPLATE" => "",    // Название шаблона
            "DETAIL_PAGER_TITLE" => "Страница",    // Название категорий
            "DETAIL_PROPERTY_CODE" => array(    // Свойства
                0 => "",
                1 => "",
                2 => "PREVIEW_PICTURE",
                3 => "PROPERTY_PRICE",
                4 => "PROPERTY_TOTAL_AREA",
                5 => "PROPERTY_FLOOR_COUNT",
                6 => "PROPERTY_BATHROOM_COUNT",
                7 => "PROPERTY_HAS_GARAGE",
                8 => "PROPERTY_IMAGE_GALLERY",

            ),
            "DETAIL_SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
            "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
            "DISPLAY_DATE" => "Y",    // Выводить дату элемента
            "DISPLAY_NAME" => "Y",    // Выводить название элемента
            "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "5",    // Инфоблок
            "IBLOCK_TYPE" => "ads",    // Тип инфоблока
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
            "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
            "LIST_FIELD_CODE" => array(    // Поля
                0 => "CODE",
                1 => "NAME",
                2 => "PREVIEW_PICTURE",
                3 => "PROPERTY_PRICE",
                4 => "PROPERTY_TOTAL_AREA",
                5 => "PROPERTY_FLOOR_COUNT",
                6 => "PROPERTY_BATHROOM_COUNT",
                7 => "PROPERTY_HAS_GARAGE",
            ),
            "LIST_PROPERTY_CODE" => array(    // Свойства
                0 => "",
                1 => "",
            ),
            "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
            "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
            "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
            "NEWS_COUNT" => "9",    // Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
            "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",    // Название категорий
            "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
            "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
            "SET_STATUS_404" => "N",    // Устанавливать статус 404
            "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
            "SHOW_404" => "N",    // Показ специальной страницы
            "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела
            "USE_CATEGORIES" => "N",    // Выводить материалы по теме
            "USE_FILTER" => "N",    // Показывать фильтр
            "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
            "USE_RATING" => "N",    // Разрешить голосование
            "USE_REVIEW" => "N",    // Разрешить отзывы
            "USE_RSS" => "N",    // Разрешить RSS
            "USE_SEARCH" => "N",    // Разрешить поиск
            "USE_SHARE" => "N",    // Отображать панель соц. закладок
            "VARIABLE_ALIASES" => array(
                "ELEMENT_ID" => "ELEMENT_ID",
                "SECTION_ID" => "SECTION_ID",
            )
        ),
            false
        ); ?>
        <? if (empty($_GET)): ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <?
                $filter = array("=IBLOCK_ID" => 5);
                $nav = new \Bitrix\Main\UI\PageNavigation("nav-more-news");
                $nav->allowAllRecords(true)
                    ->setPageSize(9)
                    ->initFromUri();
                $newsList = \Bitrix\Iblock\ElementTable::getList(
                    array(
                        "filter" => $filter,
                        "count_total" => true,
                        "offset" => $nav->getOffset(),
                        "limit" => $nav->getLimit(),
                    )
                );
                $nav->setRecordCount($newsList->getCount());
                while ($news = $newsList->fetch()) {
                }
                ?>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.pagenavigation",
                    "pagination",
                    array(
                        "NAV_OBJECT" => $nav,
                        "SEF_MODE" => "Y",
                    ),
                    false
                );
                ?>
            </div>
        </div>

    </div>
</div>
<? endif; ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

<!--<link rel="stylesheet" href="/local/templates/.default/css/jquery-ui.css">-->
<!--<script src="/local/templates/.default/js/main.js"></script>-->

