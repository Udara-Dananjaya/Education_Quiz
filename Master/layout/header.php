<?php
function html_header($active) {
	$Dashboard = "";
	$Upload_Question = "";
	$Question_List = "";
    $Users_List = "";

switch ($active) {
    case "Dashboard":
        $Dashboard ="active";
        $active="Dashboard";
        break;

        
    case "Upload_Question":
        $Upload_Question="active";
        $active="Upload_Question";
        break;
    

    case "Question_List":
        $Question_List="active";
        $active="Question_List";
        break;
    
    case "Users_List":
        $Users_List="active";
        $active="Users_List";
        break;

}
$username=$_SESSION['Admin_Session_Id'];

echo <<<EOT

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Claringting Atlana">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
    <title>Admin Panel - $active </title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>

<body id="page-top">
  
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fas fa-award"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Quiz Admin</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item $Dashboard">
            <a class="nav-link" href="Dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Question
        </div>
        <li class="nav-item $Upload_Question">
            <a class="nav-link" href="Upload_Question.php">
                <i class="fas fa-file-upload"></i>
                <span>Upload Question</span></a>
        </li>

        <li class="nav-item $Question_List">
            <a class="nav-link" href="Question_List.php">
                <i class="fas fa-th-list"></i>
                <span>Question List</span></a>
        </li>
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Users
        </div>
        <li class="nav-item $Users_List">
            <a class="nav-link" href="Users_List.php">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>Users List</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">$username</span>
                                <img class="img-profile rounded-circle" src="../images/profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
EOT;
}
?>