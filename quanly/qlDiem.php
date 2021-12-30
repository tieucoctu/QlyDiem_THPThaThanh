<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $title = 'Quản lý điểm';
    require './../template/tpl_header.php';
    include('themDiem.php')
    ?>
    <?php if(in_array($taikhoan['role'], array('admin', 'manager', 'teacher'))) : ?>
      
      			<div class="modal-header bg-info">
      				<strong>Thêm mới </strong>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      			</div>
      			<div class="modal-body">
      				<form id="AddForm" action="" method="post">
      					<div class="row">
      						<div class="col-sm-6">
      							<!-- text input -->
      							<div class="form-group">
      								<label for="phanlopID">phanlopID</label>
      								<input type="number" class="form-control"name="phanlopID" placeholder="ID" />
      							</div>
      						</div>
      						<div class="col-sm-6">
      							<!-- select -->
      							<div class="form-group">
      								<label for="diemtx">diemtx</label>
      								<input type="number" step="0.01" class="form-control"name="diemtx" placeholder="" />

      							</div>
      						</div>
      					</div>
      					<div class="row">
      						<div class="col-sm-6">
      							<!-- text input -->
      							<div class="form-group">
      								<label for="diem15p">diem15p</label>
      								<input type="number" step="0.01" class="form-control"name="diem15p" placeholder="" />

      							</div>
      						</div>
      						<div class="col-sm-6">
      							<!-- select -->
      							<div class="form-group">
      								<label for="diem1t">diem1t</label>
      								<input type="number" step="0.01" class="form-control"name="diem1t" placeholder="" />

      							</div>
      						</div>
      					</div>
      					<div class="row">
      						<div class="col-sm-6">
      							<!-- text input -->
      							<div class="form-group">
      								<label for="diemhk">diemhk</label>
      								<input type="number" class="form-control"name="diemhk" placeholder="" />

      							</div>
      						</div>
      						<div class="col-sm-6">
      							<!-- text input -->
      							<div class="form-group">
      								<label for="maMH">maMH</label>
      								<input type="number"  class="form-control"name="maMH" placeholder="" />

      							</div>
      						</div>


      						<div class="form-group">
      							<button type="submit" class="btn btn-info float-right"name="AddSubmit" id="AddSubmit">Lưu thông tin</button>
      						</div>


      				</form>
      			</div>
      		</div>
      	</div>
      </div>
    <?php endif; ?>
    <?php
    require './../template/tpl_footer.php';
    ?>
  </body>
</html>
