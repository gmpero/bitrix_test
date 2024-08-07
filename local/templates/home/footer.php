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
                            "PATH" => "include/company_about.php"
                        )
                    );
                    ?>
                </div>
            </div>

<!--               Меню-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">Navigations</h3>
                    </div>
                    <? $APPLICATION->IncludeComponent("bitrix:menu", "menu_footer", array(
                        "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                        "DELAY" => "N",    // Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "1",    // Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
                            0 => "",
                        ),
                        "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                        "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                        "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
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
                        "PATH" => "include/follow_us.php"
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
                        "PATH" => "include/copyright.php"
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