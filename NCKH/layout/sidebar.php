<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <!-- <div class="user">
            <div class="photo">
                <img src="assets/img/profile.jpg">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        <?php 
                                if(isset($_SESSION['name'])){
									echo $_SESSION['name'];
								}?>
                        <span class="user-level"><?php 
                                if($_SESSION['pq']=='hs'){
									echo 'Học sinh';
								}else if($_SESSION['pq']=='gv'){
									echo 'Giảng viên';
								}
								else if($_SESSION['pq']=='tk'){
									echo 'Trưởng khoa';
								}?></span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <ul class="nav">
            <li class="nav-item">
                <a href="home.php?page=dashboard">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="#">
                    <i class="la la-calendar"></i>
                    <p>Lịch</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li> -->
            <!-- <li class="nav-item">
                <a href="#">
                    <i class="la la-bell"></i>
                    <p>Thông báo</p>
                    <span class="badge badge-danger">50</span>
                </a>
            </li> -->
            <?php 
                if($_SESSION['pq']=='tk'){
            ?>
            <li class="nav-item">
                <a href="home.php?page=deans&method=list-teachers">
                    <i class="la la-list"></i>
                    <p>Danh sách giáo viên</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=deans&method=list-students">
                    <i class="la la-list"></i>
                    <p>Danh sách sinh viên</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=deans&method=list-projects">
                    <i class="la la-list"></i>
                    <p>Danh sách đồ án</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=deans&method=list-progress">
                    <i class="la la-list-alt"></i>
                    <p>Bảng kế hoạch thực hiện đồ án</p>
                </a>
            </li>
            <?php
                }else if($_SESSION['pq']=='gv'){
            ?>
            <li class="nav-item">
                <a href="home.php?page=teachers&method=list-reminder">
                    <i class="la la-calendar"></i>
                    <p>Lời nhắc</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=teachers&method=list-students">
                    <i class="la la-list"></i>
                    <p>Danh sách sinh viên</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=teachers&method=list-projects">
                    <i class="la la-list"></i>
                    <p>Danh sách đồ án</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=teachers&method=tutorial-student">
                    <i class="la la-th-list"></i>
                    <p>Sinh viên được hướng dẫn</p>
                </a>
            </li>
            <?php
                }else if($_SESSION['pq']=='hs'){
            ?>
            <li class="nav-item">
                <a href="home.php?page=students&method=list-projects">
                    <i class="la la-archive"></i>
                    <p>Danh sách đồ án</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="home.php?page=students&method=my-project">
                    <i class="la la-archive"></i>
                    <p>Đồ án thực hiện</p>
                </a>
            </li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>