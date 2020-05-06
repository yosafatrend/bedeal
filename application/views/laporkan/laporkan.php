 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <?php $this->load->view('include/header');?>

 <style>

 	.form-control{
 		margin-bottom: 	9px;
 	}
 	label{
 		font-size: 	15px;
 	}
 	h4{
 		font-size: 20px;
 	}
 	.btn{
 		margin-top: 30px;
 		<?php if ($this->session->userdata['Admin']['role']!='Admin'): ?>
 			width: 10%;
 			<?php else: ?>	
 				width: 100%;
 		<?php endif ?>
 		 
 		
 </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php $this->load->view('include/topbar');?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $this->load->view('include/sidebar');?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1><?php if ($this->session->userdata['Admin']['role']!='Admin'): ?>Laporkan<?php endif ?>
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i><?php if ($this->session->userdata['Admin']['role']!='Admin'): ?>Laporkan<?php endif ?></a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
			
			<?php if ($this->session->userdata['Admin']['role']!='Admin'): ?>
				
				<div class="container">
					<div class="row">
<?php
            	$obj=&get_instance();
				$obj->load->model('UserModel');
 				$data = $obj->UserModel->ambil_data();
			?>

						<?php echo  form_open('UserController/laporkan');?>
						<br>	
						<div class="col-md-5">
							<?= $this->session->flashdata('message'); ?> 
							<label>Username</label> 
							<input type="hidden" name="username" class="form-control" value="<?= $data['username'] ?>" >
							<input type="text" class="form-control" value="<?= $data['username'] ?>" disabled >
							<label>Email</label>
							<input type="hidden" name="email" class="form-control" value="<?= $data['email'] ?>" >
							<input type="text" class="form-control" value="<?= $data['email'] ?>" disabled>
							<label>Aduan</label>
							<textarea class="form-control" name="isi"></textarea>
							<small class="text-danger"><?= form_error('isi') ?></small>
						</div>
						
						<div class="col-md-12">
							<button class="btn btn-success" type="submit">Kirim</button>
						</div>
						</form>
					
				</div>
			</div>
			<?php endif ?>
			<?php if ($this->session->userdata['Admin']['role']=='Admin'): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Email</th>
						<th>Isi Laporan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_lapor as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['username_pelapor'] ?></td>
							<td><?php echo $value['email_pelapor'] ?></td>
							<td>
								<?php echo $value['isi'] ?>
							</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<?php $this->load->view('include/footer');?>

	<!-- jQuery UI 1.11.4 -->
	<script src="<?=base_url('public')?>/components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>






	<!-- AdminLTE for demo purposes -->
</body>
</html>
