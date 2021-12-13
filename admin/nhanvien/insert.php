<?php
require_once ('../../db/dbhelper.php');

$manv = $tennv = '';
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
		if ($manv == '') {
			$sql = 'insert into `nhanvien`( `TENNV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `NGAYVAOLAM`, `CHUCVU`, `LUONG`, `CCCD`)
				values ("'.$tennv.'","'.$gioitinh.'","'.$ngaysinh.'","'.$diachi.'","'.$sdt.'","'.$ngayvaolam.'","'.$chucvu.'","'.$luong.'","'.$cccd.'")';
		} 
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
				<h2 class="text-center">Thêm nhân viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="tennv">Tên nhân viên:</label>
					  <input required="true" type="text" class="form-control" id="tennv" name="tennv" >
					  
					</div>
					<div class="form-group">
					  <label for="gioitinh">Giới tính:</label><br>
                        <select class="form-control" id="gioitinh" name="gioitinh">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
					</div>
					<div class="form-group">
					  <label for="ngaysinh">Ngày sinh:</label>
					  <input required="true" type="datetime-local" class="form-control" id="ngaysinh" name="ngaysinh" >
					</div>
					<div class="form-group">
                        <label for="diachi">Địa chỉ:</label><br>
                        <input required="true" type="text" class="form-control" id="diachi" name="diachi">
                    </div>
					<div class="form-group">
					  <label for="sdt">Số điện thoại:</label>
					  <input required="true" type="number" class="form-control" id="sdt" name="sdt" >
					</div>
					<div class="form-group">
					  <label for="ngayvaolam">Ngày vào làm:</label>
					  <input required="true" type="datetime-local" class="form-control" id="ngayvaolam" name="ngayvaolam" >
					</div>
					<div class="form-group">
					  <label for="chucvu">Chức vụ:</label>
					  <input required="true" type="text" class="form-control" id="chucvu" name="chucvu" >
					</div>
					<div class="form-group">
					  <label for="luong">Lương:</label>
					  <input required="true" type="number" min="1000000" step="100000" class="form-control" id="luong" name="luong">
					</div>
					<div class="form-group">
					  <label for="cccd">Căn cước công dân:</label>
					  <input required="true" type="number" class="form-control" id="cccd" name="cccd"><br>
                    </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>