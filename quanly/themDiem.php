<?php
session_start();
ob_start();
require './../../../template/config.php';
if((empty($_SESSION['username']) && empty($_SESSION['password']))) {
	$response['error'][] = 'Xin lỗi, Phiên làm việc của bạn đã hết hạn. Vui lòng đăng nhập lại!';
}
else {
	if(isset($_POST['AddSubmit'])){

		$maMH = $_POST['maMH'];
		$monhocQuery = $mysqli->query('SELECT * FROM monhoc WHERE `maMH`= '.$maMH.' ');
		$phanlopID = $_POST['phanlopID'];
		$phanlopQuery = $mysqli->query('SELECT * FROM phan_lop_hocsinh WHERE `id`='.$phanlopID.' ');
	  if ($phanlopQuery->num_rows <= 0 ) {
	    responseError('Có lỗi xảy ra, một học sinh chưa được phân lớp!');
	    return;
	  }
		elseif ($monhocQuery->num_rows <= 0) {
	  	// code...
			responseError('Môn học không tồn tại!');
		  return;
	  }
		else{
			if (!empty($_POST['phanlopID']) && !empty($_POST['diemtx']) && !empty($_POST['diem15p']) && !empty($_POST['diem1t'])&& !empty($_POST['diemhk'])&& !empty($_POST['maMH']) ) {
				$maMH = $_POST['maMH'];
				$phanlopID = $_POST['phanlopID'];
				$diemtx = $_POST['diemtx'];
				$diem15p = $_POST['diem15p'];
				$diem1t  = $_POST['diem1t'];
				$diemhk  = $_POST['diemhk'];
				if (!empty($diemtx) && !empty($diem15p) && !empty($diem1t) && !empty($diemhk) ) {
			    $diemTBmhk = round((($diemtx+$diem15p)/2 + $diem1t*2 + $diemhk * 3)/6, 2);
			  }
				$insert = $mysqli->query('INSERT INTO `diem`(`hocsinh_phanlopID`, `maMH`, `diemtx`, `diem15p`, `diem1t`, `diemhk`, `DTBmhk`) VALUES ('.$phanlopID.', '.$maMH.', '.$diemtx.', '.$diem15p.', '.$diem1t.', '.$diemhk.', '.$diemTBmhk.' )');
		  }


		}

	}

}
?>
