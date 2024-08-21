<?php

class UserGroupHandler
{
    public static function OnAfterUserRegisterHandler(&$arFields)
    {
        if ($arFields["ID"] > 0) {

            if ($arFields["UF_ROLE"] == 6) {    // UF_ROLE == BUYER
                $arGroups[] = 8; //BUYER
                CUser::SetUserGroup($arFields["ID"], $arGroups);
            } elseif ($arFields["UF_ROLE"] == 7) {  // UF_ROLE == SELLER
                $arGroups[] = 7; //SELLER
                CUser::SetUserGroup($arFields["ID"], $arGroups);
            }


        }
    }
}




