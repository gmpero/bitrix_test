<? global $APPLICATION;
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
//$APPLICATION->SetPageProperty("title", "Главная");
$APPLICATION->SetTitle("Главная");
?>

    <!--СЛАЙДЕР-->
    <div class="slide-one-item home-slider owl-carousel">
        <?
        $arFilter = array(
                "PROPERTY_PRIORITY_DEAL_VALUE"=>"Да",
                "ACTIVE"=>"Y",
                "IBLOCK_ID"=>"5"
        );
        $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "172 800",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "#SITE_DIR#/ads/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "XML_ID",
			2 => "",
		),
		"FILTER_NAME" => "arFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "ads",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "arrows_adm",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "PRIORITY_DEAL",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "slider"
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