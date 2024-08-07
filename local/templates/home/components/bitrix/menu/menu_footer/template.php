<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <?php
    $count = 0; // Счетчик элементов
    $totalItems = count($arResult); // Общее количество элементов
    ?>
    <div class="col-md-6 col-lg-6">
    <ul class="list-unstyled">
    <?
    foreach($arResult as $index => $arItem):
        if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
            continue;

        // Проверка на каждый четвертый элемент для создания нового блока
        if ($count > 0 && $count % 4 == 0):
            ?>
            </ul>
            </div>
            <div class="col-md-6 col-lg-6">
            <ul class="list-unstyled">
        <?endif;?>

        <?if($arItem["SELECTED"]):?>
        <li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
    <?else:?>
        <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
    <?endif?>

        <?
        $count++; // Увеличиваем счетчик
    endforeach;
    ?>
    </ul>
    </div>
<?endif?>
