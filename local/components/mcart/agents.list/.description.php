<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = array(
    "NAME" => Loc::getMessage("MCART_REALTY_AGENTS_NAME"),
    "DESCRIPTION" => Loc::getMessage("MCART_REALTY_AGENTS_DESCRIPTION"),
    "SORT" => 10,
    "PATH" => array(
        "ID" => "mcart",
        "NAME" => Loc::getMessage("MCART_SECTION_NAME"),
        "CHILD" => array(
            "ID" => "realty_agents",
            "NAME" => Loc::getMessage("MCART_REALTY_AGENTS_CHILD_NAME"),
        ),
    ),
);

$arComponentParameters = array(
    "GROUPS" => array(
        "BASE" => array(
            "NAME" => Loc::getMessage("MCART_REALTY_AGENTS_GROUP_BASE"),
        ),
        "CACHE_SETTINGS" => array(
            "NAME" => Loc::getMessage("MCART_REALTY_AGENTS_GROUP_CACHE_SETTINGS"),
        ),
    ),
    "PARAMETERS" => array(
        "HLBLOCK_TNAME" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MCART_AGENTS_LIST_HLBLOCK_TNAME"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "PAGE_SIZE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("MCART_REALTY_AGENTS_PAGE_SIZE"),
            "TYPE" => "STRING",
            "DEFAULT" => "10",
        ),
        "CACHE_TIME" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => Loc::getMessage("MCART_REALTY_AGENTS_CACHE_TIME"),
            "TYPE" => "STRING",
            "DEFAULT" => "36000000",
        ),
    ),
);
?>
