<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['manv'])) {
					$manv = $_POST['manv'];

					$sql = 'delete from nhanvien where manv = '.$manv;
					execute($sql);
				}
				break;
		}
	}
}