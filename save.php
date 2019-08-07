<!doctype html>

<?php
		echo "WELCOME TO JURASSIC PARK<br><br>";

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

  <div class="container border border-primary m-auto p-5 p-2" style="width: 860px;">

    <h1 class="text-center" >ระบบลงทะเบียนการใช้งานKTB LINE bot</h1>
<?php
    $strSQL = "SELECT medapp.HN, medapp.clinic, medapp.doctor, medapp.appoint_date
        FROM medapp
        JOIN account
        ON medapp.HN = account.HN";

    $result = mysqli_query($conn,$strSQL);
    while($row = mysqli_fetch_array($result)) {
      $dbtext = "HN ".$row["0"]." ไ้ด้มีนัดที่ ".$row["1"]." กับหมอ ".$row["2"]." ในวันที่ ".$row["3"];
    }

echo $dbtext."<br>";

echo "รับ ".$_POST["uid"]." ".$_POST["name"]." ".$_POST["cid"];

?>


	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.js"></script>

  </body>
</html>
