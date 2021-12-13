<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['masp'])) {
					$masp = $_POST['masp'];

					$sql = 'delete from sanpham where masp = '.$masp;
					execute($sql);
				}
				break;
		}
	}
}