<?php
require_once ('../../db/dbhelper.php');
require('../../all/header.php')
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Danh sách sản phẩm</h2>
			</div>
			<div class="panel-body">
			<div class="row">
					<div class="col-lg-6">
						<a href="insert.php">
						<button  class="btn btn-success" style="margin-bottom: 15px;background-color: #FDF5E6;"><font color="black"><b>Thêm sản phẩm</b> </font>  </button>
						</a>
					</div>
					<div class="col-lg-6">
						<form method="get">
						<div class="form-group" style="width: 300px; float: right;" >
							<input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
						</div>
						</form>
					</div>
				</div>
				
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Giá</th>
							<th width="125px">Tác vụ</th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$limit =10;
$page=1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
$firstIndex=($page-1) * $limit;
$number=0;
$s='';
if (isset($_GET['s'])) {
	$s = $_GET['s'];
}
$add= '';
if (!empty($s))
{
	$add= " and tensp like '%$s%'";
}
$sql          = "select * from sanpham where 1 $add limit $firstIndex,".$limit;
$result = executeResult($sql);

$sql          = "select count(masp) from sanpham where 1 $add";
$countResult = executeSingleResult($sql);
if ($countResult !=null)
{
	$count= $countResult[0];
	$number= ceil($count/$limit);
}

foreach ($result as $row) 
{
	echo "<tr>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				
				<td>
					<a href='update.php?masp=$row[0]'><button style='background-color: #FFE4E1;' class='btn btn-warning'><img src='../img/edit.png'></button></a>
					<button style='background-color: pink;' class='btn btn-danger' onclick='deleteCategory($row[0])'><img src='../img/garbage.png'></button>
				</td>
		</tr>";
					
}
?>
					</tbody>
				</table>
<?php
require ('../dashboard/page.php');
?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteCategory(masp) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if(!option) {
				return;
			}

			console.log(masp)
			//ajax - lenh post
			$.post('ajax.php', {
				'masp': masp,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>