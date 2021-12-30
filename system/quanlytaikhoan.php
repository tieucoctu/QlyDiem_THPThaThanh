<?php
$title = 'Quản lý tài khoản';
require './../template/tpl_header.php';

?>

<?php if(in_array($taikhoan['role'], array('admin', 'manager'))) : ?>


<style>.toasts-top-right { z-index: 1060!important; }</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?php echo $title; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
						<li class="breadcrumb-item active"><?php echo $title; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title">
						<i class="far fa-user"></i> 
						Danh sách tài khoản
					</h3>
					<button type="button" class="btn btn-default btn-sm float-right p-0" onclick="$('#ModalAdd').modal({show: true});"><i class="fas fa-plus-circle"></i> Thêm mới</button>
				</div>
				<div class="card-body">
					<table class="table table-striped projects" id="TaiKhoanTable" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Tài khoản</th>
								<th>Vai trò</th>
								<th>Email</th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





<!-- MODAL CHO Edit -->

<div id="ModalEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Chỉnh sửa thông tin </strong>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form id="EditForm" action="#" method="post">
					<input type="hidden" name="id" id="id" value=""/>
					<div class="row">
						<div class="col-sm-6">
							<!-- text input -->
							<div class="form-group">
								<label for="username">Tài khoản</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Tài khoản" disabled />
							</div>
						</div>
						<div class="col-sm-6">
							<!-- select -->
							<div class="form-group">
								<label for="role">Phân quyền tài khoản</label>
								<select name="role" id="role" class="form-control">
									<option value="student">Học sinh</option>
									<option value="teacher">Giáo viên</option>
									<option value="manager">Quản lý</option>
									<option value="admin">Quản trị viên</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="password">Mật khẩu</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
								<small class="form-text text-muted text-alert">* Bỏ trống nếu không muốn sửa</small>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="repassword">Nhập lại mật khẩu</label>
								<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu">
								<small class="form-text text-muted text-alert">* Bỏ trống nếu không muốn sửa</small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ Email" required />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info float-right" id="EditSubmit">Lưu thông tin</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>




<!-- TMODAL CHO Add -->

<div id="ModalAdd" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Thêm tài khoản </strong>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form id="AddForm" action="#" method="post">
					<div class="row">
						<div class="col-sm-6">
							<!-- text input -->
							<div class="form-group">
								<label for="username">Tài khoản</label>
								<input type="text" class="form-control" name="username" placeholder="Tài khoản" required>
							</div>
						</div>
						<div class="col-sm-6">
							<!-- select -->
							<div class="form-group">
								<label for="role">Phân quyền tài khoản</label>
								<select name="role" class="form-control">
									<option value="student">Học sinh</option>
									<option value="teacher">Giáo viên</option>
									<option value="manager">Quản lý</option>
									<option value="admin">Quản trị viên</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="password">Mật khẩu</label>
								<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="repassword">Nhập lại mật khẩu</label>
								<input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Địa chỉ Email" required />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info float-right" id="AddSubmit">Lưu thông tin</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var listDataTable = $('#TaiKhoanTable').DataTable({
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			'ajax': {
				'url':'/ajax/system/getTaiKhoan.php'
			},
			pageLength: 10,
			'columns': [
				{ data: 'id' },
				{ data: 'username' },
				{ data: 'role' },
				{ data: 'email' },
				{ 
					targets: -1,
					data: null,
					orderable: false,
					searchable : false,
					defaultContent: "<a class=\"btn btn-danger btn-sm float-right deleteable\" href=\"#\"><i class=\"fas fa-trash\"></i>Xoá</a> \n <a class=\"btn btn-info btn-sm float-right editable\" href=\"#\"><i class=\"fas fa-pencil-alt\"></i>Sửa</a>"}
			],

			language: {
            	url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Vietnamese.json'
        	}
		});

		$('#TaiKhoanTable tbody').on( 'click', '.editable', function () {
			var data = listDataTable.row($(this).parents('tr') ).data();
			if(data) {
				// đổ dữ liệu vào form
				$("#ModalEdit input#id").val(data['id']);
				$("#ModalEdit input#username").val(data['username']);
				$("#ModalEdit input#email").val(data['email']);
				$("#ModalEdit input#password").val('');
				$("#ModalEdit input#repassword").val('');
				$("#ModalEdit select#role").val(data['role']);
				$("#ModalEdit").modal({show: true});
			} else {
				$(document).Toasts('create', {
					class: 'bg-danger',
					title: 'Có lỗi xảy ra!',
					body: 'Không tìm thấy dữ liệu'
				});
			}
		} );
		$('#TaiKhoanTable tbody').on( 'click', '.deleteable', function () {
			var data = listDataTable.row($(this).parents('tr') ).data();
			if (confirm('Bạn có muốn xoá bản ghi này?')) {
				$.ajax({
					url: '/ajax/system/deleteTaiKhoan.php',
					type: 'POST',
					data: {id: data['id']},
					success: function (result) {
						if (result.success) {
							$(document).Toasts('create', {
								class: 'bg-success',
								title: 'Thành công!',
								body: result.success
							});
							setTimeout(function(){
							    window.location.reload();
							}, 2000);
						}
						else {
							$(document).Toasts('create', {
								class: 'bg-danger',
								title: 'Có lỗi xảy ra!',
								body: result.error
							});
						}
					},
					error: function (xhr, status, error) {
						alert(error);
					}
				});
			}
		} );


		// Submit form sửa
		$("#EditForm").submit(function (event) {
			event.preventDefault();
			$("#EditSubmit").attr("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Lưu thông tin');
			var form = $(this);
			var Data = form.serialize();
			$.ajax({
				url: '/ajax/system/editTaiKhoan.php',
				type: 'POST',
				data: Data,
				success: function (result) {
					if (result.success) {
						$(document).Toasts('create', {
							class: 'bg-success',
							title: 'Thành công!',
							body: result.success
						});
						setTimeout(function(){
						    window.location.reload();
						}, 2000);
					}
					else {
						$.each(result.error, function(id,errorMessage) {
							$(document).Toasts('create', {
								class: 'bg-danger',
								title: 'Có lỗi xảy ra!',
								body: errorMessage
							});
						});
						$("#EditSubmit").attr("disabled", false).html('Lưu thông tin');
					}
				},
				error: function (xhr, status, error) {
					alert(error);
					$("#EditSubmit").attr("disabled", false).html('Lưu thông tin');
				}
			});
			return false;
		});


		// Submit form thêm
		$("#AddForm").submit(function (event) {
			event.preventDefault();
			$("#AddSubmit").attr("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Lưu thông tin');
			var form = $(this);
			var Data = form.serialize();
			$.ajax({
				url: '/ajax/system/addTaiKhoan.php',
				type: 'POST',
				data: Data,
				success: function (result) {
					if (result.success) {
						$(document).Toasts('create', {
							class: 'bg-success',
							title: 'Thành công!',
							body: result.success
						});
						setTimeout(function(){
						    window.location.reload();
						}, 2000);
					}
					else {
						$.each(result.error, function(id,errorMessage) {
							$(document).Toasts('create', {
								class: 'bg-danger',
								title: 'Có lỗi xảy ra!',
								body: errorMessage
							});
						});
						$("#AddSubmit").attr("disabled", false).html('Lưu thông tin');
					}
				},
				error: function (xhr, status, error) {
					alert(error);
					$("#AddSubmit").attr("disabled", false).html('Lưu thông tin');
				}
			});
			return false;
		});
			
	});

	
</script>






<?php endif; ?>
<?php
require './../template/tpl_footer.php';
?>
