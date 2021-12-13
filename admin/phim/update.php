<?php
require_once ('../../db/dbhelper.php');
$maphim=$tenphim='';
if (isset($_GET['maphim'])) {
	$maphim   = $_GET['maphim'];
	$sql          = "select * from phim where maphim='$maphim'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$tenphim = $result[1];
		$thoiluong= $result[2];
		$ngonngu=$result[3];
		$theloai=$result[4];
		$daodien=$result[5];
		$dienvien=$result[6];
		$mota=$result[7];
		$dotuoi=$result[8];
		$trailer=$result[9];
		$poster=$result[10];
		$khoichieu=$result[11];
		$temp1=$result[10];
		$temp2=$result[3];
	}

}
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
	if (empty($poster)) {
		$poster= $temp1;
	}
	if (empty($ngonngu)) {
		$ngonngu= $temp2;
	}

	if (!empty($tenphim)) {
		$sql = "UPDATE `phim` SET `TENPHIM`='$tenphim',`THOILUONG`='$thoiluong',`NGONNGU`='$ngonngu',
		`THELOAI`='$theloai',`DAODIEN`='$daodien',`DIENVIEN`='$dienvien',`MOTA`='$mota',
		`DOTUOI`='$dotuoi',`TRAILER`='$trailer',`poster`='$poster',`khoichieu`='$khoichieu' WHERE `MAPHIM`='$maphim' ";
		
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
				<h2 class="text-center">Sửa Phim</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Phim:</label>
					  <input required="true" type="text" class="form-control" id="tenphim" name="tenphim" value="<?=$tenphim?>">
					  
					</div>
					<div class="form-group">
					  <label for="thoiluong">Thời lượng:</label>
					  <input required="true" type="text" class="form-control" id="thoiluong" name="thoiluong" value="<?=$thoiluong?>">
					</div>
					<div class="form-group">
					  <label for="ngonngu">Ngôn ngữ:</label>
					  <select class="form-control" id="ngonngu" name="ngonngu" >
					  		<option selected disabled value="<?=$ngonngu?>"><?=$ngonngu?></option>
                            <option value="Tiếng Anh - Phụ đề Tiếng Việt">Tiếng Anh - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Hàn - Phụ đề Tiếng Việt">Tiếng Hàn - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Trung - Phụ đề Tiếng Việt">Tiếng Trung - Phụ đề Tiếng Việt</option>
                            <option value="Tiếng Việt">Tiếng Việt</option>
                        </select>
					  
					</div>
					<div class="form-group">
					  <label for="theloai">Thể loại:</label>
					  <input required="true" type="text" class="form-control" id="theloai" name="theloai" value="<?=$theloai?>">
					</div>
					<div class="form-group">
					  <label for="daodien">Đạo diễn:</label>
					  <input required="true" type="text" class="form-control" id="daodien" name="daodien" value="<?=$daodien?>">
					</div>
					<div class="form-group">
					  <label for="dienvien">Diễn Viên:</label>
					  <input  type="text" class="form-control" id="dienvien" name="dienvien" value="<?=$dienvien?>">
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  <textarea class="form-control" name="mota" id="mota" rows="5" ><?=$mota?></textarea>
					</div>
					<div class="form-group">
					  <label for="dotuoi">Độ tuổi:</label>
					  <input  type="text" class="form-control" id="dotuoi" name="dotuoi" value="<?=$dotuoi?>">
					</div>
					<div class="form-group">
					  <label for="trailer">Trailer:</label>
					  <input  type="text" class="form-control" id="trailer" name="trailer" value="<?=$trailer?>">
					</div>
					<div class="form-group">
					<label for="poster">Poster:</label><br>
					  <input class="inputfile"  type="file" name="poster" id="poster" value="<?=$poster?>"><br>
					  <br><img src="../img/phim/<?=$poster?>" style="max-width: 200px;" id="img_poster" alt="">
					</div>
					<div class="form-group">
					  <label for="khoichieu">Khởi chiếu:</label>
					  <input type="date" class="form-control" id="khoichieu" name="khoichieu" value="<?=$khoichieu?>"><br>
                    </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>