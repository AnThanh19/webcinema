<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['makm'])) {
					$makm = $_POST['makm'];

					$sql = 'delete from khuyenmai where makm = '.$makm;
					execute($sql);
				}
				break;
		}
	}
}