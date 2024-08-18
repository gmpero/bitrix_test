<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.form", 
	"login-main", 
	array(
		"COMPONENT_TEMPLATE" => "login-main",
		"AUTH_FORGOT_PASSWORD_URL" => "/user",
		"AUTH_REGISTER_URL" => "/user/registr.php",
		"AUTH_SUCCESS_URL" => "/"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>