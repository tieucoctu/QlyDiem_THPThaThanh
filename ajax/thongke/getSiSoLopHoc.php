<?php
session_start();
ob_start();
require './../../template/config.php';

header('Content-Type: application/json');


$response = [];

if((empty($_SESSION['username']) && empty($_SESSION['password']))) {

	$response = [
	    "draw" => 0,
	    "iTotalRecords" => 0,
	    "iTotalDisplayRecords" => 0,
	    "aaData" => []
	];
}
else {
	
	// Xem phân quyền c
	$taikhoan = array();
	$result = $mysqli->query('SELECT * FROM `taikhoan` WHERE `username`=\''.htmlspecialchars($_SESSION['username']).'\' AND `password`=\''.htmlspecialchars($_SESSION['password']).'\';');

	if ($result->num_rows > 0) {
		$taikhoan = $result->fetch_array(MYSQLI_ASSOC);
		if (in_array($taikhoan['role'], array('admin', 'manager'))) {

			$draw = empty($_POST['draw']) ? '' : htmlspecialchars($_POST['draw']);  
			$row = empty($_POST['start']) ? 0 : htmlspecialchars($_POST['start']); 
			$rowperpage =empty($_POST['length']) ? 999999999999 : htmlspecialchars($_POST['length']);  // Rows display per page
			if ($rowperpage = -1) {
				$rowperpage = 999999999999;
			}
			##SortOrder 
			$columnIndex = empty($_POST['order'][0]['column']) ? 0 : htmlspecialchars($_POST['order'][0]['column']); // Column index
			$columnName =  'namHoc'; // Column name
			if (is_array($_POST['columns'][$columnIndex]['data'])) {
				$columnName = empty($_POST['columns'][$columnIndex]['data']['sort']) ? 'namHoc' : htmlspecialchars($_POST['columns'][$columnIndex]['data']['sort']);
			} else {
				$columnName = empty($_POST['columns'][$columnIndex]['data']) ? 'namHoc' : htmlspecialchars($_POST['columns'][$columnIndex]['data']);
			}
			$columnSortOrder = empty($_POST['order'][0]['dir']) ? 'asc' : htmlspecialchars($_POST['order'][0]['dir']); // asc or desc
			 
			## Search 
			$searchValue = empty($_POST['search']['value']) ? '' : htmlspecialchars($_POST['search']['value']); // Search value
			$searchQuery = " ";
			if($searchValue != ''){
			   $searchQuery .= " AND (`tenKhoiLop` like '%".$searchValue."%' OR
			            `tenLop` LIKE '%".$searchValue."%' OR `namHoc` LIKE '%".$searchValue."%' OR `tenGV` LIKE '%".$searchValue."%') ";
			}

			## ColumnSearch
			foreach ($_POST['columns'] as $column) {
				if (isset($column['searchable']) && $column['searchable'] && !empty($column['search']['value'])) {
					$columnSearchTable = is_array($column['data']) ? htmlspecialchars($column['data']['_']) : htmlspecialchars($column['data']);
					$searchValue = htmlspecialchars($column['search']['value']);
					$searchValue = str_replace(array('$','^'), '', $searchValue);
					$searchQuery .= ' AND '.$columnSearchTable.' = \''.$searchValue.'\' ';
				}
			}
			

			 
			## Fetch records
			$empQuery = "SELECT *, COUNT(*) AS `siso` FROM `lop` INNER JOIN `khoilop` ON `lop`.`maKhoiLop` = `khoilop`.`maKhoiLop` INNER JOIN `giaovien` ON `lop`.`maGV` = `giaovien`.`maGV` INNER JOIN `namhoc` ON `lop`.`maNH` = `namhoc`.`maNH` INNER JOIN `phan_lop_hocsinh` ON `lop`.`maLop` = `phan_lop_hocsinh`.`maLop` INNER JOIN `hocky` ON `hocky`.`maHK` = `phan_lop_hocsinh`.`maHK`  WHERE 1 ".$searchQuery." GROUP BY `namhoc`, `tenLop`, `tenHK` ORDER BY ".$columnName." ".$columnSortOrder." LIMIT ".$row.",".$rowperpage;
			//echo $empQuery;
			$empRecords = $mysqli->query($empQuery);
			 
			$data = array();
			 
			while($row = $empRecords->fetch_array(MYSQLI_ASSOC)){
			    $data[] = array(
			    		'maLop' => $row['maLop'],
			    		'tenLop' => $row['tenLop'],
			            'khoilop'=> array(
			            	'maKhoiLop' => $row['maKhoiLop'],
			            	'tenKhoiLop' => $row['tenKhoiLop']
			            ),
			            'namhoc' => array(
			            	'maNH' => $row['maNH'],
			            	'namHoc' => $row['namHoc']
			            ),
			            'hocky' => array(
			            	'maHK' => $row['maHK'],
			            	'tenHK' => $row['tenHK']
			            ),
			            'giaovien' => array(
			            	'maGV' => $row['maGV'],
			            	'tenGV' => $row['tenGV']
			            ),
			    		'siso' => $row['siso'],

			        );
			}
			 
			## Response
			$response = array(
			    "draw" => intval($draw),
			    "iTotalRecords" => 0,
			    "iTotalDisplayRecords" => 0,
			    "aaData" => $data
			);
		} else {

			$response = [
			    "draw" => 0,
			    "iTotalRecords" => 0,
			    "iTotalDisplayRecords" => 0,
			    "aaData" => []
			];
		}
	} else {

		$response = [
		    "draw" => 0,
		    "iTotalRecords" => 0,
		    "iTotalDisplayRecords" => 0,
		    "aaData" => []
		];
	}
}

echo json_encode($response);