<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true); ?>

<div class="site-pagination">
    <? for ($i = 1; $i <= $arResult["PAGE_COUNT"]; $i++): ?>
        <? if ($i == $arResult["CURRENT_PAGE"]): ?>
            <a href="#" class="active"><?= $i ?></a>
        <? else: ?>
            <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($i)) ?>"><?= $i ?></a>
        <? endif ?>
    <? endfor ?>

    <? if ($arResult["PAGE_COUNT"] > 5): // Если страниц больше 5, добавляем многоточие ?>
        <span>...</span>
        <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($arResult["PAGE_COUNT"])) ?>"><?= $arResult["PAGE_COUNT"] ?></a>
    <? endif ?>
</div>
