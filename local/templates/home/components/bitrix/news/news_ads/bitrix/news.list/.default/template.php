<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!--<div class="news-list">-->
<? //if($arParams["DISPLAY_TOP_PAGER"]):?>
<!--	--><?php //=$arResult["NAV_STRING"]?><!--<br />-->
<? //endif;?>
<? //foreach($arResult["ITEMS"] as $arItem):?>
<!--	--><? //
//	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
//	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
//	?>
<!--	<p class="news-item" id="--><?php //=$this->GetEditAreaId($arItem['ID']);?><!--">-->
<!--		--><? //if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
<!--			--><? //if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
<!--				<a href="--><?php //=$arItem["DETAIL_PAGE_URL"]?><!--"><img-->
<!--						class="preview_picture"-->
<!--						border="0"-->
<!--						src="--><?php //=$arItem["PREVIEW_PICTURE"]["SRC"]?><!--"-->
<!--						width="--><?php //=$arItem["PREVIEW_PICTURE"]["WIDTH"]?><!--"-->
<!--						height="--><?php //=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?><!--"-->
<!--						alt="--><?php //=$arItem["PREVIEW_PICTURE"]["ALT"]?><!--"-->
<!--						title="--><?php //=$arItem["PREVIEW_PICTURE"]["TITLE"]?><!--"-->
<!--						style="float:left"-->
<!--						/></a>-->
<!--			--><? //else:?>
<!--				<img-->
<!--					class="preview_picture"-->
<!--					border="0"-->
<!--					src="--><?php //=$arItem["PREVIEW_PICTURE"]["SRC"]?><!--"-->
<!--					width="--><?php //=$arItem["PREVIEW_PICTURE"]["WIDTH"]?><!--"-->
<!--					height="--><?php //=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?><!--"-->
<!--					alt="--><?php //=$arItem["PREVIEW_PICTURE"]["ALT"]?><!--"-->
<!--					title="--><?php //=$arItem["PREVIEW_PICTURE"]["TITLE"]?><!--"-->
<!--					style="float:left"-->
<!--					/>-->
<!--			--><? //endif;?>
<!--		--><? //endif?>
<!--		--><? //if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
<!--			<span class="news-date-time">--><? //echo $arItem["DISPLAY_ACTIVE_FROM"]?><!--</span>-->
<!--		--><? //endif?>
<!--		--><? //if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
<!--			--><? //if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
<!--				<a href="--><? //echo $arItem["DETAIL_PAGE_URL"]?><!--"><b>--><? //echo $arItem["NAME"]?><!--</b></a><br />-->
<!--			--><? //else:?>
<!--				<b>--><? //echo $arItem["NAME"]?><!--</b><br />-->
<!--			--><? //endif;?>
<!--		--><? //endif;?>
<!--		--><? //if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
<!--			--><? //echo $arItem["PREVIEW_TEXT"];?>
<!--		--><? //endif;?>
<!--		--><? //if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
<!--			<div style="clear:both"></div>-->
<!--		--><? //endif?>
<!--		--><? //foreach($arItem["FIELDS"] as $code=>$value):?>
<!--			<small>-->
<!--			--><?php //=GetMessage("IBLOCK_FIELD_".$code)?><!--:&nbsp;--><?php //=$value;?>
<!--			</small><br />-->
<!--		--><? //endforeach;?>
<!--		--><? //foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
<!--			<small>-->
<!--			--><?php //=$arProperty["NAME"]?><!--:&nbsp;-->
<!--			--><? //if(is_array($arProperty["DISPLAY_VALUE"])):?>
<!--				--><?php //=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
<!--			--><? //else:?>
<!--				--><?php //=$arProperty["DISPLAY_VALUE"];?>
<!--			--><? //endif?>
<!--			</small><br />-->
<!--		--><? //endforeach;?>
<!--	</p>-->
<? //endforeach;?>
<? //if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<!--	<br />--><?php //=$arResult["NAV_STRING"]?>
<? //endif;?>
<!--</div>-->


<div class="row mb-5">
    <div class="col-12">
        <div class="site-section-title">
            <h2>New Properties for You</h2>
        </div>
    </div>
</div>
<div class="row mb-5">

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-md-6 col-lg-4 mb-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="prop-entry d-block">
                <figure>
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="Image" class="img-fluid">
                </figure>
                <div class="prop-text">
                    <div class="inner">
                        <span class="price rounded"><?= $arItem["PROPERTY_PRICE_VALUE"] ?></span>
                        <h3 class="title"><? echo $arItem["NAME"] ?></h3>
                        <p class="location">Los Angeles, CA 90005</p>
                    </div>
                    <div class="prop-more-info">
                        <div class="inner d-flex">
                            <div class="col">
                                <span>Площадь:</span>
                                <strong><?= $arItem["PROPERTY_TOTAL_AREA_VALUE"] ?><sup>2</sup></strong>
                            </div>
                            <div class="col">
                                <span>Этажей:</span>
                                <strong><?= $arItem["PROPERTY_FLOOR_COUNT_VALUE"] ?></strong>
                            </div>
                            <div class="col">
                                <span>Санузлов:</span>
                                <strong><?= $arItem["PROPERTY_BATHROOM_COUNT_VALUE"] ?></strong>
                            </div>
                            <div class="col">
                                <span>Гараж:</span>
                                <strong><?= $arItem["PROPERTY_HAS_GARAGE_VALUE"] ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <? endforeach; ?>
</div>
