<!doctype html>

<?php
				require "vendor/autoload.php";

				$access_token = 'wFJmyBRjsUu7s8WP2ucTr6KhCMjl0h3Wt8UXcbwRM9IG0sRVs6QXWSzUGQ/WX4HCA9zzufn0PVY+jr87W1jf3rD6ZAL4o/LXMgzFgxMWgokB5BAFUGGVW9S+KOKDD1HVTa5bZ37mw++zLQsFdGz+vAdB04t89/1O/w1cDnyilFU=';

				$channelSecret = '977670d76e802dffac5da90001614136';

				if (!isset($_POST["uid"])){
  			exit(0);
			}

		//Get DB
				$server = "voipktbh.dyndns.org";
				$suser = "botadmin";
				$spassword = "ktb5570";
				$database = "ktb-line-bot";


				$conn = mysqli_connect($server,$suser,$spassword,$database);

				if(mysqli_connect_error()){
					echo "Connection Error. ".mysqli_connect_error();
				 }
				 mysqli_set_charset($conn, "utf8");
?>




<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	    <title>ระบบลงทะเบียนวัคซีน</title>
	  </head>
	  <body>

			<div class="container border border-primary m-auto p-5 p-2" >
<?php
				
 $limit = 100;
  $count_SQL = "SELECT appoint_date , count(id) AS counter
                FROM vaccine_app
		WHERE appoint_date = '".$_POST["appoint_date"]."' AND input_date > '2021-04-17'
                GROUP BY appoint_date";
    $result3 = mysqli_query($conn,$count_SQL);
    if (mysqli_num_rows($result3) > 0) {
      while($row = mysqli_fetch_array($result3)) {
          if($row[1] >= $limit)
	    $text = "<div class='text-danger'>เนื่องจากวันที่เลือกจองของวัคซีนนี้เต็มจำนวนแล้ว กรุณาเลือกวันอื่นด้วยค่ะ</div>";
      }
	   
   }				
				
				
			$cid_lock_SQL = "SELECT *
					FROM vaccine_app
					WHERE cid = '".$_POST["cid"]."' ";
			$result2 = mysqli_query($conn,$cid_lock_SQL);
			if (mysqli_num_rows($result2) > 0){

				$text = "<div class='text-danger'>บุคคลนี้ลงทะเบียนจองวัคซีนแล้ว แก้ไขไม่ได้</br>
ถ้าไม่มีข้อความตอบกลับ</br>
ให้ พิมพ์ 'ชื่อ นามสกุล เลข13หลัก ขอตรวจสอบการจอง' </br>
แล้วจะมีตอบกลับหลังตรวจสอบข้อมูล ใน 2-3 วัน</div>";

			}	
				
			if(isset($text)){
				echo $text;

 ?>


<div class="text-center">
 <button type="submit" class="btn btn-primary" name="back" onclick="history.go(-1);" >กลับ</button><br><br>
</div>

	<?php
} else{

				 $bdatesplit = explode("-",$_POST["bday"]);
				 $bdate = (((int)$bdatesplit[0]) - 543)."-".$bdatesplit[1]."-".$bdatesplit[2];

				$date= date("Y-m-d");
				$boolean = TRUE;
				$strSQL = "INSERT INTO vaccine_app (target, province, city, sub, moo, station, code, title,name,surname,gender,birthdate,cid,tel,vacc,appoint_date,input_date,profile,userID)
									VALUES ('5-ประชาชนทั่วไป', '74-สมุทรสาคร','02-กระทุ่มแบน', '".$_POST["thambon"]."', '".$_POST["moo"]."', 'โรงพยาบาลกระทุ่มแบน', '11304', '".$_POST["prename"]."',
										 				'".$_POST["name"]."', '".$_POST["surname"]."','".$_POST["gender"]."', '".$bdate."', '".$_POST["cid"]."', '".$_POST["tel"]."',".$boolean.", '".$_POST["appoint_date"]."', '".$date."','".$_POST["uprofile"]."', '".$_POST["uid"]."')";

				if(mysqli_query($conn,$strSQL)){

						echo "ลงทะเบียนวัคซีนเสร็จสิ้น";

						$datesplit = explode("-",$_POST["appoint_date"]);

					 switch ($datesplit[1]) {
					 case "01":
							 $datemonth = "ม.ค.";
							 break;
					 case "02":
							 $datemonth = "ก.พ.";
							 break;
					 case "03":
							 $datemonth = "มี.ค.";
							 break;
					 case "04":
							 $datemonth = "เม.ย.";
							 break;
					 case "05":
							 $datemonth = "พ.ค.";
							 break;
						 }
						 $datetext = $datesplit[2]." ".$datemonth;

						$text = "คุณ ".$_POST["name"]." ".$_POST["surname"]." ได้ลงทะเบียนจองคิวฉีดวัคซีนโควิด
วันที่ ".$datetext." เรียบร้อยแล้ว
กรุณานำบัตรประชาชน มาที่ชั้น G อาคารหลังใหม่ 10 ชั้น  ตามวันเวลานัด และแนะนำให้ add line หมอพร้อม  https://line.me/R/ti/p/%40475ptmfj ซึ่งจะใช้ติดตามอาการหลังฉีด เพื่อความสะดวกด้วยค่ะ";

						$pushID = $_POST["uid"];

						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
						$response = $bot->pushMessage($pushID, $textMessageBuilder);
/*					echo $i." ";
						echo $response->getHTTPStatus() . ' ' . $response->getRawBody();*/


				} else {

				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

		}

?>
<div class="text-center">
<button type="button" id="closebutton" class="btn btn-danger"  >ปิด</button>
</div>

	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.js"></script>
<script>

window.onload = function (e) {
    liff.init(function (data) {
			document.getElementById('closebutton').addEventListener('click', function () {
					liff.closeWindow();
			});
    });
};
</script>
  </body>
</html>
