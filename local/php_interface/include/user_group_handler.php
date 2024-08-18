<?php

class UserGroupHandler
{
    public static function OnAfterUserRegisterHandler(&$arFields)
    {
        if (intval($arFields["ID"]) > 0) {
            $userType = $arFields["UF_ROLE"];

            $sellerGroupId = 8;
            $buyerGroupId = 7;

            if ($userType == "SELLER") {
                CUser::AppendUserGroup($arFields["ID"], $sellerGroupId);
            } elseif ($userType == "BUYER") {
                CUser::AppendUserGroup($arFields["ID"], $buyerGroupId);
            }
        }
    }
}
