<?php



require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';



$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$pushID = 'U3b837ec7315a4f85582a4c35c405a2e8';


for($i=0; $i<3; $i++){

if($i==0)
  $text = "แจ้งเตือนนัดการตรวจรักษาของคุณ AA";
else if($i==1)
  $text = "แจ้งเตือนนัดการตรวจรักษาของคุณ BB";
else
  $text = "แจ้งเตือนนัดการตรวจรักษาของคุณ CC";

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();


}
