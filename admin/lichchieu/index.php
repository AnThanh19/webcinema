<?php
require_once ('../../db/dbhelper.php');
require('../../all/header.php')
?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Danh sách lịch chiếu</h2>
			</div>
			<div class="panel-body">
			<div class="row">
					<div class="col-lg-6">
						<a href="insert.php">
						<button  class="btn btn-success" style="margin-bottom: 15px;background-color: #FDF5E6;"><font color="black"><b>Thêm lịch chiếu</b> </font>  </button>
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
				
				<table class="table table-bordered table-hover" >
					<thead>
						<tr>
							<th width="50px">Mã suất chiếu</th>
							<th >Tên phim</th>
							<th>Phòng</th>
							<th>Tên rạp</th>
							<th>Địa chỉ</th>
							<th>Ngày chiếu</th>
							<th>Khởi chiếu</th>
							<th>Tác vụ</th>
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
	$add= " and tenphim like '%$s%'";
}

$sql          = "select sc.MASC,p.tenphim,sc.PHONG,rc.TENRAP,rc.DIACHI,sc.NGAYCHIEU,p.khoichieu
from phim p join suatchieu sc on p.MAPHIM=sc.MAPHIM JOIN rapchieu rc ON rc.MARAP=sc.MARAP 
where sc.MAGHE='0'  $add ORDER by sc.MASC limit $firstIndex,$limit";
$result = executeResult($sql);

$sql          = "select count(masc) from suatchieu where maghe='0'  $add";
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
				<td>
					<a href='update.php?masc=$row[0]'><button style='background-color: #FFE4E1;' class='btn btn-warning'><img src='../img/edit.png'></button></a>
				
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
		function deleteCategory(masc) {
			var option = confirm('Bạn có chắc chắn muốn xoá suất chiếu này không?')
			if(!option) {
				return;
			}

			console.log(masc)
			//ajax - lenh post
			$.post('ajax.php', {
				'masc': masc,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>