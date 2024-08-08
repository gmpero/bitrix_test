<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О сервисе");
?>

    <div class="site-section border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="/local/templates/.default/images/about.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/info/our_company.php"
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>