
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

    $strSQL = "SELECT DISTINCT userID FROM vaccine_app WHERE appoint_date > '2021-05-01' ";

    $usr_array = array();
    $result = mysqli_query($conn,$strSQL);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            array_push($usr_array , $row["0"]);
        }
    } else {
        echo "0 results";
    }



    $msg = "เนื่องจาก คำสั่งจากสาธารณสุขจังหวัดให้ รพ.เร่งฉีดวัคซีนล็อตนี้ให้หมด ก่อน 30 เม.ย.
ดังนั้นวันที่ 2-7 พ.ค. จะไม่มีวัคซีนเข็ม1 ให้แล้ว

ผู้จองวัคซีนในวันที่  2-7 พ.ค.ทุกคน  สามารถนำข้อความการจองเดิมด้านบน  มาขอรับวัคซีนที่ รพ.กระทุ่มแบน ในช่วงวันที่ 19-30 เม.ย.  เวลา 12.30-14.00 
ยกเว้นวันเสาร์ที่ 24 เม.ย. รพ.หยุดให้บริการวัคซีน
ขออภัยในความไม่สะดวกในครั้งนี้";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
$response = $bot->multicast($usr_array, $textMessageBuilder);
if ($response->isSucceeded()){
    echo "สำเร็จ";
    return;
}
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();


?>
