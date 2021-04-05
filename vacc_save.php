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
	<link
 <button type="submit" class="btn btn-primary" name="back" onclick="history.go(-1);" >กลับ</button><br><br>
</div>

	<?php
		} else{

				$strSQL = "INSERT INTO vaccine_app (target, province, city, sub, moo, station, code, title,name,surname,gender,birthdate,cid,,tel,vacc,appoint_date,input_date,profile,userID)
									VALUES ('5-ประชาชนทั่วไป', '74-สมุทรสาคร','02-กระทุ่มแบน', '".$_POST["thambon"]."', '".$_POST["moo"]."', 'โรงพยาบาลกระทุ่มแบน', '11304', '".$_POST["prename"]."',
										 				'".$_POST["name"]."', '".$_POST["surname"]."','".$_POST["gender"]."', '".$_POST["bday"]."', '".$_POST["cid"]."', '".$_POST["tel]."',)";

				if(mysqli_query($conn,$strSQL)){

						echo "ลงทะเบียนวัคซีนเสร็จสิ้น";

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
