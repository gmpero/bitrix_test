<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация и регистрация");
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5 p-5 bg-white border">
                <p>Вы зарегистрированы и успешно авторизовались.</p>
                <?
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
                <p><a href="<?= $logout; ?>">Выйти</a></p>
            </div>
        </div>
    </div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>
