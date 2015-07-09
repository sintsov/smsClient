# SMS Client

PHP-класс для работы с API сервисов СМС уведомлений

В настоящий момент поддержка DevionTelecom http://www.devinotele.com/

### Установка зависимостей через Composer

Для работы проекта требуется подтянуть необходмые зависимости

Для этого запустите

```
php composer.phar install
```

Для установки в свой проект


```
php composer.phar require sintsov/smsclient "dev-master"
```

### Требования

* PHP >= 5.4.0

Классы и методы

Класс SmsClient\DevinoSMS\Api
-----
Реализует основные методы Devino REST API


### send
-----
_**Описание**_: Отправка СМС сообщения

##### *Параметры*

*$sourceAddress*: string, отправитель. До 11 латинских символов или до 15 цифровых.
*$destinationAddress*: string|array, адрес или массив адресов назначения. (Код страны+код сети+номер телефона, Пример: 79031234567)
*$data*: string, текст сообщения
*$sendDate*: mixed. дата отправки сообщения. Строка вида (YYYY-MM-DDTHH:MM:SS) или Timestamp (необязательный параметр)
*$validity*: intger, время жизни сообщения в минутах (необязательный параметр)

##### *Пример*

~~~
$devinoSMS->send('test', '7905000000', 'Тестовое сообщение!'); // отправка SMS
$devinoSMS->send('test', '7905000000', 'Тестовое сообщение!', '2015-07-09T11:55:00'); // отправка SMS в указанное время
$devinoSMS->send('test', '7905000000', 'Тестовое сообщение!', '2015-07-09T11:55:00', '10'); // отправка SMS в указанное время и указанием времени жизни сообщения (10 минут)
~~~

### Пример использования API

#### DevinoTelecom

```
require_once 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

$devinoSMS = new SmsClient\DevinoSMS\Api('login', 'password');
try {
    $sessionID = $devinoSMS->getSessionID();
    echo "<h2>SessionID: {$sessionID}</h2><hr />";
    echo "<h2>Balance: {$devinoSMS->getBalance()} руб</h2>";

    $list = $devinoSMS->send('test', '7905000000', 'Тестовое сообщение!');
    $id = reset($list);
    echo "<h2>Send SMS: {$id}</h2>";

    $list = $devinoSMS->sendByTimeZone('test', '7905000000', 'Тестовое сообщение с учетом часового пояса!', '2015-07-09T11:55:00');
    $id = reset($list);
    echo "<h2>Send SMS By Time Zone: {$id}</h2>";

    $list = $devinoSMS->send('test', array('7905000000', '7905000001'), 'Массовое тестовое сообщение!');
    $mes = print_r($list, true);
    echo "<h2>Send SMS Bulk: {$mes}</h2>";

    $result = $devinoSMS->getSMSStatus($id);
    $mes = print_r($result, true);
    echo "<h2>SMS Status: {$mes}</h2>";

} catch (\SmsClient\DevinoSMS\Exception $e) {
    echo $e->getMessage();
}
```

