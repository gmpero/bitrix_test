<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
$APPLICATION->SetTitle("Моя страница");
IncludeTemplateLangFile(__FILE__);
?>


<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">

<head>
    <title><?php $APPLICATION->showTitle(); ?></title>
    <?php $APPLICATION->showHead() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    $asset = \Bitrix\Main\Page\Asset::getInstance();
    $asset->addCss('https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500');
    $asset->addCss(SITE_TEMPLATE_PATH . '/fonts/icomoon/style.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/magnific-popup.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/jquery-uicss');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/owl.carousel.min.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/owl.theme.default.min.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap-datepicker.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/mediaelementplayer.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/animate.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/fonts/flaticon/font/flaticon.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/fl-bigmug-line.css');

    $asset->addCss(SITE_TEMPLATE_PATH . '/css/aos.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
    ?>

</head>

<body>
<? $APPLICATION->ShowPanel(); ?>
<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <p class="mb-0">
                        <!-- Компонент телефона компании -->
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "include/company_phone.php"
                            )
                        );
                        ?>
                        <!-- Компонент почты компании -->
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "include/company_email.php"
                            )
                        );
                        ?>
                    </p>
                </div>
                <div class="col-6 col-md-6 text-right">
                    <!-- Компонент соц. сетей -->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/company_social_networks.php"
                        )
                    );
                    ?>
                </div>
            </div>
        </div>

    </div>
    <div class="site-navbar">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <!-- Компонент названия компании -->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/company_name.php"
                        )
                    );
                    ?>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                                                                      class="site-menu-toggle js-menu-toggle text-black"><span
                                        class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <!--   Меню  -->
                            <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	".default", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "7776000",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
                            <!--                            -->
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="/properties.html">Properties</a>
                                <ul class="dropdown">
                                    <li><a href="#">Buy</a></li>
                                    <li><a href="#">Rent</a></li>
                                    <li><a href="#">Lease</a></li>
                                    <li class="has-children">
                                        <a href="#">Menu</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Menu One</a></li>
                                            <li><a href="#">Menu Two</a></li>
                                            <li><a href="#">Menu Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>