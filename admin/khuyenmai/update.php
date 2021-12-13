<?php
require_once ('../../db/dbhelper.php');

$makm = $ngaybatdau = '';

if (isset($_GET['makm'])) {
	$makm   = $_GET['makm'];
	$sql    = "select * from khuyenmai where makm='$makm'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$ngaybatdau = $result[1];
		$ngayketthuc= $result[2];
		$phantram= $result[3];
		$poster= $result[4];
		$mota= $result[5];
		$temp=$result[4];
	}

}
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
	if (empty($poster)) {
		$poster= $temp;
	}
	if (!empty($ngaybatdau)) {
		$sql = "UPDATE `khuyenmai` SET `ngaybatdau`='$ngaybatdau',`ngayketthuc`='$ngayketthuc',
			`phantram`='$phantram' ,`poster`='$poster',`mota`='$mota' WHERE `MAKM`='$makm'";
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
				<h2 class="text-center">Sửa khuyến mãi</h2>
			</div>
			<div class="panel-body">
				<h3>Lưu ý: sửa theo format có sẵn</h3>
				<form method="post">
					<div class="form-group">
					  <label for="ngaybatdau">Ngày bắt đầu:</label>
					  <input required="true" type="text" class="form-control" id="ngaybatdau" name="ngaybatdau" value="<?=$ngaybatdau?>">
					</div>
					<div class="form-group">
					  <label for="ngayketthuc">Ngày kết thúc:</label>
					  <input required="true" type="text" class="form-control" id="ngayketthuc" name="ngayketthuc" value="<?=$ngayketthuc?>">
					</div>
					<div class="form-group">
					  <label for="thoiluong">Phần trăm:</label>
					  <input required="true" type="number" min="0" max="50" step ="5" class="form-control" id="phantram" name="phantram" value="<?=$phantram?>">
					</div>	
					<div class="form-group">
					<label for="poster">Poster:</label><br>
					<input class="inputfile"  type="file" name="poster" id="poster" value="<?=$poster?>"><br>
					  <br><img src="../img/khuyenmai/<?=$poster?>" style="max-width: 200px;" id="img_poster" alt="">
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  <textarea class="form-control" name="mota" id="mota" rows="5" ><?=$mota?></textarea>
					</div>		
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>