<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

//<div>
//    <a href="index.html">Home </a>
//    <span class="mx-2 text-white">&bullet;</span>
//    <strong class="text-white">About</strong>
//</div>

global $APPLICATION;

// delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '';

// we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
    $strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
    {
        // Если это не последний элемент, добавляем ссылку
        $strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';

        // Добавляем разделитель между элементами
        $strReturn .= ' <span class="mx-2 text-white">&bullet;</span> ';
    }
    else
    {
        // Если это последний элемент, просто выводим его как strong
        $strReturn .= '<strong class="text-white">'.$title.'</strong>';
    }
}

$strReturn .= '</div>';

return $strReturn;
