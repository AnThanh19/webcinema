<?php
require_once ('../../db/dbhelper.php');
$manv=$tennv='';
if (isset($_GET['manv'])) {
	$manv   = $_GET['manv'];
	$sql          = "select * from nhanvien where manv='$manv'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$tennv = $result[1];
		$gioitinh= $result[2];
		$ngaysinh=$result[3];
		$diachi=$result[4];
		$sdt=$result[5];
		$ngayvaolam=$result[6];
		$chucvu=$result[7];
		$luong=$result[8];
		$cccd=$result[9];
	}

}
if (!empty($_POST)) {
	if (isset($_POST['tennv'])) {
		$tennv = $_POST['tennv'];
		$gioitinh = $_POST['gioitinh'];
		$ngaysinh= $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		$ngayvaolam = $_POST['ngayvaolam'];
		$chucvu = $_POST['chucvu'];
		$luong = $_POST['luong'];
		$cccd = $_POST['cccd'];
	}
	if (isset($_POST['manv'])) {
		$manv = $_POST['manv'];
	}

	if (!empty($tennv)) {
		$sql = "UPDATE `nhanvien` SET `tennv`='$tennv',`gioitinh`='$gioitinh',`ngaysinh`='$ngaysinh',
		`diachi`='$diachi',`sdt`='$sdt',`ngayvaolam`='$ngayvaolam',`chucvu`='$chucvu',
		`luong`='$luong',`cccd`='$cccd' WHERE `manv`='$manv' ";
		
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
				<h2 class="text-center">Sửa nhân viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
				<div class="form-group">
					  <label for="tennv">Tên nhân viên:</label>
					  <input required="true" type="text" class="form-control" id="tennv" name="tennv" value="<?=$tennv?>">
					  
					</div>
					<div class="form-group">
					  <label for="gioitinh">Giới tính (nam=0, nữ=1):</label><br>
					  <input required="true" type="number" min="0" max="1" class="form-control" id="gioitinh" name="gioitinh" value="<?=$gioitinh?>">
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
					  <label for="ngayvaolam">Ngày vào làm:</label>
					  <input required="true" type="text" class="form-control" id="ngayvaolam" name="ngayvaolam" value="<?=$ngayvaolam?>" >
					  <small class="form-text text-muted">*Lưu ý: sửa theo định dạng có sẵn</small>
					</div>
					<div class="form-group">
					  <label for="chucvu">Chức vụ:</label>
					  <input required="true" type="text" class="form-control" id="chucvu" name="chucvu" value="<?=$chucvu?>">
					</div>
					<div class="form-group">
					  <label for="luong">Lương:</label>
					  <input required="true" type="number" min="1000000" step="100000" class="form-control" id="luong" name="luong" value="<?=$luong?>">
					</div>
					<div class="form-group">
					  <label for="cccd">Căn cước công dân:</label>
					  <input required="true" type="number" class="form-control" id="cccd" name="cccd" value="<?=$cccd?>"><br>
                    </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>