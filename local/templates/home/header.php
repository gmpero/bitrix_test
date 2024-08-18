<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>


    <!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">

    <head>
        <title><?php $APPLICATION->ShowTitle(); ?></title>
        <?php $APPLICATION->ShowHead();

        $asset = \Bitrix\Main\Page\Asset::getInstance();
        $asset->addCss('https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500');
        $asset->addCss(SITE_TEMPLATE_PATH . '/fonts/icomoon/style.css');
        $asset->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
        $asset->addCss(SITE_TEMPLATE_PATH . '/css/magnific-popup.css');
        $asset->addCss(SITE_TEMPLATE_PATH . '/css/jquery-ui.css');
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
                                    "PATH" => SITE_DIR . "include/company_phone.php"
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
                                    "PATH" => SITE_DIR . "include/company_email.php"
                                )
                            );
                            ?>
                        </p>
                    </div>
                    <div class="col-5 col-md-5 text-right">
                        <!-- Компонент соц. сетей -->
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR . "include/company_social_networks.php"
                            )
                        );
                        ?>
                    </div>
                    <div class="col-1 col-md-1 text-right">
                        <? if ($USER->IsAuthorized()) : ?>
                            <?
                            // ссылка для выхода из личного кабинета
                            $logout = $APPLICATION->GetCurPageParam(
                                "logout=yes&" . bitrix_sessid_get(),
                                array(
                                    "login",
                                    "logout",
                                    "register",
                                    "forgot_password",
                                    "change_password"
                                )
                            );
                            ?>
                            <a href="<?= $logout; ?>" class="btn btn-primary btn-sm">Выйти</a>
                        <?php else: ?>
                            <a href="/login" class="btn btn-primary btn-sm">Войти</a>
                        <? endif; ?>
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
                                "PATH" => SITE_DIR . "include/company_name.php"
                            )
                        );
                        ?>
                    </div>
                    <div class="col-4 col-md-4 col-lg-8">
                        <nav class="site-navigation text-right text-md-right" role="navigation">

                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                                                                          class="site-menu-toggle js-menu-toggle text-black"><span
                                            class="icon-menu h3"></span></a></div>
                            <!--   Меню  -->
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "top_multi",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "left",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "2",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "7776000",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "top",
                                    "USE_EXT" => "N",
                                    "COMPONENT_TEMPLATE" => "top_multi"
                                ),
                                false
                            ); ?>
                        </nav>
                    </div>
                </div>


            </div>
        </div>
    </div>


<? if ($APPLICATION->GetCurPage(false) !== '/'): ?>
    <div class="site-blocks-cover inner-page-cover overlay"
         style="background-image: url(<?= SITE_TEMPLATE_PATH . '/images/hero_bg_2.jpg' ?>);"
         data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2"><?php $APPLICATION->showTitle(); ?></h1>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "chain",
                        array(
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0",
                            "COMPONENT_TEMPLATE" => "chain"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>