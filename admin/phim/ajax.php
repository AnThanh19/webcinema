<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['maphim'])) {
					$maphim = $_POST['maphim'];

					$sql = 'delete from phim where maphim = '.$maphim;
					execute($sql);
				}
				break;
		}
	}
}