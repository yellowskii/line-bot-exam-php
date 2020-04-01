<!doctype html>
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

    <h1 class="text-center" >ระบบลงทะเบียนการใช้งานKTB LINE bot</h1>

	<form  id="myForm" action="save.php" method="post" >


          <input type="text" class="form-control" name="uid" id="uid" required>
	 <input type="text" class="form-control" name="uprofile" id="uprofile" required>


        <div class="form-group">
          <label for="name">ชื่อ</label>
          <input type="text" class="form-control" name="fname" id="fname" required>
        </div>

        <div class="form-group">
          <label for="name">นามสกุล</label>
          <input type="text" class="form-control" name="lname" id="lname" required>
        </div>

        <div class="form-group">
					<label for="date">เลขประจำตัวประชาชน</label>
					<input type="text" class="form-control" name="cid" id="cid" maxlength = "13" required>

			  </div>

				 <div class="text-center">
				  <button type="submit" class="btn btn-primary" name="submit">ตกลง</button><br><br>

				 </div>
				
				<div class="text-center">
					<button type="button" id="closebutton" class="btn btn-danger"  >ปิด</button>
				</div>
		

			</form>
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
        initializeApp(data);
	    
	   document.getElementById('closebutton').addEventListener('click', function () {
					liff.closeWindow();
	});
	   
    });
		
	liff.getProfile().then(profile => {
			$('#uprofile').val("AB306");
	})
		.catch((err) => {
		  console.log('error', err);
		}); 
	
};

function initializeApp(data) {
	
	$('#uid').val(data.context.userId);
	
    
}

</script>

  </body>
</html>
