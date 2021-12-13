<?php
require_once ('../../db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['masc'])) {
					$masc = $_POST['masc'];

					$sql = 'delete from suatchieu where masc = '.$masc;
					execute($sql);
				}
				break;
		}
	}
}