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
    const SMS_STATUS_Send		                    = -1;
    const SMS_STATUS_InQueue	                    = -2;
    const SMS_STATUS_Deleted	                    = 47;
    const SMS_STATUS_Stopped	                    = -98;
    const SMS_STATUS_Delivered	                    = 0;
    const SMS_STATUS_InvalidSourceAddress			= 10;
    const SMS_STATUS_InvalidDestinationAddress		= 11;
    const SMS_STATUS_UnallowedDestinationAddress	= 41;
    const SMS_STATUS_RejectedBySMSCenter			= 42;
    const SMS_STATUS_TimeOut	                    = 46;
    const SMS_STATUS_RejectPlatform                 = 48;
    const SMS_STATUS_Rejected	                    = 69;
    const SMS_STATUS_Unknown	                    = 99;
    const SMS_STATUS_UnknownByTimeout               = 255;

    public static function getStatusByCode($code) {
        $status = array(
            self::SMS_STATUS_Send                           => 'Отправлено (передано в мобильную сеть)',
            self::SMS_STATUS_InQueue                        => 'В очереди',
            self::SMS_STATUS_Deleted                        => 'Удалено',
            self::SMS_STATUS_Stopped                        => 'Остановлено',
            self::SMS_STATUS_Delivered                      => 'Доставлено абоненту',
            self::SMS_STATUS_InvalidSourceAddress           => 'Неверно введен адрес отправителя',
            self::SMS_STATUS_InvalidDestinationAddress      => 'Неверно введен адрес получателя ',
            self::SMS_STATUS_UnallowedDestinationAddress    => 'Недопустимый адрес получателя',
            self::SMS_STATUS_RejectedBySMSCenter            => 'Отклонено смс центром',
            self::SMS_STATUS_TimeOut                        => 'Просрочено (истек срок жизни сообщения)',
            self::SMS_STATUS_RejectPlatform                 => 'Отклонено Платформой ',
            self::SMS_STATUS_Rejected                       => 'Отклонено',
            self::SMS_STATUS_Unknown                        => 'Неизвестный',
            self::SMS_STATUS_UnknownByTimeout               => 'По запросу возвращается этот статус, если сообщения еще не успело попасть в БД, либо сообщение старше 48 часов '
        );

        return (isset($status[$code])) ? $status[$code] : "Получен неизвестный статус с кодом {$code}";
    }
}