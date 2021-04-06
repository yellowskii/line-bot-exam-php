<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap-select-1.13.9/dist/css/bootstrap-select.css">

    <title>ลงทะเบียนวัคซีน</title>
</head>
<style>


</style>
  <body>

  <div class="container border border-primary m-auto p-5 p-2" >

    <h1 class="text-center">ลงทะเบียนวัคซีน</h1>

          <form action="vacc_save.php" method="post">

  <input type="hidden" class="form-control" name="uid" id="uid" required>
  <input type="hidden" class="form-control" name="uprofile" id="uprofile" required>

<div class="input-group">
<label  class="col-2" for="name">ชื่อ </label>
<div class="col">
 <input type="text" class="form-control mb-2" name="name" id="name" required>
</div>
</div>

<div class="input-group">
<label  class="col-2" for="surname">นามสกุล </label>
<div class="col">
 <input type="text" class="form-control mb-2" name="surname" id="surname" required>
</div>
</div>

<div class="input-group">
<label  class="col-2" for="prename">คำนำหน้า</label>
<div class="col">
  <input type="radio" id="male" name="prename" value="นาย">
  <label for="male">นาย</label><br>
  <input type="radio" id="female" name="prename" value="นาง">
  <label for="female">นาง</label><br>
  <input type="radio" id="other" name="prename" value="นางสาว">
  <label for="other">นางสาว</label><br>
</div>
</div>

<div class="input-group">
<label  class="col-2" for="cid">เลขบัตรประชาชน</label>
<div class="col">
 <input type="number" class="form-control mb-2" name="cid" id="cid" maxlength="13" required>
</div>
</div>

<div class="input-group">
<label  class="col-2" for="tel">เบอร์โทรศัพท์</label>
<div class="col">
 <input type="text" class="form-control mb-2" name="tel" id="tel" required>
</div>
</div>

<div class="input-group">
<label  class="col-2" for="gender">เพศ</label>
<div class="col">
  <input type="radio" id="male" name="gender" value="ชาย">
  <label for="male">ชาย</label><br>
  <input type="radio" id="female" name="gender" value="หญิง">
  <label for="female">หญิง</label><br>
</div>
</div>

<div class="input-group">
<label  class="col-2" for="thambon">ตำบล</label>
<div class="col">
  <select class="custom-select custom-select-lg" id="thambon" name="thambon">
    <option selected>กรุณาเลือก</option>
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
<label  class="col-2" for="moo">หมู่ที่</label>
<div class="col">
 <input type="number" class="form-control mb-2" name="moo" id="moo">
</div>
</div>

<div class="input-group">
<label  class="col-2" for="bday">วันเกิด</label>
<div class="col">
 <input type="date" class="form-control mb-2" name="bday" id="bday">
</div>
</div>


<div class="input-group">
<label  class="col-2" for="appoint_date">วันจอง</label>
<div class="col">
  <select class="custom-select custom-select-lg" id="appoint_date" name="appoint_date">
    <option selected>กรุณาเลือก</option>
    <?php

    $dateval = array("2021-04-19","2021-04-20","21-04-2021","22-04-2021","23-04-2021","26-04-2021",
                  "27-04-2021","28-04-2021","29-04-2021","30-04-2021","03-05-2021","05-05-2021","06-05-2021","07-05-2021");
    $time = "12:30 น.";

    for($i=0;$i<count($dateval);$i++)
    {
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
      $count = 0;

      $datetext = $datesplit[0]." ".$datemonth." ".$time." ".$count;
      echo "<option value='".$dateval[$i]."'>".$datetext."</option>";
    }
     ?>
  </select>
</div>
</div>
		</form>

    <div class="text-center">
 				  <button type="submit" class="btn btn-primary" name="submit">ตกลง</button><br><br>
 				 </div>

 				<div class="text-center">
 					<button type="button" id="closebutton" class="btn btn-danger">ปิด</button>
 				</div>

	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="bootstrap-select-1.13.9/dist/js/bootstrap-select.js"></script>
<script>

  window.onload = function (e) {
      liff.init(function (data) {
          initializeApp(data);

  	   document.getElementById('closebutton').addEventListener('click', function () {
  					liff.closeWindow();
  	});

      });

  };

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
