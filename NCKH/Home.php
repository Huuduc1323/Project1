<?php 
	session_start();
	ob_start();
	if($_SESSION['pq']==''){
		header('Location: ./index.php');
	}

	include_once './layout/head.php';
?>
<div class="wrapper">
    <div class="main-header">
        <?php include_once './layout/header.php'; ?>
        <?php include_once './layout/sidebar.php'; ?>
        <div class="main-panel" style="
    background: url('assets/img/bg.jpg') no-repeat center; background-size: cover; font-family: sans-serif; ">
            <div class="content">
                <div class="container-fluid">
                    <!-- Phần thân hiển thị nội dung website -->
                    <?php  
							
							if (isset($_GET['page'])) {
								$page = $_GET['page'];
							}else{
								// $page = 'dashboard';
								if($_SESSION['pq']=='hs'){
									$page = 'hocsinh';
								}else if($_SESSION['pq']=='gv'){
									$page = 'giaovien';
								}
								else if($_SESSION['pq']=='tk'){
									$page = 'truongkhoa';
								}
							}

							switch ($page) {
								case 'logout':
									session_destroy();
									header('Location: ./index.php');
									break;
								case 'students':
									include_once './Controllers/StudentsController.php';
									$students = new studentscontroller();
									$students->studentscontrol();
									break;
								case 'teachers':
									include_once './Controllers/TeachersController.php';
									$teachers = new teacherscontroller();
									$teachers->teacherscontrol();
									break;
								case 'deans':
									include_once './Controllers/TeachersController.php';
									$deans = new deanscontroller();
									$deans->deanscontrol();
									break;
								case 'dashboard':
									include_once './Controllers/CalendarController.php';
									$calendar = new calendarcontroller();
									$calendar->calendarcontrol();
									break;
								default:
									include_once './Controllers/CalendarController.php';
									$calendar = new calendarcontroller();
									$calendar->calendarcontrol();
									break;
									// if($_SESSION['pq']=='hs'){
									// 	include_once './Controllers/CalendarController.php';
									// 	$calendar = new calendarcontroller();
									// 	$calendar->calendarcontrol();
									// 	break;
									// }else if($_SESSION['pq']=='gv'){
									// 	include_once './Controllers/TeachersController.php';
									// 	$teachers = new teacherscontroller();
									// 	$teachers->teacherscontrol();
									// 	break;
									// }
									// else if($_SESSION['pq']=='tk'){
									// 	include_once './Controllers/CalendarController.php';
									// 	$calendar = new calendarcontroller();
									// 	$calendar->calendarcontrol();
									// 	break;
									// }
							}
						?>

                    <?php include_once './layout/script.php';?>