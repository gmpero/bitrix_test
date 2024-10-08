<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-5">
                    <!--                     Компонент о компании-->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/company_about.php"
                        )
                    );
                    ?>
                </div>
            </div>

            <!--               Меню-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4"> <?= GetMessage("Navigations") ?></h3>
                    </div>
                    <? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu_footer", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "menu_footer"
	),
	false
); ?>
                </div>
            </div>

            <!-- Follow us-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR . "include/follow_us.php"
                    )
                );
                ?>
            </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <!-- Copyright-->
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR . "include/copyright.php"
                    )
                );
                ?>
            </div>

        </div>
    </div>
</footer>

<?php
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-migrate-3.0.1.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-ui.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/popper.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/mediaelement-and-player.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.stellar.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.countdown.min.js');

$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap-datepicker.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/aos.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
?>

</body>

</html>