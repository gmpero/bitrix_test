<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <ul class="site-menu js-clone-nav d-none d-lg-block">
    <?
    $previousLevel = 0;
foreach ($arResult

    as $arItem): ?>

    <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
    <? endif ?>

    <? if ($arItem["IS_PARENT"]): ?>

    <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
    <li class="has-children <?= $arItem["SELECTED"] ? 'active' : ''; ?>"><a href="<?= $arItem["LINK"] ?>"
                                                                            class="<? if ($arItem["SELECTED"]): ?>root-item-selected<? else: ?>root-item<? endif ?>"><?= $arItem["TEXT"] ?></a>
    <ul class="dropdown">
    <? else: ?>
    <li class="<?= $arItem["SELECTED"] ? 'active' : ''; ?>"><a href="<?= $arItem["LINK"] ?>"
                                                               class="parent"><?= $arItem["TEXT"] ?></a>
    <ul>
    <? endif ?>

    <? else: ?>

        <? if ($arItem["PERMISSION"] > "D"): ?>

            <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                <li class="<?= $arItem["SELECTED"] ? 'active' : ''; ?>"><a href="<?= $arItem["LINK"] ?>"
                                                                           class="<? if ($arItem["SELECTED"]): ?>root-item-selected<? else: ?>root-item<? endif ?>"><?= $arItem["TEXT"] ?></a>
                </li>
            <? else: ?>
                <li class="<?= $arItem["SELECTED"] ? 'item-selected' : ''; ?>"><a
                            href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
            <? endif ?>

        <? else: ?>

            <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                <li><a href="" class="<? if ($arItem["SELECTED"]): ?>root-item-selected<? else: ?>root-item<? endif ?>"
                       title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
            <? else: ?>
                <li><a href="" class="denied"
                       title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
            <? endif ?>

        <? endif ?>

    <? endif ?>

    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

<? endforeach ?>

    <? if ($previousLevel > 1)://close last item tags?>
        <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
    <? endif ?>

    </ul>
<? endif ?>