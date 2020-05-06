 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="icon" href="<?=base_url('public');?>/assets/img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?=base_url('public');?>/assets/scss/bootstrap.css">
  <link rel="stylesheet" href="<?=base_url('public');?>/assets/css/master-login.css">
</head>
<body class="bg-light" id="bg">
  <div class="container-fluid">
    <div class="wrapper">
      <div class="mx-auto card card-body mz-login-card text-poppins">
        <div class="container text-center py-3">
          <img class="" width="75px" src="<?=base_url('public');?>/assets/img/user.svg" alt="">
          <p class="h4 card-text py-2">Member Login</p>
          <?= $this->session->flashdata('message'); ?>  
          <form action="<?=base_url('dashboard-login');?>" method="post" id="loginF">
            <input type="text" required name="email" class="form-control form-control-lg mz-form my-4 borderless" placeholder="Username">
            <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control form-control-lg mz-form my-4 borderless" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
            <div class="row">
              <div class="col-xs-8">
                <div id="ErrorMessage"></div>
              </div>
              <!-- /.col -->
             
                
            
              <!-- /.col -->
            </div>
            <button type="submit" class="btn btn-block btn-lg btn-success mz-btn font-weight-bold text-white my-3">Login</button>
          </form>
          <div class="text-left">
            <a href="<?php echo base_url("daftar") ?>" class="card-link">Belum punya akun? Daftar dong.</a>
          </div>            
        </div>

      </div>
    </div>
  </div>
  <!-- js -->
  <script type="text/javascript" src="<?=base_url('public');?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?=base_url('public');?>assets/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="<?=base_url('public');?>assets/js/mz.js"></script>
</body>

<!-- jQuery 3 -->
<script src="<?=base_url('public');?>/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('public');?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url('public');?>/plugins/iCheck/icheck.min.js"></script>
<script>
 $(function(){ 
   $("#loginF").submit('on',function(e){
     e.preventDefault();

     $('#ErrorMessage').html('<span style="color:#060;">Please wait...</span>');

     $.ajax({
       dataType : "json",
       type : "post",
       cache: false,
					 // contentType: false,
					  //processData: false,
					  data : $('#loginF').serializeArray(),
					  headers: {  'Authkey': '<?=$this->security->get_csrf_hash();?>'},
           url: $('#loginF').attr('action'),
           success:function(data)
           {

             if(data.code == 400)
             {
              $('#ErrorMessage').html('<span style="color:red;">'+data.error+'</span>');
            }

            if(data.status == 0)
            {
              $('#ErrorMessage').html('<span style="color:red;">'+data.message+'</span>');
            }
            if(data.status == 1)
            {
              $('#ErrorMessage').html('<span style="color:green;">'+data.message+'</span>');
              $('#loginF').trigger('reset');
              window.location.href=data.redirectUrl;
            }
          },
          error: function (jqXHR, status, err) {
            $('#ErrorMessage').html("'<span style='color:red;'>'Local error callback.</span>");
          }

        });


   });

 });

</script>
</body>
</html>
