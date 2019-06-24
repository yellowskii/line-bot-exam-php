<?php



require "vendor/autoload.php";

$access_token = 'rBkKO7/6vcDmR72/1ap9vWGvuPxNz4sD8Zbr0Ik4gV7Ct2rjUU/cWB1rwyagYg46A9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgolflH8b/TCaH/iBWJHBPovWF/CPQioZaO3iSjbR99stRAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';

$pushID = 'U3b837ec7315a4f85582a4c35c405a2e8';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







