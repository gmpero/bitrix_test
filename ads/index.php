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
        <? $APPLICATION->IncludeComponent(
	"bitrix:news", 
	"news_ads", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "PREVIEW_PICTURE",
			2 => "PROPERTY_PRICE",
			3 => "PROPERTY_TOTAL_AREA",
			4 => "PROPERTY_FLOOR_COUNT",
			5 => "PROPERTY_BATHROOM_COUNT",
			6 => "PROPERTY_HAS_GARAGE",
			7 => "PROPERTY_IMAGE_GALLERY",
			8 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "ads",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "CODE",
			1 => "NAME",
			2 => "PREVIEW_PICTURE",
			3 => "PROPERTY_PRICE",
			4 => "PROPERTY_TOTAL_AREA",
			5 => "PROPERTY_FLOOR_COUNT",
			6 => "PROPERTY_BATHROOM_COUNT",
			7 => "PROPERTY_HAS_GARAGE",
			8 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "9",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "news_ads",
		"TITLE_BLOCK" => "Смотреть все обьявления",
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
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

