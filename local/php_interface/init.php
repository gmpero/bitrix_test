<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/user_group_handler.php");

AddEventHandler("main", "OnAfterUserRegister", array("UserGroupHandler", "OnAfterUserRegisterHandler"));

$taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
$taggedCache->clearByTag('hlblock_table_name_hl_agents');