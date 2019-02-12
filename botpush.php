<?php



require "vendor/autoload.php";

$access_token = 'vOuWquRfFg39HD0blM1+04VixMg88/ZqwJ2RuVjG49Ko3kWY207JEO+LEZ8gNhPcA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgomZik/U9jauTC/bby1ejZ2pu3Ei3qb2/pNGU+dujqOH2QdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';

$pushID = 'U3b837ec7315a4f85582a4c35c405a2e8';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







