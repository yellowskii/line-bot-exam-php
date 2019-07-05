<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			$getmessage = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			
			$messages_regis = [
				'type' => 'text',
				'text' => "กรุณาระบุHNและเลขประจำตัวประชานค่ะ"
			];
			
			$messages_check = [
				'type' => 'text',
				'text' => "ดำเนินการตรวจสอบการนัด"
			];

			if($getmessage == "ลงทะเบียนใช้งาน"){
				$messages = $messages_regis;
			}
			
			if($getmessage == "ตรวจสอบนัดล่าสุด"){
				$messages = $messages_check;
			}
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}

echo "OK";

//Get DB
				$server = "118.172.127.41";
				$suser = "root";
				$spassword = "";
				$database = "ktb-line-bot";

				$conn = mysqli_connect($server,$suser,$spassword,$database);


				if (mysqli_connect_errno()) {
				    echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				
				$strSQL = "SELECT HN, fname, lname, cid,  appoint_date, clinic, doctor, tel, note 
						   FROM medapp
						   JOIN account
						   ON medapp.HN = account.HN";
			
				$result = mysqli_query($conn,$strSQL);
				while($row = mysqli_fetch_assoc($result)) {
					$dbtext = "คุณ ".$row["fname"]." ".$row["lname"]." นัดคลินิก ".$row["clinic"]." กับแพทย์ ".$row["doctor"]." คือวันที่ ".$row["appoint_date"];
				}


echo $dbtext;
