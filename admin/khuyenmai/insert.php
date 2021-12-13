<?php
require_once ('../../db/dbhelper.php');

$makm =$ngaybatdau='';
if (!empty($_POST)) {
	if (isset($_POST['ngaybatdau'])) {
		$ngaybatdau = $_POST['ngaybatdau'];
		$ngayketthuc = $_POST['ngayketthuc'];
		$phantram= $_POST['phantram'];
		$poster= $_POST['poster'];
		$mota= $_POST['mota'];
	
	}
	if (isset($_POST['makm'])) {
		$makm = $_POST['makm'];
	}
	

	if (!empty($ngaybatdau)) {
		//Luu vao database
		if ($makm == '') {
			$sql = 'insert into khuyenmai(`NGAYBATDAU`, `NGAYKETTHUC`, `PHANTRAM`, `poster`, `mota`) 
				values ("'.$ngaybatdau.'","'.$ngayketthuc.'","'.$phantram.'","'.$poster.'","'.$mota.'")';
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
				<h2 class="text-center">Thêm khuyến mãi</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Ngày bắt đầu:</label>
					  <input required="true" type="datetime-local" class="form-control" id="ngaybatdau" name="ngaybatdau" >
					</div>
					<div class="form-group">
					  <label for="name">Ngày kết thúc:</label>
					  <input required="true" type="datetime-local" class="form-control" id="ngayketthuc" name="ngayketthuc" >
					</div>
					<div class="form-group">
					  <label for="thoiluong">Phần trăm:</label>
					  <input required="true" type="number" min="0" max="50" step ="5" class="form-control" id="phantram" name="phantram" >
					</div>
					<div class="form-group">
					  <label for="poster">Poster:</label><br>
					  <input type="file" name="poster" id="poster"><br>
					  <!-- <input  type="text" class="form-control" id="poster" name="poster"><br> -->
                    </div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  <textarea class="form-control" name="mota" id="mota" rows="5" ></textarea>
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>