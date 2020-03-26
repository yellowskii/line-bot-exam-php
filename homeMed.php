<!doctype html>
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
    <h1 class="text-center" >ระบบลงทะเบียนKTB HomeMed</h1>
	<form  id="myForm" action="save.php" method="post" >
          <input type="hidden" class="form-control" name="uid" id="uid" required>
        <div class="form-group">
          <label for="tel">เบอร์โทร</label>
          <input type="text" class="form-control" name="tel" id="tel" pattern= "[0-9]" required>
        </div>
        <div class="form-group">
          <label for="cln">คลินิก</label>
          <input type="text" class="form-control" name="cln" id="cln" required>
        </div>
        <div class="form-group">
					<label for="date">วันที่นัด</label>
					<input type="date" class="form-control" name="date" id="date" maxlength = "13" required>
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
};
function initializeApp(data) {
    document.getElementById('uid').value = data.context.userId;
}
</script>
  </body>
</html>
