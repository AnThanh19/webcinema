<?php
require_once ('../../db/dbhelper.php');

$masp = $tensp = '';
if (!empty($_POST)) {
	if (isset($_POST['tensp'])) {
		$tensp = $_POST['tensp'];
		$gia = $_POST['gia'];
	
	}
	if (isset($_POST['masp'])) {
		$masp = $_POST['masp'];
	}

	if (!empty($tensp)) {
		//Luu vao database
		if ($masp == '') {
			$sql = 'INSERT INTO sanpham( `TENSP`, `GIA`) values ("'.$tensp.'","'.$gia.'")';
		} 
        execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['masp'])) {
	$masp       = $_GET['masp'];
	$sql      = 'select * from sanpham where masp = '.$masp;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$tensp = $category['tensp'];
	}
}
require('../../all/header.php')
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Sản phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Sản phẩm:</label>
					  <input required="true" type="text" class="form-control" id="tensp" name="tensp" >
					  
					</div>
					<div class="form-group">
					  <label for="thoiluong">Giá:</label>
					  <input required="true" type="number" class="form-control" id="gia" name="gia" >
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>