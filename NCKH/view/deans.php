<?php
switch ($method) {
    case 'list-teachers':
?>
        <h4 class="page-title" style="text-transform: uppercase;">Danh sách giáo viên</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="text-right">
                        <a href="home.php?page=deans&method=create-teacher" class="btn btn-success">
                            Thêm
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="list-teachers" class="table table-head-bg-success table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            foreach ($result as $key => $value) {
                                $stt += 1;
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['birthday']; ?></td>
                                    <td><?php echo $value['address']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td>
                                        <a href="home.php?page=deans&method=update-teacher&id=<?php echo $value['id']; ?>"
                                            class="btn btn-primary">
                                            Sửa
                                        </a>
                                        <a href="home.php?page=deans&method=destroy-teacher&id=<?php echo $value['id']; ?>"
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
                <div class="card-header ">
                    <div class="text-right">
                        <a href="home.php?page=deans&method=create-student" class="btn btn-success">
                            Thêm
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="list-students" class="table table-head-bg-success table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0;
                            foreach ($result as $key => $value) {
                                $stt += 1;
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $value['namest']; ?></td>
                                    <td><?php echo $value['namecl']; ?></td>
                                    <td><?php echo $value['birthday']; ?></td>
                                    <td><?php if ($value['sex'] == 1) {
                                            echo 'Nam';
                                        } else {
                                            echo 'Nữ';
                                        }; ?></td>
                                    <td><?php echo $value['address']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td>
                                        <a href="home.php?page=deans&method=update-student&id=<?php echo $value['id']; ?>"
                                            class="btn btn-primary">
                                            Sửa
                                        </a>
                                        <a href="home.php?page=deans&method=destroy-student&id=<?php echo $value['id']; ?>"
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
    case 'list-projects':
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Danh sách đồ án</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="text-right">
                        <a href="home.php?page=deans&method=create-project" class="btn btn-success">
                            Thêm
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="list-projects" class="table table-head-bg-success table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Chủ đề</th>
                                <th scope="col">Sinh viên</th>
                                <th scope="col">Giáo viên</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Ngày kết thúc</th>
                                <th scope="col">Chi tiết</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0;
                            foreach ($result as $key => $value) {
                                $stt += 1;
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $value['namepr']; ?></td>
                                    <td><?php echo $value['nameto']; ?></td>
                                    <td><?php echo $value['namest']; ?></td>
                                    <td><?php echo $value['namete']; ?></td>
                                    <td><?php echo $value['created_at']; ?></td>
                                    <td><?php echo $value['endtime']; ?></td>
                                    <td><a class="btn btn-info"
                                            href="home.php?page=deans&method=view-tutorial-student&id=<?php echo $value['idsv']; ?>">View</a>
                                    </td>
                                    <td>
                                        <a href="home.php?page=deans&method=update-project&id=<?php echo $value['id']; ?>"
                                            class="btn btn-primary">
                                            Sửa
                                        </a>
                                        <a href="home.php?page=deans&method=destroy-project&id=<?php echo $value['id']; ?>"
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
    case 'list-progress';
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Bảng kế hoạch thực hiện đồ án</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="text-right">
                        <a href="home.php?page=deans&method=create-progress" class="btn btn-success">
                            Thêm
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="list-teachers" class="table table-head-bg-success table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%">STT</th>
                                <th scope="col" style="width: 60%">Nội dung</th>
                                <th scope="col" style="width: 10%">Bắt đầu</th>
                                <th scope="col" style="width: 10%">Kết thúc</th>
                                <th scope="col" style="width: 20%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            foreach ($result as $key => $value) {
                                $stt += 1;
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $value['title']; ?></td>
                                    <td><?php echo $value['start']; ?></td>
                                    <td><?php echo $value['end']; ?></td>
                                    <td>
                                        <a href="home.php?page=deans&method=update-progress&id=<?php echo $value['id']; ?>"
                                            class="btn btn-primary">
                                            Sửa
                                        </a>
                                        <a href="home.php?page=deans&method=destroy-progress&id=<?php echo $value['id']; ?>"
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
                                border        : 3px solid #d2d6de;
                                border-radius : 50%;
                                display       : block;
                                max-width     : 100%;
                                height        : auto;
                                vertical-align: middle;">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <h3 class="profile-username text-center"><?php echo $value['namest'] ?>
                                </h3>
                                <p class="text-muted text-center">Mã học viên: <b><?php echo $value['id'] ?></b>
                                </p>
                                <p class="text-muted text-center">Mã đồ án: <b><?php echo $value['idpr'] ?></b>
                                </p>
                                <table class="table table-condensed tb-info-hv">
                                    <tbody>
                                        <tr>
                                            <td>Ngày sinh: </td>
                                            <td title="<?php echo $value['birthday'] ?>"><?php echo $value['birthday'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Giới tính: </td>
                                            <td><?php if ($value['sex'] == 1) {
                                                    echo 'Nam';
                                                } else {
                                                    echo 'Nữ';
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nơi sinh: </td>
                                            <td><?php echo $value['address'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Học lớp: </td>
                                            <td><?php echo $value['namecl'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Giáo viên hướng dẫn: </td>
                                            <td><?php echo $value['namete'] ?></td>
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
                                foreach ($plan as $key => $value) {
                                    $stt += 1;
                                ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['start']; ?></td>
                                        <td><?php echo $value['end']; ?></td>
                                        <td><?php if ($value['status'] == 1) {
                                                echo 'Hoàn thành';
                                            } else if ($value['status'] == 0 || $value['status'] == '') {
                                                echo 'Chưa hoàn thành';
                                            }
                                            ?></td>
                                        <td>
                                            <?php if ($value['status'] == 1) {
                                            } else if ($value['status'] == 0 || $value['status'] == '') {
                                            ?><a
                                                    href="home.php?page=deans&method=view-comment&id=<?php echo $result[0]['id'] ?>&id-comment=<?php echo $value['id']; ?>"
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="" class="">
                            <h3 class="page-title" style="text-transform: uppercase;">Bài làm
                            </h3>
                            <h3 style="text-transform: uppercase; color: red;">
                                <?php if ($contentdone[0]['content'] == '') {
                                    echo 'Đồ án chưa hoàn thành';
                                } ?>
                            </h3>
                            
                            <div class="view">
                                <?php
                                if (empty($content) == null && $content[0]['endtime'] == '0000-00-00') {
                                    $cont = $content;
                                } else {
                                    $cont = $contentdone;
                                }
                                foreach ($cont as $value) { ?>
                                    <textarea class="form-control ckeditor" name="content" id="content" cols="30" rows="10"
                                        disabled>
                                    <?php echo $value['content'] ?>
                                    </textarea>
                                <?php }
                                if (empty($content) == null && $content[0]['endtime'] == '0000-00-00') {
                                ?>
                                    <!-- <form action = "" method = "POST">
                            <p>Đánh giá bài làm của sinh viên: </p>
                            <input    type  = "radio" id    = "1" name       = "status" value = "1">
                            <label    for   = "1">Hoàn thành</label><br>
                            <input    type  = "radio" id    = "0" name       = "status" value = "0">
                            <label    for   = "0">Chưa hoàn thành</label><br>
                            <label    for   = "comment">Nhận xét:</label><br>
                            <textarea name  = "comment" id  = "comment" cols = "40" rows      = "5"></textarea><br>
                            <div      class = "offset-sm-2 col-md-10">
                            <button   type  = "submit" name = "sent" class   = "bnt btn-danger">Sent</button>
                            </div>
                        </form> -->
                                <?php }
                                ?>
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
            class="col-md-/*<?php if (empty($content) == null && $content[0]['endtime'] == '0000-00-00') {
                                echo '12';
                            } else {
                                echo '9';
                            } ?>*/12">
            <div class="card">
                <div class="card-body">
                    <div id="" class="">
                        <h4><a href="home.php?page=deans&method=view-tutorial-student&id=<?php echo $result[0]['id']; ?>"
                                class="btn btn-info">↩ Back</a></h4>
                        <h3 style="text-transform: uppercase; color: red;">
                            <?php if ($contentdone[0]['content'] == '') {
                                echo 'Đồ án chưa hoàn thành';
                            } ?>
                        </h3>
                        <div class="view">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Bài làm</h3>
                                    <?php foreach ($comment as $value) { ?>
                                        <textarea disabled class="form-control ckeditor" name="content" id="content" cols="30"
                                            rows="10"
                                            <?php if (empty($content) == null && $content[0]['endtime'] != '0000-00-00') {
                                                echo 'disabled';
                                            } ?>>
                                    <?php echo $value['content'] ?>
                                </textarea><br>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <h3>Nhận xét của giáo viên: </h3>
                                    <?php foreach ($comment as $value) { ?>
                                        <textarea class="form-control ckeditor" name="content" id="content" cols="30" rows="10"
                                            <?php if (empty($content) == null && $content[0]['endtime'] != '0000-00-00') {
                                                echo 'disabled';
                                            } ?>>
                                                    <?php echo $value['comment'] ?>
                                                </textarea>
                                    <?php } ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        break;
    case 'create-teacher';
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Thêm giáo viên</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">

                            <div class="form-group">
                                <label>STT: </label>
                                <input class="form-control" name="id" value="">

                            </div>
                            <div class="form-group">
                                <label>Họ tên: </label>

                                <input class="form-control" name="name" value="">

                            </div>

                            <div class="form-group">
                                <label>Ngày sinh: </label>
                                <input class="form-control" name="birthday" value="" type="date">
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ: </label>
                                <input type="text" class="form-control" name="address" value="">
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại: </label>
                                <input type="text" class="form-control" name="phone" value="">
                            </div>

                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text" class="form-control" name="email" value="">
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
    case 'create-student';
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Thêm học viên</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">

                            <div class="form-group">
                                <label>STT: </label>
                                <input class="form-control" name="id" value="">
                            </div>

                            <div class="form-group">
                                <label>Họ tên: </label>
                                <input class="form-control" name="name" value="">
                            </div>

                            <div class="form-group">
                                <label>Lớp: </label>
                                <select class="form-control" name="id_class">
                                    <?php
                                    foreach ($class as $key => $value) {
                                    ?>

                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ngày sinh: </label>
                                <input class="form-control" name="birthday" value="" type="date">
                            </div>

                            <div class="form-group">
                                <label>Giới tính: </label>
                                <select class="form-control" name="sex">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ: </label>
                                <input type="text" class="form-control" name="address" value="">
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại: </label>
                                <input type="text" class="form-control" name="phone" value="">
                            </div>

                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text" class="form-control" name="email" value="">
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
    case 'create-project':
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Thêm đồ án</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">

                            <div class="form-group">
                                <label>STT: </label>
                                <input class="form-control" name="id" value="">
                            </div>

                            <div class="form-group">
                                <label>Tên: </label>
                                <input class="form-control" name="name" value="">
                            </div>

                            <div class="form-group">
                                <label>Chủ đề: </label>
                                <select class="form-control" name="id_topic">
                                    <?php
                                    foreach ($topic as $key => $value) {
                                    ?>

                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sinh viên: </label>
                                <select class="form-control" name="id_student">
                                    <?php
                                    foreach ($student as $key => $value) {
                                    ?>

                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['namest']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Giáo viên: </label>
                                <select class="form-control" name="id_teacher">
                                    <?php
                                    foreach ($teacher as $key => $value) {
                                    ?>

                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ngày bắt đầu: </label>
                                <input type="date" class="form-control" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="form-group">
                                <label>Ngày kết thúc: </label>
                                <input type="date" class="form-control" name="endtime" value="<?php echo date('Y-m-d'); ?>">
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
    case 'create-progress';
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Thêm kế hoạch thực hiện</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>STT: </label>
                                <input class="form-control" name="id" value="">
                            </div>
                            <div class="form-group">
                                <label>Nội dung: </label>
                                <input class="form-control" name="title" value="">
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu: </label>
                                <input class="form-control" name="start" value="" type="date">
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc: </label>
                                <input class="form-control" name="end" value="" type="date">
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
    case 'update-teacher';
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Chỉnh sửa thông tin giáo viên</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="form-group">
                                    <label>ID: </label>
                                    <input disabled class="form-control" name="id" value="<?php echo $value['id']; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Họ tên: </label>
                                    <input class="form-control" name="name" value="<?php echo $value['name']; ?>">

                                </div>

                                <div class="form-group">
                                    <label>Ngày sinh: </label>
                                    <input class="form-control" name="birthday" value="<?php echo $value['birthday']; ?>"
                                        type="date">
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ: </label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $value['address']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại: </label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $value['phone']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Email: </label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $value['email']; ?>">
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
    case 'update-student':
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Chỉnh sửa thông tin học viên</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="form-group">
                                    <label>ID: </label>
                                    <input disabled class="form-control" name="id" value="<?php echo $value['id']; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Họ tên: </label>
                                    <input class="form-control" name="name" value="<?php echo $value['namest']; ?>">

                                </div>

                                <div class="form-group">
                                    <label>Lớp: </label>
                                    <select class="form-control" name="id_class">
                                        <option value="<?php echo $value['id_cl']; ?>"><?php echo $value['namecl']; ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Ngày sinh: </label>
                                    <input class="form-control" name="birthday" value="<?php echo $value['birthday']; ?>"
                                        type="date">
                                </div>

                                <div class="form-group">
                                    <label>Giới tính: </label>
                                    <select class="form-control" name="sex">
                                        <?php if ($value['sex'] == 1) { ?>
                                            <option value="1"><?php echo 'Nam'; ?></option>
                                            <option value="0"><?php echo 'Nữ'; ?></option>
                                        <?php } else { ?>
                                            <option value="0"><?php echo 'Nữ'; ?></option>
                                            <option value="1"><?php echo 'Nam'; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ: </label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $value['address']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại: </label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $value['phone']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Email: </label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $value['email']; ?>">
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
    case 'update-project':
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Sửa đồ án</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="form-group">
                                    <label>ID: </label>
                                    <input disabled class="form-control" name="id" value="<?php echo $value['id']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tên: </label>
                                    <input class="form-control" name="name" value="<?php echo $value['name']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Chủ đề: </label>
                                    <select class="form-control" name="id_topic">
                                        <option value="<?php echo $value['idto']; ?>"><?php echo $value['nameto']; ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sinh viên: </label>
                                    <select class="form-control" name="id_student">
                                        <option value="<?php echo $value['idst']; ?>"><?php echo $value['namest']; ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Giáo viên: </label>
                                    <select class="form-control" name="id_teacher">
                                        <option value="<?php echo $value['idte']; ?>"><?php echo $value['namete']; ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Ngày tạo: </label>
                                    <input type="date" class="form-control" name="created_at"
                                        value="<?php echo $value['created_at']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Ngày cập nhật: </label>
                                    <input type="date" class="form-control" name="endtime" value="<?php echo $value['endtime'] ?>">
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
    case 'update-progress';
    ?>
        <h4 class="page-title" style="text-transform: uppercase;">Chỉnh sửa kế hoạch thực hiện</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="POST">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="form-group">
                                    <label>ID: </label>
                                    <input disabled class="form-control" name="id" value="<?php echo $value['id']; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Nội dung: </label>
                                    <input class="form-control" name="title" value="<?php echo $value['title']; ?>">

                                </div>

                                <div class="form-group">
                                    <label>Ngày bắt đầu: </label>
                                    <input class="form-control" name="start" value="<?php echo $value['start']; ?>" type="date">
                                </div>

                                <div class="form-group">
                                    <label>Ngày kết thúc: </label>
                                    <input class="form-control" name="end" value="<?php echo $value['end']; ?>" type="date">
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
        # code...
        break;
}
?>