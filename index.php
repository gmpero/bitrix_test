<? global $APPLICATION;
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

    <!--СЛАЙДЕР-->
    <div class="slide-one-item home-slider owl-carousel">
        <? $APPLICATION->IncludeComponent("bitrix:news.list", "slider", array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
            "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",    // Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
            "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",    // Учитывать права доступа
            "CACHE_TIME" => "3600",    // Время кеширования (сек.)
            "CACHE_TYPE" => "A",    // Тип кеширования
            "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
            "DETAIL_URL" => "#SITE_DIR#/ads/#ELEMENT_CODE#/",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
            "DISPLAY_DATE" => "N",    // Выводить дату элемента
            "DISPLAY_NAME" => "N",    // Выводить название элемента
            "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "N",    // Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
            "FIELD_CODE" => array(    // Поля
                0 => "ID",
                1 => "XML_ID",
                2 => "",
            ),
            "FILTER_NAME" => "",    // Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "5",    // Код информационного блока
            "IBLOCK_TYPE" => "ads",    // Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
            "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "20",    // Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
            "PAGER_TEMPLATE" => "arrows_adm",    // Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",    // Название категорий
            "PARENT_SECTION" => "",    // ID раздела
            "PARENT_SECTION_CODE" => "",    // Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(    // Свойства
                0 => "PRIORITY_DEAL",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
            "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",    // Устанавливать статус 404
            "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
            "SHOW_404" => "N",    // Показ специальной страницы
            "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
            "COMPONENT_TEMPLATE" => ".default"
        ),
            false
        ); ?>
    </div>

    <div class="py-5">
        <div class="container">

            <div class="row">
                <!-- info-1 -->
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/info_1.php"
                    )
                );
                ?>
                <!-- info-2 -->
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/info_2.php"
                    )
                );
                ?>
                <!-- info-2 -->
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/info_3.php"
                    )
                );
                ?>

            </div>
        </div>
        <div class="site-section site-section-sm bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="site-section-title">
                            <h2>New Properties for You</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <!--  ИБ "Объявления  -->
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.line",
                        "list_houses",
                        array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "604800",
                            "CACHE_TYPE" => "A",
                            "DETAIL_URL" => "#SITE_DIR#/ads/#ELEMENT_CODE#/",
                            "FIELD_CODE" => array(
                                0 => "CODE",
                                1 => "NAME",
                                2 => "PREVIEW_PICTURE",
                                3 => "PROPERTY_PRICE",
                                4 => "PROPERTY_TOTAL_AREA",
                                5 => "PROPERTY_FLOOR_COUNT",
                                6 => "PROPERTY_BATHROOM_COUNT",
                                7 => "PROPERTY_HAS_GARAGE",
                            ),
                            "IBLOCKS" => array(),
                            "IBLOCK_TYPE" => "ads",
                            "NEWS_COUNT" => "9",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "list_houses"
                        ),
                        false
                    ); ?>
                    <!-- -->
                </div>

            </div>
        </div>


        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center mb-5">
                        <div class="site-section-title">
                            <h2>Our Services</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!--  ИБ "Сервисы"  -->
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.line",
                        "our_services",
                        array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "7776000",
                            "CACHE_TYPE" => "A",
                            "DETAIL_URL" => "#SITE_DIR#/services/#ELEMENT_CODE#/",
                            "FIELD_CODE" => array(
                                0 => "CODE",
                                1 => "",
                            ),
                            "IBLOCKS" => array(
                                0 => "6",
                            ),
                            "IBLOCK_TYPE" => "services",
                            "NEWS_COUNT" => "6",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "our_services",
                        ),
                        false
                    ); ?>
                    <!-- -->
                </div>
            </div>
        </div>

        <div class="site-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 text-center">
                        <div class="site-section-title">
                            <h2>Our Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--  ИБ "Новости"-->
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.line",
                        "our_blog",
                        array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "604800",
                            "CACHE_TYPE" => "A",
                            "DETAIL_URL" => "#SITE_DIR#/info/news/#ELEMENT_CODE#/",
                            "FIELD_CODE" => array(
                                0 => "ID",
                                1 => "CODE",
                                2 => "XML_ID",
                                3 => "NAME",
                                4 => "PREVIEW_TEXT",
                                5 => "PREVIEW_PICTURE",
                                6 => "IBLOCK_CODE",
                                7 => "",
                            ),
                            "IBLOCKS" => array(),
                            "IBLOCK_TYPE" => "news",
                            "NEWS_COUNT" => "3",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "our_blog"
                        ),
                        false
                    ); ?>
                </div>

            </div>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>