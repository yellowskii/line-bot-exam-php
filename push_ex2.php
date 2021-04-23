
<?php

require "vendor/autoload.php";

$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '977670d76e802dffac5da90001614136';



    $server = "voipktbh.dyndns.org";
    $suser = "botadmin";
    $spassword = "ktb5570";
    $database = "ktb-line-bot";


    $conn = mysqli_connect($server,$suser,$spassword,$database);


    if(mysqli_connect_error()){
      echo "Connection Error. ".mysqli_connect_error();
  }
    mysqli_set_charset($conn, "utf8");
    $count = 0;
    $set = 0;
    $strSQL = "SELECT DISTINCT userID FROM vaccine_app WHERE input_date < '2021-04-17' ";

    $usr_array = array(array());
    $result = mysqli_query($conn,$strSQL);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            if($row["0"] != ""){ 
                   if($count >= 500 ){
                        $set++;
                       $count = 0;
                   }
            $usr_array[$set][] = $row["0"];
            $count++;
            }
        }
    } else {
        echo "0 results";
    }



$msg = "ผู้ที่จองวัคซีนออนไลน์ ในวันที่ 16 - 22 เม.ย. แล้วผิดนัดยังไม่ได้มารับวัคซีน
รพ.จะถือว่าท่านสละสิทธิ์ แล้ว
เนื่องจากวัคซีนมีจำกัด และต้องนำมาจัดสรรให้ผู้ที่ต้องการวัคซีนอีกจำนวนมาก
และ รพ. จะหยุดให้บริการวัคซีนเข็ม 1  ในวันที่ 30 เม.ย.นี้ แล้ว

ผู้ที่จองสำเร็จแล้วมีข้อความตอบกลับ สามารถนำข้อความมารับบริการ ในวันที่ 25-30 เม.ย. เวลา 12.30-14.00 น. และต้องนำเอกสารหลักฐานการอาศัยหรือทำงานใน กระทุ่มแบน เช่น บัตรประชาชน  ทะเบียนบ้าน หนังสือรับรองการทำงาน บิลค่าน้ำค่าไฟ เป็นต้น  หรือต้องเป็นผู้ที่มีสิทธิรักษาที่รพ.กระทุ่มแบน
สำหรับผู้ที่ไม่มีหลักฐาน รพ.ขอสงวนสิทธิ ปฏิเสธการให้บริการวัคซีน";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$g=0;
for($j=0;$j<=$set;$j++){
echo "SET".$j."<br>";   
    
 $num = count($usr_array[$j]);
    
for($i=0;$i<$num;$i++){
$g = $g+1;
echo $i." ".$usr_array[$j][$i]." ".$g."<br>"; 

}
}    
/*
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
$response = $bot->multicast($usr_array, $textMessageBuilder);
if ($response->isSucceeded()){
    echo "สำเร็จ";
    echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    return;
}
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
*/
?>
