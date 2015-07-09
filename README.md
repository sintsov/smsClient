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

### Пример использования

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

