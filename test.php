<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent("bitrix:news.line", "template1", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "300",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"IBLOCKS" => "",	// Код информационного блока
		"IBLOCK_TYPE" => "services",	// Тип информационного блока
		"NEWS_COUNT" => "6",	// Количество новостей на странице
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>