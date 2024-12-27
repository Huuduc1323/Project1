<?php
    switch ($method) {

    /***************
    * INDEX
    ***************/    

    case 'list-reminder': 
?>
<h4 class="page-title" style="text-transform: uppercase;">Danh sách lời nhắc</h4>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="text-right">
                <a href="home.php?page=teachers&method=create-reminder" class="btn btn-success">
                    Thêm
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="list-students" class="table table-head-bg-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Hạn ngày</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0;
                        foreach ($result as $key => $value) 
                        {
                            $stt+=1
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $value['title']; ?></td>
                        <td><?php echo $value['content']; ?></td>
                        <td><?php echo $value['time']; ?></td>
                        <td>
                            <a href="home.php?page=teachers&method=update-reminder&id=<?php echo $value['id']; ?>"
                                class="btn btn-primary">
                                Sửa
                            </a>
                            <a href="home.php?page=teachers&method=destroy-reminder&id=<?php echo $value['id']; ?>"
                                onclick="return confirm('Bạn có thực sự muốn xóa?');" class="btn btn-danger">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    break;
    
    case 'list-students': 
?>
<h4 class="page-title" style="text-transform: uppercase;">Danh sách sinh viên</h4>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table id="list-students" class="table table-head-bg-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0;
                        foreach ($result as $key => $value) 
                        {
                            $stt+=1
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $value['namest']; ?></td>
                        <td><?php echo $value['namecl']; ?></td>
                        <td><?php echo $value['birthday']; ?></td>
                        <td><?php echo $value['address']; ?></td>
                        <td><?php echo $value['phone']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    break;
    
    case 'list-projects': 
?>
<h4 class="page-title" style="text-transform: uppercase;">Danh sách đồ án</h4>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table id="list-projects" class="table table-head-bg-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Chủ đề</th>
                        <th scope="col">Sinh viên</th>
                        <th scope="col">Giáo viên</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0;
                        foreach ($result as $key => $value) 
                        {
                            $stt+=1;
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $value['namepr']; ?></td>
                        <td><?php echo $value['nameto']; ?></td>
                        <td><?php echo $value['namest']; ?></td>
                        <td><?php echo $value['namete']; ?></td>
                        <td><?php echo $value['created_at']; ?></td>
                        <td><?php echo $value['endtime']; ?></td>
                        <td>
                            <?php  
                                if(($value['endtime'] != '0000-00-00') || ($_SESSION['name'] == $value['namete'] && $value['endtime'] == '0000-00-00')){?>
                            <a class="btn btn-primary"
                                href="home.php?page=teachers&method=view-tutorial-student&id=<?php echo $value['idsv']; ?>">
                                <?php echo 'View'; }?>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    break;
    
    case 'tutorial-student';
?>
<h4 class="page-title" style="text-transform: uppercase;">Sinh viên được hướng dẫn</h4>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table id="list-students" class="table table-head-bg-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Đồ án</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0;
                        foreach ($result as $key => $value) 
                        {
                            $stt+=1;
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $value['namest']; ?></td>
                        <td><?php echo $value['namecl']; ?></td>
                        <td><?php echo $value['birthday']; ?></td>
                        <td><?php echo $value['address']; ?></td>
                        <td><?php echo $value['phone']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><a class="btn btn-primary"
                                href="home.php?page=teachers&method=view-tutorial-student&id=<?php echo $value['id']; ?>">View</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    break;
    
    case 'view-tutorial-student': 
?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div id="" class="">
                    <img class="profile-user-img img-responsive img-circle " src="./assets//img/profile.jpg" alt=""
                        style="margin: 0 auto;
                                        width         : 100px;
                                        padding       : 3px;
                                        border        : 3px solid #d2d6de;border-radius: 50%;display: block;
                                        max-width     : 100%;
                                        height        : auto;
                                        vertical-align: middle;">
                    <?php
                        foreach($result as $key => $value)
                        {
                    ?>
                    <h3 class="profile-username text-center"><?php echo $value['namest']?>
                    </h3>
                    <p class="text-muted text-center">Mã học viên: <b><?php echo $value['id']?></b>
                    </p>
                    <p class="text-muted text-center">Mã đồ án: <b><?php echo $value['idpr']?></b>
                    </p>
                    <table class="table table-condensed tb-info-hv">
                        <tbody>
                            <tr>
                                <td>Ngày sinh: </td>
                                <td title="<?php echo $value['birthday']?>"><?php echo $value['birthday']?>
                                </td>
                            </tr>
                            <tr>
                                <td>Giới tính: </td>
                                <td><?php if ($value['sex']==1) 
                                        {
                                            echo 'Nam';
                                        } else {
                                            echo 'Nữ';
                                        }
                                        ?></td>
                            </tr>
                            <tr>
                                <td>Nơi sinh: </td>
                                <td><?php echo $value['address']?>
                                </td>
                            </tr>
                            <tr>
                                <td>Học lớp: </td>
                                <td><?php echo $value['namecl']?>
                                </td>
                            </tr>
                            <tr>
                                <td>Giáo viên hướng dẫn: </td>
                                <td><?php echo $value['namete']?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php if(empty($content)==null && $content[0]['endtime'] == '0000-00-00'){?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title" style="text-transform: uppercase;">Bảng kế hoạch thực hiện đề tài đồ án</h4>
                <table id="list-projects" class="table table-head-bg-success table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Bắt đầu</th>
                            <th scope="col">Kết thúc</th>
                            <th scope="col">Hiện trạng</th>
                            <th scope="col">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0;
                            foreach ($plan as $key => $value) 
                            {
                                $stt+=1;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['title']; ?></td>
                            <td><?php echo $value['start']; ?></td>
                            <td><?php echo $value['end']; ?></td>
                            <td><?php if ($value['status']==1) {
                                            echo 'Hoàn thành';
                                        } else if($value['status']==0 || $value['status']== ''){
                                            echo 'Chưa hoàn thành';
                                        }
                                         ?></td>
                            <td>
                                <?php if ($value['status']==1) {
                                                
                                            } else if($value['status']==0 || $value['status']== ''){
                                                ?><a
                                    href="home.php?page=teachers&method=view-comment&id=<?php echo $result[0]['id']?>&id-comment=<?php echo $value['id'];?>"
                                    class="btn btn-primary">View</a><?php
                                            }
                                            ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php }?>
    <div
        class="col-md-<?php if(empty($content)==null && $content[0]['endtime'] == '0000-00-00'){echo '12';}else{echo '9';}?>">
        <div class="card">
            <div class="card-body">
                <div id="" class="">
                    <h3 class="page-title" style="text-transform: uppercase;">Bài làm
                    </h3>
                    <h3 style="text-transform: uppercase; color: red;">
                        <?php if($contentdone[0]['content'] == ''){echo 'Đồ án chưa hoàn thành';}?>
                    </h3>
                    <div class="view">
                        <?php 
                            if(empty($content)==null && $content[0]['endtime'] == '0000-00-00'){
                                $cont = $content;
                            }else{
                                $cont = $contentdone;
                            }
                            foreach($cont as $value){?>
                                <textarea disabled class="form-control ckeditor" name="content" id="content" cols="30" rows="10"
                                    <?php if(empty($content)==null && $content[0]['endtime'] != '0000-00-00'){echo 'disabled';}?>>
                                    <?php echo $value['content']?>
                                </textarea><br>
                            <?php }
                                if(empty($content)==null && $content[0]['endtime'] == '0000-00-00'){
                                ?>
                            <form action="" method="POST">
                                <h3>Đánh giá bài làm của sinh viên: </h3>
                                <?php
                                    $top_checked = "";
                                    $bottom_checked = "";
                                    $position = $value['status'];
                                    if($position == "top"){
                                        $top_checked = "checked";
                                        $bottom_checked = "";
                                    }else{
                                        $top_checked = "";
                                        $bottom_checked = "checked";
                                    }
                                ?>
                                <input type="radio" id="1" name="status" value="1" <?php echo $top_checked; ?>>
                                <label for="1">Hoàn thành</label><br>
                                <input type="radio" id="0" name="status" value="0" <?php echo $bottom_checked; ?>>
                                <label for="0">Chưa hoàn thành</label><br>
                                <label for="comment">Nhận xét:</label>
                                <!-- <input type="text" name="comment" id="comment" value="<?php echo $value['comment'];?>"> -->
                                <br>
                                <?php foreach($cont as $value){?>
                                    <textarea class="form-control ckeditor" name="comment" id="comment" cols="30" rows="10"
                                        <?php if(empty($content)==null && $content[0]['endtime'] != '0000-00-00'){echo 'disabled';}?>><?php echo $value['comment']?></textarea>
                                <?php }?>
                                <div class="offset-sm-2 col-md-10" style="
                                    margin-left: 0;
                                ">
                                    <button href type="submit" name="sent" class="bnt btn-danger" style="
                                        border: 1px solid transparent;
                                        padding: .375rem .75rem;
                                        font-size: 1rem;
                                        line-height: 1.5;
                                        border-radius: .25rem;
                                        position: relative;
                                        left: 50%;
                                        margin-top: 3vh;
                                    ">Gửi</button>
                                </div>
                            </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    break;
    
    case 'view-comment':
?>
<div
    class="col-md-<?php if(empty($content)==null && $content[0]['endtime'] == '0000-00-00'){echo '12';}else{echo '9';}?>">
    <div class="card">
        <div class="card-body">
            <div id="" class="">
                <h4><a href="home.php?page=teachers&method=view-tutorial-student&id=<?php echo $result[0]['id']; ?>"
                        class="btn btn-info">↩ Back</a></h4>
                <h3 style="text-transform: uppercase; color: red;">
                    <?php if($contentdone[0]['content'] == ''){echo 'Đồ án chưa hoàn thành';}?>
                </h3>
                <div class="view">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Bài làm</h3>
                            <?php foreach($comment as $value){?>
                            <textarea disabled class="form-control ckeditor" name="content" id="content" cols="30"
                                rows="10"
                                <?php if(empty($content)==null && $content[0]['endtime'] != '0000-00-00'){echo 'disabled';}?>>
                        <?php echo $value['content']?>
                    </textarea><br>
                            <?php }?>
                        </div>
                        <div class="col-md-6">
                            <h3>Nhận xét của giáo viên: </h3>
                            <?php foreach($comment as $value){?>
                            <textarea class="form-control ckeditor" name="content" id="content" cols="30" rows="10"
                                <?php if(empty($content)==null && $content[0]['endtime'] != '0000-00-00'){echo 'disabled';}?>>
                                        <?php echo $value['comment']?>
                                    </textarea>
                            <?php }?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php
    break;
    
    /***************
     * CREATE
     ***************/

    case 'create-reminder': 
?>
<h4 class="page-title" style="text-transform: uppercase;">Thêm lời nhắc</h4>
<div class="col-md-12">
    <div class="card">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="" method="POST">

                    <div class="form-group">
                        <label>Tiêu đề: </label>
                        <input class="form-control" name="title" value="">
                    </div>
                    <div class="form-group">
                        <label>Thời gian: </label>
                        <input id="dayreminder" type="date" class="form-control" name="time" value=""
                            min="<?php echo date('Y-m-d');?>">
                    </div>

                    <div class="form-group">
                        <label>Nội dung: </label>
                        <textarea class="form-control ckeditor" name="content" id="content" cols="30" rows="10">
                                </textarea>
                    </div>

                    <button type="submit" name="create" class="btn btn-default">Submit</button>
                    <button type="reset" name="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    break;

    /***************
     * UPDATE
     ***************/

    case 'update-reminder': 
?>
<h4 class="page-title" style="text-transform: uppercase;">Sửa lời nhắc</h4>
<div class="col-md-12">
    <div class="card">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="" method="POST">
                    <?php 
                    foreach($get as $key => $value){
                    ?>
                    <div class="form-group">
                        <label>Tiêu đề: </label>
                        <input class="form-control" name="title" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Thời gian: </label>
                        <input type="date" class="form-control" name="time" value="<?php echo $value['time']; ?>"
                            min="<?php echo date('Y-m-d');?>">
                    </div>

                    <div class="form-group">
                        <label>Nội dung: </label>
                        <textarea class="form-control ckeditor" name="content" id="content" cols="30" rows="10">
                        <?php echo $value['content']?>
                        </textarea>
                    </div>
                    <?php
                            }
                    ?>
                    <button type="submit" name="update" class="btn btn-default">Update</button>
                    <button type="reset" name="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    break;
    
    default: 
?>
<h4 class="page-title" style="text-transform: uppercase;">Sinh viên được hướng dẫn</h4>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table id="list-students" class="table table-head-bg-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Đồ án</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0;
                        foreach ($result as $key => $value) {$stt+=1;
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $value['namest']; ?></td>
                        <td><?php echo $value['namecl']; ?></td>
                        <td><?php echo $value['birthday']; ?></td>
                        <td><?php echo $value['address']; ?></td>
                        <td><?php echo $value['phone']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><a
                                href="home.php?page=teachers&method=view-tutorial-student&id=<?php echo $value['id']; ?>">View</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    break;
    }
?>