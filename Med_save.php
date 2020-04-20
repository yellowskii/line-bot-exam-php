<!doctype html>

<?php
			if (!isset($_POST["uid"])){
				header("location:test.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <title>ระบบลงทะเบียนKTB HomeMed</title>
  </head>
  <body>

  <div class="container border border-primary m-auto p-5 p-2" >

<?php

		$uid_lock_SQL = "SELECT *
								FROM account
								WHERE line_id = '".$_POST["uid"]."' ";
		$result1 = mysqli_query($conn,$uid_lock_SQL);
		if (mysqli_num_rows($result1) > 0){

?>
  <h1 class="text-center" >ระบบลงทะเบียนKTB HomeMed</h1>
	<?php
				$strSQL = "INSERT INTO homemed (tel, clinic, med_date, line_id)
									VALUES ('".$_POST["tel"]."', '".$_POST["cln"]."','".$_POST["date"]."', '".$_POST["uid"]."')";

				if(mysqli_query($conn,$strSQL)){

						echo "<h4>กรุณารอการติดต่อกลับ จากทางโรงพยาบาลอีกครั้ง</h4>";
						echo "หากได้รับการติดต่อกลับแล้ว เมื่อถึงวันนัด ให้ผู้ป่วยหรือตัวแทนนำ<a class='font-weight-bold text-danger'>บัตรประชาชนและใบนัด</a>มายื่นที่ <a class='font-weight-bold text-danger'>จุดรับยา2<a> ที่ร้านเวลากาแฟ ข้างอาคารอุบัติเหตุฉุกเฉิน เวลา13.00-15.00น.
						<a class='font-weight-bold'>ตรงกับวันนัดเท่านั้น<a>เพื่อรับยาและใบนัดใหม่ <a class='font-weight-bold'>โดยไม่ต้องทำบัตรเวชระเบียน ไม่ต้องเจาะเลือด ไมต้องรอพบแพทย์พยาบาล<a>";
						
						echo "<br><br>ขอสงวนสิทธิบางกรณีจะมีการติดต่อทาง lineหรือเบอร์โทรที่ให้ไว้เพื่อแจ้งเปลี่ยนแปลงรายละเอียดการรับยาเดิม<br><br>
						";

				} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

			}else{
				$text = "<h1>กรุณาลงทะเบียนผู้ใช้กับโรงพยาบาลด้วยเมนูในLINEก่อน ขอบคุณค่ะ</h1><br><br>";
				echo $text;

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
