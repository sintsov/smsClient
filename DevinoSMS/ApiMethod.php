<?php
/**
 * Описывает метод Devino REST API
 * 
 * @author Sintsov Roman <romiras_spb@mail.ru>
 */

namespace SmsClient\DevinoSMS;


class ApiMethod {

    const METHOD_GET_BALANCE            = 'user/balance';
    const METHOD_SESSION_ID             = 'user/sessionid';
    const METHOD_SMS_SEND               = 'sms/send';
    const METHOD_SMS_SEND_BULK          = 'sms/sendBulk';
    const METHOD_SMS_SEND_BY_TIME_ZONE  = 'sms/SendByTimeZone';
    const METHOD_SMS_STATUS             = 'sms/state';

}