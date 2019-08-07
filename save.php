<!doctype html>

<?php

		//Get DB
				$server = "118.172.127.41";
				$suser = "botadmin";
				$spassword = "ktb5570";
				$database = "ktb-line-bot";


				$conn = mysqli_connect($server,$suser,$spassword,$database);

				if(mysqli_connect_error()){
					echo "Connection Error. ".mysqli_connect_error();
				 }
?>




<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <title>ระบบลงทะเบียนการใช้งานKTB LINE bot</title>
  </head>
  <body>

  <div class="container border border-primary m-auto p-5 p-2" >

<?php
    $strSQL = "INSERT INTO account (fname, cid, line_id)
VALUES ('".$_POST["name"]."','".$_POST["cid"]."', '".$_POST["uid"]."')";

    if(mysqli_query($conn,$strSQL)){

        echo "ลงทะเบียนการใช้งานเสร็จสิ้น";

    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>

<div class="text-center">
 <button type="submit" class="btn btn-primary" name="back" onclick="history.go(-1);" >กลับ</button><br><br>
</div>

	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.js"></script>

  </body>
</html>
