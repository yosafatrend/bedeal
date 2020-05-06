 <header class="main-header" >
    <!-- Logo -->
   
    <a href="#" class="logo" style="background-color: #d0e7ff !important; position: fixed">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b style="color: #48b85f">B</b><b style="color: #3f6cb4">D</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><img src="<?= base_url('public/assets/img/logo.png') ?>" width="150px"></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #d0e7ff !important;">
      <!-- Sidebar toggle button-->
      <a href="#" style="color: black !important;"class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only" style="position: fixed">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" style="background-color: #d0e7ff !important;  ">
        <ul class="nav navbar-nav" >
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Tasks: style can be found in dropdown.less -->
           
          <!-- User Account: style can be found in dropdown.less -->
          <?php
            	$obj=&get_instance();
				$obj->load->model('UserModel');
 				$profile_url = $obj->UserModel->PictureUrl();
				$user=$obj->UserModel->GetUserData();
			?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$profile_url;?>" class="user-image profileImgUrl" alt="User Image">
              <span class="hidden-xs NameEdt" style="color: black !important "><?=$user['name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              
                <img src="<?=$profile_url;?>" class="img-circle profileImgUrl" alt="User Image">

                <p>
                  <span class="NameEdt"><?=$user['name'];?></span> - <?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>
                    Penjual
                  <?php endif ?>
                  <?php if ($this->session->userdata['Admin']['role']== 'Client_cs'): ?>
                    Pembeli 
                  <?php endif ?>
                  <small>Member since <?=date('M. Y',strtotime($this->session->userdata['Admin']['created']) );?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url('v3/profile');?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
           
        </ul>
      </div>
    </nav>
  </header>