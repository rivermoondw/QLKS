<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <?php echo $before_head; ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue-light sidebar-mini fixed">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>assets/admin/index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"><h4>Menu chính</h4></li>
                <li class="treeview <?php echo (isset($active_parent) && $active_parent == 'room') ? 'active' : ''; ?>">
                    <a href="#">
                        <span>Phòng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo (isset($active) && $active == 'room') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url(); ?>admin/room"><i
                                        class="fa fa-circle-o <?php echo (isset($active) && $active == 'room') ? 'text-aqua' : ''; ?>"></i>Danh
                                sách phòng</a></li>
                        <li class="<?php echo (isset($active) && $active == 'add_room') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url(); ?>admin/room/add"><i
                                        class="fa fa-circle-o <?php echo (isset($active) && $active == 'add_room') ? 'text-aqua' : ''; ?>"></i>Thêm
                                phòng</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?php echo (isset($active_parent) && $active_parent == 'service') ? 'active' : ''; ?>">
                    <a href="#">
                        <span>Dịch vụ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo (isset($active) && $active == 'service') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url(); ?>admin/service"><i
                                        class="fa fa-circle-o <?php echo (isset($active) && $active == 'service') ? 'text-aqua' : ''; ?>"></i>Danh
                                sách dịch vụ</a></li>
                        <li class="<?php echo (isset($active) && $active == 'add_service') ? 'active' : ''; ?>"><a
                                    href="<?php echo base_url(); ?>admin/service/add"><i
                                        class="fa fa-circle-o <?php echo (isset($active) && $active == 'add_service') ? 'text-aqua' : ''; ?>"></i>Thêm
                                dịch vụ</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>