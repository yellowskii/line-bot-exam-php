
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
    $strSQL = "SELECT DISTINCT userID FROM vaccine_app WHERE appoint_date >= '2021-04-29' ";

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



$msg = "ผู้ที่จองคิวออนไลน์วันที่  29 เม.ย. - 7 พ.ค. 64  ขอให้มารับวัคซีน ก่อนวันที่ 30 เม.ย. เวลา 11.00น.  เนื่องจากรพ.ต้องจัดการวัคซีนให้หมด ใน30 เม.ย.
วัคซีนจะหมดในวันที่30 เม.ย. นี้แล้ว";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);

$g=0;
for($j=1;$j<=$set;$j++){
echo "SET".$j."<br>";   
    
 $num = count($usr_array[$j]);
    
for($i=0;$i<$num;$i++){
$g = $g+1;
echo $i." ".$usr_array[$j][$i]." ".$g."<br>"; 

}
    /*
    $response = $bot->multicast($usr_array[$j], $textMessageBuilder);
if ($response->isSucceeded()){
    echo "สำเร็จ";
    
}
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    */
}    




?>
