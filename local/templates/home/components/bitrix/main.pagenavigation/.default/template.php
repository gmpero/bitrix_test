<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true);?>


<div class="site-pagination"> <? if ($arResult["REVERSED_PAGES"] === true): ?> <? if ($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"]): ?> <a href="<?= htmlspecialcharsbx($arResult["URL"]) ?>">1</a> <? else: ?> <a href="#">1</a> <? endif ?>
        <?
        $page = $arResult["START_PAGE"] - 1;
        while ($page >= $arResult["END_PAGE"] + 1):
            ?>
            <? if ($page == $arResult["CURRENT_PAGE"]): ?>
            <span><?= ($arResult["PAGE_COUNT"] - $page + 1) ?></span>
        <? else: ?>
            <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($page)) ?>"><span><?= ($arResult["PAGE_COUNT"] - $page + 1) ?></span></a>
        <? endif ?>

            <? $page-- ?>
        <? endwhile ?>

        <? if ($arResult["CURRENT_PAGE"] > 1 && $arResult["PAGE_COUNT"] > 1): ?>
            <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate(1)) ?>"><span><?= $arResult["PAGE_COUNT"] ?></span></a>
        <? else: ?>
            <? if ($arResult["PAGE_COUNT"] > 1): ?>
                <span><?= $arResult["PAGE_COUNT"] ?></span>
            <? endif ?>
        <? endif ?>

    <? else: ?>

        <? if ($arResult["CURRENT_PAGE"] > 1): ?>
            <a href="<?= htmlspecialcharsbx($arResult["URL"]) ?>"><span>1</span></a>
        <? else: ?>
            <a class="active">1</a>
        <? endif ?>

        <?
        $page = $arResult["START_PAGE"] + 1;
        while ($page <= $arResult["END_PAGE"] - 1):
            ?>
            <? if ($page == $arResult["CURRENT_PAGE"]): ?>
            <a class="active"><?= $page ?></a>
        <? else: ?>
            <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($page)) ?>"><span><?= $page ?></span></a>
        <? endif ?>
            <? $page++ ?>
        <? endwhile ?>

        <? if ($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"] && $arResult["PAGE_COUNT"] > 1): ?>
            <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($arResult["PAGE_COUNT"])) ?>"><span><?= $arResult["PAGE_COUNT"] ?></span></a>
        <? else: ?>
            <? if ($arResult["PAGE_COUNT"] > 1): ?>
                <a class="active"><?= $arResult["PAGE_COUNT"] ?></a>
            <? endif ?>
        <? endif ?>

    <? endif ?>
</div>

