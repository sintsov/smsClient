# SMS Client

[![Latest Stable Version](https://poser.pugx.org/sintsov/smsclient/v/stable)](https://packagist.org/packages/sintsov/smsclient) [![Total Downloads](https://poser.pugx.org/sintsov/smsclient/downloads)](https://packagist.org/packages/sintsov/smsclient) [![Latest Unstable Version](https://poser.pugx.org/sintsov/smsclient/v/unstable)](https://packagist.org/packages/sintsov/smsclient) [![License](https://poser.pugx.org/sintsov/smsclient/license)](https://packagist.org/packages/sintsov/smsclient)

PHP-класс для работы с API сервисов СМС уведомлений

В настоящий момент поддержка DevinoTelecom http://www.devinotele.com/

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
*$validity*: integer, время жизни сообщения в минутах (необязательный параметр)

##### *Пример*

~~~
$devinoSMS->send('test', '7905000000', 'Тестовое сообщение!'); // отправка SMS
$devinoSMS->send('test', '7905000000', 'Тестовое сообщение!', '2015-07-09T11:55:00'); // отправка SMS в указанное время
$devinoSMS->send('test', '7905000000', 'Тестовое сообщение!', '2015-07-09T11:55:00', '10'); // отправка SMS в указанное время и указанием времени жизни сообщения (10 минут)
~~~

### sendByTimeZone
-----
_**Описание**_: Отправка СМС сообщения с учетом часового пояса получателя

##### *Параметры*

*$sourceAddress*: string, отправитель. До 11 латинских символов или до 15 цифровых.
*$destinationAddress*: string, адрес назначения. (Код страны+код сети+номер телефона, Пример: 79031234567
*$data*: string, текст сообщения
*$sendDate*: mixed. дата отправки сообщения. Строка вида (YYYY-MM-DDTHH:MM:SS) или Timestamp
*$validity*: integer, время жизни сообщения в минутах (необязательный параметр)

##### *Пример*

~~~
$devinoSMS->sendByTimeZone('test', '7905000000', 'Тестовое сообщение!', '1436608063'); // отправка SMS в указанное время с учетом часового пояса получателя указанного в виде timestamp
$devinoSMS->sendByTimeZone('test', '7905000000', 'Тестовое сообщение!', '2015-07-09T11:55:00'); // отправка SMS в указанное время с учетом часового пояса получателя
$devinoSMS->sendByTimeZone('test', '7905000000', 'Тестовое сообщение!', '2015-07-09T11:55:00', '10'); // отправка SMS в указанное время с учетом часового пояса получателя и указанием времени жизни сообщения (10 минут)
~~~

### getSMSStatus
-----
_**Описание**_: Запрос статуса SMS-сообщения

##### *Параметры*

*$messageID*: string, ID сообщения (который возвращает методы send и sendByTimeZone)

##### *Пример*

~~~
$devinoSMS->getSMSStatus($id); // Запрос статуса SMS-сообщения
~~~

### getInbox
-----
_**Описание**_: Запрос входящих SMS-сообщений за указанный период

##### *Параметры*

*$minDateUTC*: mixed, начало периода выборки. Строка вида (YYYY-MM-DDTHH:MM:SS) или Timestamp
*$maxDateUTC*: mixed, конец периода выборки. Строка вида (YYYY-MM-DDTHH:MM:SS) или Timestamp

##### *Пример*

~~~
$devinoSMS->getInbox('2015-07-09T09:00:00', '2015-07-09T19:00:00'); // Запрос входящих SMS-сообщений за указанный период
$devinoSMS->getInbox('1436608063', '1436861906'); // Запрос входящих SMS-сообщений за указанный период используя timestamp
~~~

### getStatistics
-----
_**Описание**_: Запрос статистики по SMS-рассылкам за указанный период

##### *Параметры*

*$startDate*: mixed, начало периода выборки. Строка вида (YYYY-MM-DDTHH:MM:SS) или Timestamp
*$endDate*: mixed, конец периода выборки. Строка вида (YYYY-MM-DDTHH:MM:SS) или Timestamp

##### *Пример*

~~~
$devinoSMS->getStatistics('2015-07-09T09:00:00', '2015-07-09T19:00:00'); //  Запрос статистики по SMS-рассылкам за указанный период
$devinoSMS->getStatistics('1436608063', '1436861906'); //  Запрос статистики по SMS-рассылкам за указанный период используя timestamp
~~~

### getSessionID
-----
_**Описание**_: Получить ID сессии (в рамках API метод вызывается в конструкторе) и отдельно вызывать его не требуется

##### *Пример*

~~~
$devinoSMS->getSessionID(); // получить ID сесси
~~~

### getBalance
-----
_**Описание**_: Запроса баланса

##### *Пример*

~~~
$devinoSMS->getBalance(); // получить баланс
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
    
    $result = $devinoSMS->getStatistics('2015-07-09T09:00:00', '2015-07-09T19:00:00');
    $mes = print_r($result, true);
    echo "<h2>Get Message statistics: {$mes}</h2>";
    
    $result = $devinoSMS->getInbox('2015-07-09T09:00:00', '2015-07-09T19:00:00');
    $mes = print_r($result, true);
    echo "<h2>Get Message Inbox: {$mes}</h2>";

} catch (\SmsClient\DevinoSMS\Exception $e) {
    echo $e->getMessage();
}
```

