<?php

namespace app\Helpers;

/**
 * Class DaDataHelper
 * @package BXCert\Helpers
 */
class DaDataHelper
{
    /**
     * @param string $sApiKey API Key сервиса DaData.ru
     * @param string $sType Тип запроса address|bank и другие
     * @param array $arFields
     * @return array|mixed
     * @link https://bx-cert.ru/advices/50/helper-dlya-raboty-s-dadata-na-php-curl/
     * @link https://dadata.ru/suggestions/usage/#bank
     */
    public static function dadata($sType, $arFields, $sApiKey = null)
    {
        if (is_null($sApiKey))
            $sApiKey = self::getAPI();
        $arResult = [];
        if ($oCurl = curl_init("https://suggestions.dadata.ru/suggestions/api/4_1/rs/" . $sType)) {
            curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($oCurl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Token ' . $sApiKey
            ]);
            curl_setopt($oCurl, CURLOPT_POST, 1);
            curl_setopt($oCurl, CURLOPT_POSTFIELDS, json_encode($arFields));
            $sResult = curl_exec($oCurl);
            $arResult = json_decode($sResult, true);
            curl_close($oCurl);
        }

        return $arResult;
    }

    /**
     *
     */
    public static function getAPI()
    {
        /*енмного переформатируем  ключ чтобы не  тырили  */
        return base64_decode('Y2Y4MTc' . '5NzBiOGFlMmUxOGI2NDNiZD' . 'djNjYzMjUwMjQw' . 'NDg2ZTU1Mw==');
    }
}
