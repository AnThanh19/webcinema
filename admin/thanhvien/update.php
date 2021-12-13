<?php
require_once ('../../db/dbhelper.php');
$matv = $tentv = '';
if (isset($_GET['matv'])) {
	$matv   = $_GET['matv'];
	$sql          = "select * from thanhvien where matv='$matv'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$tentv = $result[1];
		$gioitinh= $result[2];
		$ngaysinh=$result[3];
		$diachi=$result[4];
		$sdt=$result[5];
		$cccd=$result[6];
		$ngaydk=$result[7];
		$diemtichluy=$result[8];
		$loaitk=$result[9];
		$email=$result[10];
	}

}
if (!empty($_POST)) {
	if (isset($_POST['tentv'])) {
		$tentv = $_POST['tentv'];
		$gioitinh = $_POST['gioitinh'];
		$ngaysinh= $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		$cccd = $_POST['cccd'];
		$ngaydk = $_POST['ngaydk'];
		$diemtichluy = $_POST['diemtichluy'];
		$loaitk = $_POST['loaitk'];
		$email = $_POST['email'];
	}
	if (isset($_POST['matv'])) {
		$matv = $_POST['matv'];
	}

	if (!empty($tentv)) {
		$sql = "UPDATE `thanhvien` SET `tentv`='$tentv',`gioitinh`='$gioitinh',`ngaysinh`='$ngaysinh',
		`diachi`='$diachi',`sdt`='$sdt',`cccd`='$cccd',`ngaydk`='$ngaydk',`diemtichluy`='$diemtichluy',
		`loaitk`='$loaitk',`email`='$email' WHERE `matv`='$matv' ";
		
        execute($sql);

		header('Location: index.php');
		die();
	}
}
require('../../all/header.php')
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa thành viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
				<div class="form-group">
					  <label for="tentv">Tên thành viên:</label>
					  <input required="true" type="text" class="form-control" id="tentv" name="tentv" value="<?=$tentv?>">
					  
					</div>
					<div class="form-group">
					  <label for="gioitinh">Giới tính (nam=0, nữ=1):</label><br>
					  <input required="true" type="number" class="form-control" id="gioitinh" name="gioitinh" value="<?=$gioitinh?>">
					</div>
					<div class="form-group">
					  <label for="ngaysinh">Ngày sinh:</label>
					  <input required="true" type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="<?=$ngaysinh?>">
					  <small class="form-text text-muted">*Lưu ý: sửa theo định dạng có sẵn</small>
					</div>
					<div class="form-group">
                        <label for="diachi">Địa chỉ:</label><br>
                        <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?=$diachi?>">
                    </div>
					<div class="form-group">
					  <label for="sdt">Số điện thoại:</label>
					  <input required="true" type="number" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>">
					</div>
					<div class="form-group">
					  <label for="cccd">Căn cước công dân:</label>
					  <input required="true" type="number" class="form-control" id="cccd" name="cccd" value="<?=$cccd?>">
                    </div>
					<div class="form-group">
					  <label for="ngaydk">Ngày đăng ký:</label>
					  <input required="true" type="text" class="form-control" id="ngaydk" name="ngaydk" value="<?=$ngaydk?>">
					  <small class="form-text text-muted">*Lưu ý: sửa theo định dạng có sẵn</small>
					</div>
					<div class="form-group">
					  <label for="diemtichluy">Điểm tích lũy:</label>
					  <input type="number" min="0" class="form-control" id="diemtichluy" name="diemtichluy" value="<?=$diemtichluy?>">
                    </div>
					<div class="form-group">
					  <label for="loaitk">Loại tài khoản:</label>
					  <input required="true" type="text" class="form-control" id="loaitk" name="loaitk" value="<?=$loaitk?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>