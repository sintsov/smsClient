<?php
/**
 * Статусы SMS-сообщений
 * 
 * @author Sintsov Roman <romiras_spb@mail.ru>
 */

namespace SmsClient\DevinoSMS;

class Status {
    /**
     * Список констант с кодами статусов SMS-сообщений
     */
    const SMS_STATUS_Send		= -1;
    const SMS_STATUS_InQueue	= -2;
    const SMS_STATUS_Deleted	= 47;
    const SMS_STATUS_Stopped	= -98;
    const SMS_STATUS_Delivered	= 0;
    const SMS_STATUS_InvalidSourceAddress			= 10;
    const SMS_STATUS_InvalidDestinationAddress		= 11;
    const SMS_STATUS_UnallowedDestinationAddress	= 41;
    const SMS_STATUS_RejectedBySMSCenter			= 42;
    const SMS_STATUS_TimeOut	= 46;
    const SMS_STATUS_Rejected	= 69;
    const SMS_STATUS_Unknown	= 99;
    const SMS_STATUS_UnknownByTimeout = 255;
}