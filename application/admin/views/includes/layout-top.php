<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->session->userdata('user');
$image = ($user->photo !='')?base_url().$user->photo:base_url().'assets/img/avatar/avatar-1.png';
$url = $this->uri->segment(1);
$settings = getSettings();
$site_logo = front_url().$settings->site_logo;
?>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg" style="content: ' ';position: absolute;top: 0;left: 0;width: 100%;height: 68px;background-color: #6777ef;z-index: -1;"></div>
      <nav class="navbar navbar-expand-sm main-navbar">
        <a href="<?php echo base_url(); ?>dist/index" class="navbar-brand sidebar-gone-hide">
            <?php
            if($site_logo != '') {
                ?>
                <img src="<?= $site_logo ?>">
                <?php
            }
            ?>
        </a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
            <ul class="navbar-nav">
                <li class="<?= $url == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link"
                                                                           href="<?php echo base_url(); ?>dashboard"><i
                                class="fas fa-fire"></i><span>Dashboard</a>
                </li>

                <li class="<?php echo $url == 'drivers' ? 'active' : ''; ?>"><a class="nav-link"
                                                                                href="<?php echo base_url(); ?>drivers">Drivers</a>
                </li>
                <li class="<?php echo $url == 'passengers' ? 'active' : ''; ?>"><a class="nav-link"
                                                                                   href="<?php echo base_url(); ?>passengers">Passengers</a>
                </li>

                <li class="<?php echo $url == 'rides' ? 'active' : ''; ?>"><a class="nav-link"
                                                                              href="<?php echo base_url(); ?>rides">Rides</a>
                </li>
                <li class="<?php echo $url == 'tickets' ? 'active' : ''; ?>"><a class="nav-link"
                                                                                href="<?php echo base_url(); ?>tickets">Tickets</a>
                </li>
            </ul>
        </div>
        <form class="form-inline ml-auto">
          <div class="search-element">
          </div>
        </form>
          <ul class="navbar-nav navbar-right">
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
         
                      <img alt="image" src="<?php echo $image; ?>" class="rounded-circle mr-1">
                      <div class="d-sm-none d-lg-inline-block"><?=($user->id)?$user->fname.' '.$user->lname:''?></div></a>
                  <div class="dropdown-menu dropdown-menu-right">
                      <a href="<?php echo base_url(); ?>profile" class="dropdown-item has-icon">
                          <i class="far fa-user"></i> Profile
                      </a>
                      <a href="<?php echo base_url(); ?>settings" class="dropdown-item has-icon">
                          <i class="fas fa-cog"></i> Settings
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item has-icon text-danger">
                          <i class="fas fa-sign-out-alt"></i> Logout
                      </a>
                  </div>
              </li>
          </ul>
      </nav>
