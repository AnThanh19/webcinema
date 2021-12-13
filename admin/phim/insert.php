<?php
require_once ('../../db/dbhelper.php');
$maphim = $tenphim = '';
if (!empty($_POST)) {
	if (isset($_POST['tenphim'])) {
		$tenphim = $_POST['tenphim'];
		$thoiluong = $_POST['thoiluong'];
		$ngonngu= $_POST['ngonngu'];
		$theloai = $_POST['theloai'];
		$daodien = $_POST['daodien'];
		$dienvien = $_POST['dienvien'];
		$mota = $_POST['mota'];
		$dotuoi = $_POST['dotuoi'];
		$trailer = $_POST['trailer'];
		$poster = $_POST['poster'];
		$khoichieu= $_POST['khoichieu'];
	}
	if (isset($_POST['maphim'])) {
		$maphim = $_POST['maphim'];
	}

	if (!empty($tenphim)) {
		//Luu vao database
		if ($maphim == '') {
			$sql = 'insert into phim(`TENPHIM`, `THOILUONG`, `NGONNGU`, `THELOAI`, `DAODIEN`, `DIENVIEN`,`MOTA` ,  `DOTUOI`, `TRAILER`, `poster`, `khoichieu`) 
				values ("'.$tenphim.'","'.$thoiluong.'","'.$ngonngu.'","'.$theloai.'","'.$daodien.'","'.$dienvien.'","'.$mota.'","'.$dotuoi.'","'.$trailer.'","'.$poster.'","'.$khoichieu.'")';
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
				<h2 class="text-center">Thêm Phim</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Phim:</label>
					  <input required="true" type="text" class="form-control" id="tenphim" name="tenphim" >
					  
					</div>
					<div class="form-group">
					  <label for="thoiluong">Thời lượng:</label>
					  <input required="true" type="number" class="form-control" id="thoiluong" name="thoiluong" >
					</div>
					<div class="form-group">
					  <label for="ngonngu">Ngôn ngữ:</label><br>
                        <select class="form-control" id="ngonngu" name="ngonngu">
							<option selected disabled>---Chọn ngôn ngữ---</option>
                            <option value="Tiếng Anh - Phụ đề Tiếng Việt">Tiếng Anh - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Hàn - Phụ đề Tiếng Việt">Tiếng Hàn - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Trung - Phụ đề Tiếng Việt">Tiếng Trung - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Việt">Tiếng Việt</option>
                        </select>
					</div>
					<div class="form-group">
                        <label for="theloai">Thể loại:</label><br>
                        <input required="true" type="text" class="form-control" id="theloai" name="theloai">
                    </div>
					<div class="form-group">
					  <label for="daodien">Đạo diễn:</label>
					  <input required="true" type="text" class="form-control" id="daodien" name="daodien" >
					</div>
					<div class="form-group">
					  <label for="dienvien">Diễn Viên:</label>
					  <input  type="text" class="form-control" id="dienvien" name="dienvien" >
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  <textarea class="form-control" name="mota" id="mota" rows="5"></textarea>
					</div>
					<div class="form-group">
					  <label for="dotuoi">Độ tuổi:</label>
					  <input  type="number" class="form-control" id="dotuoi" name="dotuoi">
					</div>
					<div class="form-group">
					  <label for="trailer">Trailer:</label>
					  <input type="text" class="form-control" id="trailer" name="trailer"><br>
                    </div>
					<div class="form-group">
					  <label for="poster">Poster:</label><br>
					  <input type="file" name="poster" id="poster"><br>
					  <!-- <input  type="text" class="form-control" id="poster" name="poster"><br> -->
                    </div>
					<div class="form-group">
					  <label for="khoichieu">Khởi chiếu:</label>
					  <input type="date" class="form-control" id="khoichieu" name="khoichieu"><br>
                    </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>