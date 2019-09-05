<?php



require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';

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

    $date = date("Y-m-d", strtotime("+1 day"));
   $date2 = date("Y-m-d", strtotime("+2 day"));

    $strSQL = "SELECT medapp.fname, medapp.lname, medapp.HN, medapp.oapp_id ,medapp.clinic, medapp.appoint_date, medapp.time_char, medapp.tel ,medapp.note, account.line_id
        FROM account
        JOIN medapp
        ON account.cid = medapp.cid
        WHERE medapp.appoint_date BETWEEN '".$date."' AND '".$date2."'
        ";

    $msg_array = array();
    $usr_array = array();
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

          $text = "คุณ ".$row["0"]." ".$row["1"]." HN ".$row["2"]." หมายเลขใบนัด ".$row["3"]." เบอร์โทร ".$row["7"]." ได้มีนัดที่ ".$row["4"]." ในวันที่ ".$datetext." เวลา ".$time_char." น. NOTE : ".$row["8"]." *หากข้อมูล หรือเบอร์โทรไม่ถูกต้อง กรุณาแจ้งห้องเวชระเบียน ขอบคุณค่ะ*";
            array_push($msg_array , $text);
            array_push($usr_array , $row["9"]);
        }
    } else {
        echo "0 results";
    }

$num = count($msg_array);


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


for($i=0;$i<$num;$i++){

$pushID = $usr_array[$i];

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg_array[$i]);
$response = $bot->pushMessage($pushID, $textMessageBuilder);
echo $i." ";
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

}
