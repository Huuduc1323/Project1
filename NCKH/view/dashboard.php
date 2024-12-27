<?php
    $deleteremider;
    if(!isset($reminder_for_st)){
        $reminder_for_st = [];
    }
    if(!isset($endremider)){
        $endremider="0000-00-00";
    }
	$cookie_name  = "deadline";
	$cookie_value = "deadline";
    foreach($stud as $value){
        $_SESSION['namemail'] = $value['name'];
        $_SESSION['email']    = $value['email'];
    }
    foreach ($dl as $value){
        // $end       = '2021-08-23';
        $content   = $value['title'];
        $end       = $value['end'];
        $countdown = $value['countdown'];
    }
    foreach($remider as $value){
        $contentremider   = $value['title'];
        $endremider       = $value['end'];
        $countdownremider = $value['countdown'];
    }
    foreach($reminder as $value){
        $content_for_te   = $value['title'];
        $end_for_te       = $value['time'];
        $countdown_for_te = $value['countdown'];
    }
    foreach($reminder_for_st as $value){
        $content_for_st   = $value['title'];
        $end_for_st       = $value['time'];
        $countdown_for_st = $value['countdown'];
    }
    
	setcookie($cookie_name, $cookie_value, time() + (86400), "/");//86400
    if($_SESSION['pq'] == 'gv'){
        if($reminder != null && !isset($_COOKIE[$cookie_name]) && date("Y-m-d")==$endremider){    
            foreach ($remider as $value){
                $_SESSION['contentremider'] = "
                    <div class = 'container'>
                    <img style = 'width:100%' src = 'https://www.utc.edu.vn/assets/utc/images/logo.png' class = 'block'
                         alt   = 'Khoa Công nghệ thông tin'>
                        <div>
                            <h1>📢📢📢 Giáo viên hướng dẫn có đặt lời nhắc: ".'"'. $value['title'].'"'." vào hôm nay📢📢📢</h1>
                        </div>
                        <div>
                            <h2>📑📑 Nội dung: ".$value['content']."</h2>
                        </div>
                        <div>
                            <h2>🔔🔔 Hãy thực hiện đi nào! 🔔🔔</h2>
                        </div>
                    </div>
                    ";

                echo "<script>
                    alert('🔔 📢 Đến hạn lời nhắc: ".'"'. $value['title'].'" của bạn với sinh viên\n'."\ Hãy bấm ".'"OK"'." để nhắc sinh viên của bạn!');
                    alert('Gmail của sinh viên: ".$_SESSION['email']."');
                    </script>";
            }     
            // include_once './PHPMailer/mailreminder.php';
        }
        if(!isset($_COOKIE[$cookie_name]) && date("Y-m-d")==$end) {
            foreach ($dl as $value){
                $_SESSION['content'] = "
                    <div class = 'container'>
                    <img style = 'width:100%' src = '' class = 'block'
                         alt   = 'Khoa Công nghệ thông tin'>
                        <div>
                            <h1>📢📢📢 Đến hạn ".'"'. $value['title'].'"'." 📢📢📢</h1>
                        </div>
                        <div>
                            <h2>🔔🔔 Hãy nộp bài đi nào! 🔔🔔</h2>
                        </div>
                    </div>
                    ";

                echo "<script>
                alert('🔔 📢 Đến hạn ".'"'. $value['title'].'"\n'."\ Hãy bấm ".'"OK"'." để nhắc sinh viên của bạn!');
                    alert('Gmail của sinh viên: ".$_SESSION['email']."');
                    </script>";
            }
            // include_once './PHPMailer/mail.php';
        }else {
            echo '<script>
                    clearTimeout(do_alert);
                </script>';
            if(isset($end) && date("Y-m-d")==$end){
                echo "✅ Đã nhắc sinh viên của bạn nộp bài";
            }else if(date("Y-m-d")==$endremider){
                echo "✅ Đã gửi lời nhắc sinh viên của bạn";
            }
            // else{
            //     echo '⏳ Còn "'.$countdown.'" ngày nữa là đến hạn "'.$content.'"';
            // }
        }
    }
    // if(date("Y-m-d")!=$end_for_st){
    //     echo '⏳ Còn "'.$countdown_for_st.'" ngày nữa là hết hạn "'.$content_for_st.'"';
    // }
    // if($_SESSION['pq'] == 'hs' && date("Y-m-d")==$endremider){
    //     echo "Hôm nay bạn có lịch hẹn với giáo viên hướng dẫn!<br>";
    // }
    if(!isset($end)||!isset($countdown)||!isset($content)){
        $end       = "00/00/0000";
        $countdown = "00/00/0000";
        $content   = "";
    }else{
        if(date("Y-m-d")!=$end){
            echo '⏳ Còn "'.$countdown.'" ngày nữa là hết hạn "'.$content.'"';
        }else if($_SESSION['pq'] == 'hs' && date("Y-m-d")==$end){
            echo "Nộp bài đi nào!";
        }
    }
include_once './layout/calendar.php';

$days_left  = date('t') - date('d') + 1;             //tính số ngày đến cuối tháng
$days_pre   = date('d') - 0;                         //tính số ngày đến đầu tháng
$day_1      = date('Y-m-01') ;                       // ngày đầu tháng
$day_last   = date("Y-m-t");                         // ngày cuối tháng
$day1       = time() + ($days_left * 24 * 60 * 60);  // ngày; giờ; phút; giây
$day2       = time() - ($days_pre * 24 * 60 * 60);   // ngày; giờ; phút; giây
$next_month = date('Y-m-d', $day1);                  //tháng sau
$pre_month  = date('Y-m-d', $day2);                  //tháng trước
$today      = date('Y-m-d');                         //thàng này

// $day='';
// if($day == '1'){
//     $calendar = new Calendar($today);
// }elseif($day == '2'){
//     $calendar = new Calendar($pre_month);
// }elseif($day == '3'){
//     $calendar = new Calendar($next_month);
// }else{
//     $calendar = new Calendar();
// }
// if(isset($_POST['today'])){
//     echo '1';
//     header('Location: ./home.php?page=dashboard');
// }
// echo $_POST['today'];

$calendar = new Calendar();
foreach ($calen as $value){
    $calendar->add_event( $value['title'], $value['start'], $value['time']);
}
foreach ($reminder as $value){
    $calendar->add_event( $value['title'], $value['time'], 0,'red');
}
if($_SESSION['pq']=='hs'){
    foreach ($reminder_for_st as $value){
        $calendar->add_event( $value['title'], $value['time'], 0,'red');
    }
}
$calendar->add_event('TODAY',date("Y/m/d"),0,'green');
echo $calendar;
?>