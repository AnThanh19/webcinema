<?php
require_once ('../../db/dbhelper.php');
$masc = $phong =$maphim=$marap= '';
if (isset($_GET['masc'])) {
	$masc   = $_GET['masc'];
	$sql    = "select sc.PHONG,p.TENPHIM,rc.TENRAP,p.MAPHIM,rc.MARAP,sc.NGAYCHIEU
		from phim p join suatchieu sc on p.MAPHIM=sc.MAPHIM JOIN rapchieu rc ON rc.MARAP=sc.MARAP 
		where masc='$masc'";
	$result = executeSingleResult($sql);
	
	if ($result != null) {
		$phong = $result[0];
		$tenphim=  $result[1];
		$tenrap= $result[2];
		$maphim= $result[3];
		$marap=$result[4];
		$ngaychieu=$result[5];
		$tempphim=$result[3];
		$temprap=$result[4];
	}

}
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
	if (empty($maphim)) {
		$maphim= $tempphim;
	}
	if (empty($marap)) {
		$marap= $temprap;
	}
	if (!empty($phong)) {
		$sql = "UPDATE `suatchieu` SET `phong`='$phong',`maphim`='$maphim',`marap`='$marap',
		`ngaychieu`='$ngaychieu' WHERE `masc`='$masc' ";
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
				<h2 class="text-center">Sửa suất chiếu</h2>
			</div>
			<div class="panel-body">
				<form method="post">
				<div class="form-group">
					  <label for="maphim">Tên phim:</label>
					  <select class="form-control" id="maphim" name="maphim">
                            <option hidden selected disabled ><?=$tenphim?></option>
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
					  		<option hidden selected disabled ><?=$tenrap?></option>
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
					  <input required="true" type="datetime" class="form-control" id="ngaychieu" name="ngaychieu" value="<?=$ngaychieu?>">
					</div>
					<br>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>