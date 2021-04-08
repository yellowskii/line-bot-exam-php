<!doctype html>

<?php

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
  <link rel="stylesheet" href="bootstrap-select-1.13.9/dist/css/bootstrap-select.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.calendars.picker.css">

    <title>ลงทะเบียนวัคซีน</title>
</head>
<style>


</style>
  <body>
  <div class="container h-100 border border-primary m-auto" >

    <h1 class="text-center">ลงทะเบียนวัคซีน</h1>

          <form action="vacc_save.php" method="post">

  <input type="hidden" class="form-control" name="uid" id="uid" required>
  <input type="hidden" class="form-control" name="uprofile" id="uprofile" required>

<div class="input-group">
<label  class="col-4 col-form-label" for="name">ชื่อ </label>
<div class="col-8">
 <input type="text" class="form-control mb-2" name="name" id="name" required>
</div>
</div>

<div class="input-group">
<label  class="col-4 col-form-label" for="surname">นามสกุล </label>
<div class="col-8">
 <input type="text" class="form-control mb-2" name="surname" id="surname" required>
</div>
</div>

<div class="input-group">
<label  class="col-4 col-form-label" for="prename">คำนำหน้า</label>
<div class="col-8">
  <input type="radio" id="male" name="prename" value="นาย" required>
  <label for="male">นาย</label><br>
  <input type="radio" id="female" name="prename" value="นาง">
  <label for="female">นาง</label><br>
  <input type="radio" id="other" name="prename" value="นางสาว">
  <label for="other">นางสาว</label><br>
</div>
</div>

<div class="input-group">
<label  class="col-4" for="cid">เลขบัตรประชาชน</label>
<div class="col-8">
 <input type="text" class="form-control mb-2" name="cid" id="cid" pattern="[0-9]{13}" required>
</div>
</div>

<div class="input-group">
<label  class="col-4" for="tel">เบอร์โทรศัพท์</label>
<div class="col-8">
 <input type="text" class="form-control mb-2" name="tel" id="tel" required>
</div>
</div>

<div class="input-group">
<label  class="col-4" for="gender">เพศ</label>
<div class="col-8">
  <input type="radio" id="male" name="gender" value="ชาย" required>
  <label for="male">ชาย</label><br>
  <input type="radio" id="female" name="gender" value="หญิง">
  <label for="female">หญิง</label><br>
</div>
</div>

<div class="input-group">
<label  class="col-4" for="thambon">ตำบล</label>
<div class="col-8">
  <select class="custom-select custom-select-lg mb-2" id="thambon" name="thambon" required>
    <option value="" selected>กรุณาเลือก</option>
    <option value="01-ตลาดกระทุ่มแบน">ตลาดกระทุ่มแบน</option>
    <option value="02-อ้อมน้อย">อ้อมน้อย</option>
    <option value="03-ท่าไม้">ท่าไม้</option>
    <option value="04-สวนหลวง">สวนหลวง</option>
    <option value="05-บางยาง">บางยาง</option>
    <option value="06-คลองมะเดื่อ">คลองมะเดื่อ</option>
    <option value="07-หนองนกไข่">หนองนกไข่</option>
    <option value="08-ดอนไก่ดี">ดอนไก่ดี</option>
    <option value="09-แคราย">แคราย</option>
    <option value="10-ท่าเสา">ท่าเสา</option>
  </select>
</div>
</div>

<div class="input-group">
<label  class="col-4" for="moo">หมู่ที่</label>
<div class="col-8">
 <input type="number" class="form-control mb-2" name="moo" id="moo">
</div>
</div>

<div class="input-group">
<label  class="col-4" for="bday">วันเกิด</label>
<div class="col-8">
 <input type="text" class="form-control mb-2" name="bday" id="bday" required>
</div>
</div>


<div class="input-group">
<label  class="col-4" for="appoint_date">วันจอง</label>
<div class="col-8">
  <select class="custom-select custom-select-lg mb-2" id="appoint_date" name="appoint_date" required>
    <option value="" selected>กรุณาเลือก</option>
    <?php



    $dateval = array("2021-04-16","2021-04-19","2021-04-20","2021-04-21","2021-04-22","2021-04-23","2021-04-26",
                  "2021-04-27","2021-04-28","2021-04-29","2021-04-30","2021-05-03","2021-05-05","2021-05-06","2021-05-07");
    $count = array_fill(0, count($dateval), '0');
    $time = "12:30 น.";
    $limit = 300;

    $SQL = "SELECT appoint_date , count(id) AS counter
                FROM vaccine_app
                GROUP BY appoint_date";
    $result = mysqli_query($conn,$SQL);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
          for($j=0;$j<count($dateval);$j++){
            if($dateval[$j] == $row[0]){
              $count[$j] = $row[1];
            }
          }
      }
   }

    for($i=0;$i<count($dateval);$i++)
    {
        if($count[$i] < $limit){

     $datesplit = explode("-",$dateval[$i]);

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
      $datetext = $datesplit[2]." ".$datemonth." ".$time;
      echo "<option value='".$dateval[$i]."'>".$datetext."</option>";
      }
    }
     ?>
  </select>
</div>
</div>

<div class="text-center">
      <button type="submit" class="btn btn-primary" name="submit">ตกลง</button><br><br>
     </div>

    <div class="text-center">
      <button type="button" id="closebutton" class="btn btn-danger">ปิด</button>
    </div>
		</form>



	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="bootstrap-select-1.13.9/dist/js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/jquery.calendars.js"></script>
<script type="text/javascript" src="js/jquery.calendars.plus.js"></script>
<script type="text/javascript" src="js/jquery.plugin.js"></script>
<script type="text/javascript" src="js/jquery.calendars.thai.js"></script>
<script type="text/javascript" src="js/jquery.calendars.thai-th.js"></script>
<script type="text/javascript" src="js/jquery.calendars.picker.js"></script>
<script type="text/javascript" src="js/jquery.calendars.picker-th.js"></script>
<script>

  window.onload = function (e) {
      liff.init(function (data) {
          initializeApp(data);

  	   document.getElementById('closebutton').addEventListener('click', function () {
  					liff.closeWindow();
  	});
      });

  };

	$('#bday').calendarsPicker({calendar: $.calendars.instance('thai','th'),
	 dateFormat: 'yyyy-mm-dd'})

	 $('#bday').change(function () {
		 var birthday = $('#bday').val();
		 var bdab = new Date(birthday);
		 var bdayY = bdab.getFullYear();

		 var now = new Date();
		 var currentY = now.getFullYear();
		 var age = (currentY + 543) - bdayY;
		 if(age < 18 || age > 59){
			 var agetext = "กรุณาเลือกวันเกิดให้ถูกต้อง วัคซีนนี้เปิดให้บริการเฉพาะผู้ที่มีอายุ 18-59 ปีเท่านั้น";
			 alert(agetext);
			 $('#bday').val("");
		 }

});
    function initializeApp(data) {

	$('#uid').val(data.context.userId);

	liff.getProfile().then(profile => {
			$('#uprofile').val(profile.displayName);
	})
	.catch((err) => {
		  console.log('error', err);
	});


}

</script>

  </body>
</html>
