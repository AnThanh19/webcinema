<?php
require_once ('../../db/dbhelper.php');

$matv = $tentv = '';
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
		if ($matv == '') {
			$sql = 'insert into `thanhvien`( `TENtV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `CCCD`, `NGAYDk`, `DIEMTICHLUY`, `LOAITK`, `EMAIL`)
				values ("'.$tentv.'","'.$gioitinh.'","'.$ngaysinh.'","'.$diachi.'","'.$sdt.'","'.$cccd.'","'.$ngaydk.'","'.$diemtichluy.'","'.$loaitk.'","'.$email.'")';
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
				<h2 class="text-center">Thêm thành viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="tentv">Tên thành viên:</label>
					  <input required="true" type="text" class="form-control" id="tentv" name="tentv" >
					  
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
					  <label for="cccd">Căn cước công dân:</label>
					  <input required="true" type="number" class="form-control" id="cccd" name="cccd">
                    </div>
					<div class="form-group">
					  <label for="ngaydk">Ngày đăng ký:</label>
					  <input required="true" type="datetime-local" class="form-control" id="ngaydk" name="ngaydk" >
					</div>
					<div class="form-group">
					  <label for="diemtichluy">Điểm tích lũy:</label>
					  <input type="number" min="0" class="form-control" id="diemtichluy" name="diemtichluy">
                    </div>
					<div class="form-group">
					  <label for="loaitk">Loại tài khoản:</label>
					  <select class="form-control" id="loaitk" name="loaitk">
					  		<option value="Kim cương">Kim cương</option>
                            <option value="Vàng">Vàng</option>
                            <option value="Bạc">Bạc</option>
							<option value="Đồng">Đồng</option>
                        </select>
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email">
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>