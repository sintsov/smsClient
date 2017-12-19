<?php
/**
 * Обработка исключений для Devino
 * 
 * @author Sintsov Roman <romiras_spb@mail.ru>
 */

namespace SmsClient\DevinoSMS;

class Exception extends \Exception
{
    /**
     * Список констант с кодами ошибок
     */
    const ERROR_OK							= 0;
    const ERROR_ArgumentCanNotBeNullOrEmpty	= 1;
    const ERROR_InvalidAgrument				= 2;
    const ERROR_InvalidSessionID			= 3;
    const ERROR_UnauthorizedAccess			= 4;
    const ERROR_NotEnoughCredits			= 5;
    const ERROR_InvalidOperation			= 6;
    const ERROR_Forbidden					= 7;
    const ERROR_GatewayError				= 8;
    const ERROR_InternalServerError			= 9;

    public function getErrorMessage($code){
        $error = array(
            '401'   => 'Доступ запрещен. Проверьте правильность логина и пароля',
            '404'   => 'Не найдена запрошеная страница'
        );

        return (isset($error[$code])) ? $error[$code] . " (Код ошибки: {$code})" :  "{$this->getMessage()} (Код ошибки: {$code})";
    }
}