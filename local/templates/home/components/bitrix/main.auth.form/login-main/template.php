<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

\Bitrix\Main\Page\Asset::getInstance()->addCss(
    '/bitrix/css/main/system.auth/flat/style.css'
);
?>
<!---->
<div class="col-1 col-md-1 text-right">
    <?php if ($arResult['AUTHORIZED']): ?>
        <a href="<? echo $APPLICATION->GetCurPageParam("logout=yes&" . bitrix_sessid_get(), array(
            "login",
            "logout",
            "register",
            "forgot_password",
            "change_password")); ?>" class="btn btn-primary btn-sm">
            Выйти
        </a>
    <?php else: ?>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#loginModal">
            <?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_SUBMIT'); ?>
        </button>
    <? endif; ?>
</div>


<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel"><?= Loc::getMessage('MAIN_AUTH_FORM_HEADER'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <? if ($arResult['ERRORS']): ?>
                    <div class="alert alert-danger">
                        <? foreach ($arResult['ERRORS'] as $error) {
                            echo $error;
                        }
                        ?>
                    </div>
                <? endif; ?>
                <? if ($arResult['AUTH_SERVICES']): ?>
                    <div>
                        <? $APPLICATION->IncludeComponent('bitrix:socserv.auth.form',
                            'flat',
                            array(
                                'AUTH_SERVICES' => $arResult['AUTH_SERVICES'],
                                'AUTH_URL' => $arResult['CURR_URI']
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                        );
                        ?>
                        <hr class="bxe-light">
                    </div>
                <? endif ?>
                <!-- FORM LOGIN -->
                <form name="<?= $arResult['FORM_ID']; ?>" method="post" target="_top"
                      action="<?= POST_FORM_ACTION_URI; ?>">
                    <!-- ID_LOGIN -->
                    <div class="form-group">
                        <label for="login"><?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_LOGIN'); ?></label>
                        <input type="text" class="form-control" name="<?= $arResult['FIELDS']['login']; ?>"
                               maxlength="255"
                               value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="login"><?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_PASS'); ?></label>

                        <? if ($arResult['SECURE_AUTH']): ?>
                            <div class="bx-authform-psw-protected" id="bx_auth_secure" style="display:none">
                                <div class="bx-authform-psw-protected-desc"><span></span>
                                    <?= Loc::getMessage('MAIN_AUTH_FORM_SECURE_NOTE'); ?>
                                </div>
                            </div>
                            <script>
                                document.getElementById('bx_auth_secure').style.display = '';
                            </script>
                        <? endif ?>
                        <input type="password" class="form-control" name="<?= $arResult['FIELDS']['password']; ?>"
                               maxlength="255"
                               autocomplete="off"/>
                        
                    </div>

                    <? if ($arResult['CAPTCHA_CODE']): ?>
                        <input type="hidden" name="captcha_sid"
                               value="<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']); ?>"/>
                        <div class="bx-authform-formgroup-container dbg_captha">
                            <div class="bx-authform-label-container">
                                <?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_CAPTCHA'); ?>
                            </div>
                            <div class="bx-captcha"><img
                                        src="/bitrix/tools/captcha.php?captcha_sid=<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']); ?>"
                                        width="180" height="40" alt="CAPTCHA"/></div>
                            <div class="bx-authform-input-container">
                                <input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off"/>
                            </div>
                        </div>
                    <? endif; ?>

                    <? if ($arResult['STORE_PASSWORD'] == 'Y'): ?>
                        <div class="bx-authform-formgroup-container">
                            <div class="checkbox">
                                <label class="bx-filter-param-label">
                                    <input type="checkbox" id="USER_REMEMBER"
                                           name="<?= $arResult['FIELDS']['remember']; ?>"
                                           value="Y"/>
                                    <span class="bx-filter-param-text"><?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_REMEMBER'); ?></span>
                                </label>
                            </div>
                        </div>
                    <? endif ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="submit" class="btn btn-primary btn-sm" name="<?= $arResult['FIELDS']['action']; ?>"
                               value="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_SUBMIT'); ?>"/>
                        <div class="d-flex">
                            <? if ($arResult['AUTH_FORGOT_PASSWORD_URL'] || $arResult['AUTH_REGISTER_URL']): ?>
                                <noindex>
                                    <? if ($arResult['AUTH_FORGOT_PASSWORD_URL']): ?>

                                        <a href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL']; ?>" rel="nofollow"
                                           class="btn btn-outline-dark btn-sm">
                                            <?= Loc::getMessage('MAIN_AUTH_FORM_URL_FORGOT_PASSWORD'); ?>
                                        </a>

                                    <? endif; ?>
                                    <? if ($arResult['AUTH_REGISTER_URL']): ?>

                                        <a href="<?= $arResult['AUTH_REGISTER_URL']; ?>"
                                           class="btn btn-link btn-sm ml-2" rel="nofollow">
                                            <?= Loc::getMessage('MAIN_AUTH_FORM_URL_REGISTER_URL'); ?>
                                        </a>

                                    <? endif; ?>
                                </noindex>
                            <? endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    <?if ($arResult['LAST_LOGIN'] != ''):?>
    try {
        document.<?= $arResult['FORM_ID'];?>.USER_PASSWORD.focus();
    } catch (e) {
    }
    <?else:?>
    try {
        document.<?= $arResult['FORM_ID'];?>.USER_LOGIN.focus();
    } catch (e) {
    }
    <?endif?>
</script>