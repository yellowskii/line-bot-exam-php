<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

function thaimonth($month_num) {
		switch ($month_num){
			case "01" :
				$month = "ม.ค.";
				break;
			case "02" :
				$month = "ก.พ.";
				break;
			case "03" :
				$month = "มี.ค.";
				break;
			case "04" :
				$month = "เม.ย.";
				break;
			case "05" :
				$month = "พ.ค." ;
				break;
			case "06" :
				$month = "มิ.ย.";
				break;
			case "07" :
				$month = "ก.ค." ;
				break;
			case "08" :
				$month = "ส.ค.";
				break;
			case "09" :
				$month = "ก.ย.";
				break;
			case "10" :
				$month = "ต.ค.";
				break;
			case "11" :
				$month = "พ.ย.";
				break;
			case "12" :
				$month = "ธ.ค.";
				break;
		}
		return $month;
	}


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
			$uid = $event['source']['userId'];
			$getmessage = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			if($getmessage == "ตรวจสอบนัดล่าสุด"){

				//Get DB
						$server = "118.172.127.41";
						$suser = "botadmin";
						$spassword = "ktb5570";
						$database = "ktb-line-bot";

						$conn = mysqli_connect($server,$suser,$spassword,$database);


						if(mysqli_connect_error()){
							echo "Connection Error. ".mysqli_connect_error();
					}
						mysqli_set_charset($conn, "utf8");

						 $strSQL = "SELECT medapp.fname, medapp.lname, medapp.HN, medapp.oapp_id ,medapp.clinic, medapp.appoint_date, medapp.time_char, medapp.tel ,medapp.note, account.line_id
								FROM account
								JOIN medapp
								ON account.cid = medapp.cid
								WHERE account.line_id = '".$uid."'
								ORDER BY medapp.id DESC 
								LIMIT 1
								";

								$result = mysqli_query($conn,$strSQL);
								if (mysqli_num_rows($result) > 0) {
										// output data of each row
										while($row = mysqli_fetch_array($result)) {
											$strdate = explode("-",$row["5"]);
											$td = ltrim($strdate[2],"0");
											$tm = thaimonth($strdate[1]);
											$ty = $strdate[0]+543;
											$datetext = $td." เดือน ".$tm." พ.ศ. ".$ty;
											$time_char = str_replace(".", ":", $row["6"]);

											 $text = "คุณ ".$row["0"]." ".$row["1"]." HN ".$row["2"]." หมายเลขใบนัด ".$row["3"]." เบอร์โทร ".$row["7"]." ได้มีนัดที่ ".$row["4"]." ในวันที่ ".$datetext." เวลา ".$time_char." น. NOTE : ".$row["8"]." *หากพบข้อมูลผิดพลาด หรือหมายเลขที่ใช้ไม่ถูกต้อง กรุณาแจ้งห้องเวชระเบียน ขอบคุณค่ะ*";

										}
								} else {
										echo "0 results";
								}

				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];

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
}

echo "OK";
