<?php
require_once ('../../db/dbhelper.php');
$ma=0;
$masc = $phong = '';
if (!empty($_POST)) {
	if (isset($_POST['phong'])) {
		$phong = $_POST['phong'];
		$maphim = $_POST['maphim'];
		$marap= $_POST['marap'];
		$ngaychieu = $_POST['ngaychieu'];
	}
	if (isset($_POST['masc'])) {
		$masc = $_POST['masc'];
	}

	if (!empty($phong)) {
		if ($masc == '') {
			$sql = ' insert into `suatchieu`(`MAGHE`, `PHONG`, `MAPHIM`, `MARAP`, `SOHD`, `NGAYCHIEU`, `THOIGIAN`)
				values ("'.$ma. '","'.$phong.'","'.$maphim.'","'.$marap.'","'.$ma. '","'.$ngaychieu.'","'.$ngaychieu.'")';
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
				<h2 class="text-center">Thêm lịch chiếu</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="maphim">Tên phim:</label>
					  <select class="form-control" id="maphim" name="maphim">
                            <option selected>Chọn</option>
                                <?php
									$sql = "SELECT * FROM `phim` ";
        							$result=executeResult($sql);
									foreach ($result as $row)
                                    {
                                ?>
                            	<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
					</div>
					<div class="form-group">
					  <label for="phong">Phòng:</label><br>
                        <select class="form-control" id="phong" name="phong">
                            <option value="1">1</option>
                            <option value="2">2</option>
							<option value="3">3</option>
                            <option value="4">4</option>
							<option value="5">5</option>
                        </select>
					</div>
					<div class="form-group">
					  <label for="marap">Tên rạp:</label>
					  <select class="form-control" id="marap" name="marap">
                            <option selected>Chọn</option>
                                <?php
									$sql = "SELECT * FROM `rapchieu` ";
        							$result=executeResult($sql);
									foreach ($result as $row)
                                    {
                                ?>
                            	<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
					</div>
					<div class="form-group">
					  <label for="ngaychieu">Ngày chiếu:</label>
					  <input required="true" type="datetime-local" class="form-control" id="ngaychieu" name="ngaychieu" >
					</div>
					<br>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>