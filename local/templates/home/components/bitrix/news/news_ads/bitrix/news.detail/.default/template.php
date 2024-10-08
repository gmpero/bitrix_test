<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<div class="site-blocks-cover overlay" style="background-image: url(<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>);"
     data-aos="fade"
     data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage("CT_BNL_PROPERTY_DETAILS")?></span>
                <h1 class="mb-2"><?= $arResult["NAME"]; ?></h1>
                <p class="mb-5"><strong
                            class="h2 text-success font-weight-bold"><?= $arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]; ?></strong>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" style="margin-top: -150px;">
                <div class="mb-5">
                    <div class="slide-one-item home-slider owl-carousel">
                        <?php foreach ($arResult['DISPLAY_PROPERTIES']['IMAGE_GALLERY']['VALUE'] as $item): ?>
                            <?php
                            // путь к изображению от корня сайта
                            $image = CFile::GetPath($item);

                            ?>
                            <div><img src="<?= $image; ?>" alt="Image" class="img-fluid"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3"><?= $arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]; ?></strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs"><?=GetMessage("CT_BNL_PROPERTY_DATE")?></span>
                                    <span class="property-specs-number"><?= (new \Bitrix\Main\Type\DateTime($arItem['TIMESTAMP_X']))->format('d.m.Y'); ?></span>

                                </li>
                                <li>
                                    <span class="property-specs"><?=GetMessage("CT_BNL_FLOOR")?></span>
                                    <span class="property-specs-number"><?= $arResult["DISPLAY_PROPERTIES"]["FLOOR_COUNT"]["VALUE"] ?></span>

                                </li>
                                <li>
                                    <span class="property-specs"><?=GetMessage("CT_BNL_AREA")?></span>
                                    <span class="property-specs-number"><?= $arResult["DISPLAY_PROPERTIES"]["TOTAL_AREA"]["VALUE"]; ?><sup>2</sup></span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("CT_BNL_BATHROOM_COUNT")?></span>
                            <strong class="d-block"><?= $arResult["DISPLAY_PROPERTIES"]["BATHROOM_COUNT"]["VALUE"]; ?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("CT_BNL_HAS_GARAGE")?></span>
                            <strong class="d-block"><?= $arResult["DISPLAY_PROPERTIES"]["HAS_GARAGE"]["VALUE"] ? $arResult["DISPLAY_PROPERTIES"]["HAS_GARAGE"]["VALUE"] : 'Нет'; ?></strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black"><?=GetMessage("CT_BNL_PROPERTY_MORE_INFO")?></h2>
                    <?php echo $arResult["DETAIL_TEXT"]; ?>

                    <div class="row mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3"><?=GetMessage("CT_BNL_PROPERTY_GALLERY")?></h2>
                        </div>
                        <?php foreach ($arResult['DISPLAY_PROPERTIES']['IMAGE_GALLERY']['VALUE'] as $item): ?>
                            <?php
                            // путь к изображению от корня сайта
                            $image = CFile::GetPath($item);

                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="<?= $image; ?>" class="image-popup gal-item">
                                    <img src="<?= $image; ?>" alt="Image" class="img-fluid">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Дополнительные материалы -->
                    <?php if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_MATERIALS']['VALUE'])): ?>
                        <div class="row mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3"><?=GetMessage("CT_BNL_PROPERTY_ADDITIONAL_MATERIALS")?></h2>
                            </div>
                            <?php foreach ($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_MATERIALS']['VALUE'] as $item): ?>
                                <?php
                                // путь к изображению от корня сайта
                                $image = CFile::GetPath($item);

                                ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="<?= $image; ?>" class="image-popup gal-item">
                                        <img src="<?= $image; ?>" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Ссылки на внешние ресурсы -->
                    <?php if (!empty($arResult['DISPLAY_PROPERTIES']['EXTERNAL_LINKS']['VALUE'])): ?>
                        <div class="row mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3"><?=GetMessage("CT_BNL_PROPERTY_EXTERNAL_LINKS")?></h2>
                            </div>
                            <?php foreach ($arResult['DISPLAY_PROPERTIES']['EXTERNAL_LINKS']['VALUE'] as $item): ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="<?= $item; ?>"><?= $item ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 pl-md-5">

                <div class="bg-white widget border rounded">

                    <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                    <form action="" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                        </div>
                    </form>
                </div>

                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
                    <p>Здесь что-то должно быть</p>
                </div>

            </div>

        </div>
    </div>
</div>