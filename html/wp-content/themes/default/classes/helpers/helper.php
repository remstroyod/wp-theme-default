<?php

namespace helpers;

class Helper
{

    /**
     * @param $phone
     * @return array|mixed|string|string[]|null
     */
    public static function phoneToMobile($phone)
    {
        if (!empty($phone)) {
            $phone = preg_replace("/[^0-9+]/", "", $phone);
        }

        return $phone;
    }


}
