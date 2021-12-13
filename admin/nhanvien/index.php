<?php
require_once ('../../db/dbhelper.php');
require('../../all/header.php')
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Danh sách nhân viên</h2>
			</div>
			<div class="panel-body">
			<div class="row">
					<div class="col-lg-6">
						<a href="insert.php">
						<button  class="btn btn-success" style="margin-bottom: 15px;background-color: #FDF5E6;"><font color="black"><b>Thêm nhân viên</b> </font>  </button>
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
							<th width="50px">Mã nhân viên</th>
							<th>Tên nhân viên</th>
							<th>Giới tính</th>
							<th>Ngày sinh</th>
							<th>Địa chỉ</th>
							<th>SĐT</th>
							<th>Ngày vào làm</th>
							<th>Chức vụ</th>
							<th>Lương</th>
							<th>CCCD</th>
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
	$add= " and tennv like '%$s%'";
}

$sql          = "select * from nhanvien where 1 $add limit $firstIndex,".$limit;
$result = executeResult($sql);

$sql          = "select count(manv) from nhanvien where 1 $add";
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
				<td>$row[3]</td>
				<td>$row[4]</td>
				<td>$row[5]</td>
				<td>$row[6]</td>
				<td>$row[7]</td>
				<td>$row[8]</td>
				<td>$row[9]</td>
				<td>
					<a href='update.php?manv=$row[0]'><button style='background-color: #FFE4E1;' class='btn btn-warning'><img src='../img/edit.png'></button></a>
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
		function deleteCategory(manv) {
			var option = confirm('Bạn có chắc chắn muốn xoá nhân viên này không?')
			if(!option) {
				return;
			}

			console.log(manv)
			//ajax - lenh post
			$.post('ajax.php', {
				'manv': manv,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>