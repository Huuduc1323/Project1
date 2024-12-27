<?php 
include_once './Model/Teachers.php';
class teacherscontroller extends teachers
{   
    private $teachers;
    function __construct()
    {
        $this->teachers = new teachers();
    }
    function teacherscontrol()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }else{
            $method = 'index';
        }
        switch ($method) {
            
            //SHOW
            
            case 'list-reminder': 
                $result = $this->teachers->indexreminder();
                include_once './View/teachers.php';
            break;

            case 'list-students': 
                $result = $this->teachers->indexstudent();
                include_once './View/teachers.php';
            break;

            case 'list-projects': 
                $result = $this->teachers->indexproject();
                include_once './View/teachers.php';
            break;

            case 'tutorial-student': 
                $id     = "'".$_SESSION['id']."'";
                $result = $this->teachers->indexstudenttutorial($id);
                include_once './View/teachers.php';
            break;
            
            case 'view-tutorial-student': 
                if (isset($_GET['id'])) {
                    $id          = "'".$_GET['id']."'";
                    $result      = $this->teachers->indexstudentview($id);
                    $idpr        = "'".$this->teachers->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->teachers->indexplan($idpr);
                    $id_student  = "'".$this->teachers->indexstudentview($id)[0]['id']."'";
                    $content     = $this->teachers->getprojectprogress($id_student);
                    $contentdone = $this->teachers->getprojectprogressdone($id_student);
                    if(isset($_POST['sent'])){
                        $status      = $_POST['status'];
                        $comment     = $_POST['comment'];
                        // $content     = $_POST['content'];
                        $id_project  = $this->teachers->getprojectprogress($id_student)[0]['id_project'];
                        $id_progress = $this->teachers->getprojectprogress($id_student)[0]['id_progress'];
                        $updetail    = $this->teachers->updetail($status,$comment,$id_project,$id_progress);
                        header('Location: ./home.php?page=teachers&method=view-tutorial-student&id='.$_GET['id'].'');
                    }
                }
                include_once './View/teachers.php';
            break;

            case 'view-comment':
                if (isset($_GET['id'])) {
                    $id          = "'".$_GET['id']."'";
                    $result      = $this->teachers->indexstudentview($id);
                    $id_project  = "'".$result[0]['idpr']."'";
                    $id_progress = "'".$_GET['id-comment']."'";
                    $comment     = $this->teachers->indexcomment($id_project,$id_progress);
                    $idpr        = "'".$this->teachers->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->teachers->indexplan($idpr);
                    $id_student  = "'".$this->teachers->indexstudentview($id)[0]['id']."'";
                    $content     = $this->teachers->getprojectprogress($id_student);
                    $contentdone = $this->teachers->getprojectprogressdone($id_student);
                }
                include_once './View/teachers.php';
            break;
            
            //CREATE
            
            case 'create-reminder': 
                if(isset($_POST['create'])){
                    $title      = $_POST['title'];
                    $time       = $_POST['time'];
                    $content    = $_POST['content'];
                    $id_teacher = $_SESSION['id'];
                    if($this->teachers->checkreminder($title,$time,$content)){
                        $message = "Trùng lịch";
                        echo "<script>alert('$message');</script>";
                    }else{
                        $result = $this->teachers->createreminder($title,$time,$content,$id_teacher);
                        header('Location: ./home.php?page=teachers&method=list-reminder');
                    }
                }
                include_once './View/teachers.php';
            break;

            //UPDATE

            case 'update-reminder': 
                if (isset($_GET['id'])) {
                    $id  = "'".$_GET['id']."'";
                    $get = $this->teachers->getreminder($id);
                    if(isset($_POST['update'])){
                        $title   = $_POST['title'];
                        $content = $_POST['content'];
                        $time    = $_POST['time'];
                        $result  = $this->teachers->updatereminder($id,$title,$time,$content);
                        header('Location: ./home.php?page=teachers&method=list-reminder');
                    }
                }
                include_once './View/teachers.php';
            break;

            //DESTROY

            case 'destroy-reminder': 
                if (isset($_GET['id'])) {
                    $id     = "'".$_GET['id']."'";
                    $result = $this->teachers->destroyreminder($id);
                }
                header('Location: ./home.php?page=teachers&method=list-reminder');
            break;
            default: 
                $id     = "'".$_SESSION['id']."'";
                $result = $this->teachers->indexstudenttutorial($id);
                include_once './View/teachers.php';
            break;
        }
    }
    

}
class deanscontroller extends deans
{   
    private $deans;
    function __construct()
    {
        $this->deans = new deans();
    }
    function deanscontrol()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }else{
            $method = 'index';
        }
        switch ($method) {

            // SHOW

            case 'list-teachers': 
                $result = $this->deans->indexteacher();
                include_once './View/deans.php';
            break;
            case 'list-students': 
                $result = $this->deans->indexstudent();
                include_once './View/deans.php';
            break;
            case 'list-projects': 
                $result = $this->deans->indexproject();
                include_once './View/deans.php';
            break;
            case 'list-progress': 
                $result = $this->deans->indexprogress();
                include_once './View/deans.php';
            break;
            case 'view-tutorial-student': 
                if (isset($_GET['id'])) {
                    $id          = "'".$_GET['id']."'";
                    $result      = $this->deans->indexstudentview($id);
                    $idpr        = "'".$this->deans->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->deans->indexplan($idpr);
                    $id_student  = "'".$this->deans->indexstudentview($id)[0]['id']."'";
                    $content     = $this->deans->getprojectprogress($id_student);
                    $contentdone = $this->deans->getprojectprogressdone($id_student);
                    if(isset($_POST['sent'])){
                        $status      = $_POST['status'];
                        $comment     = $_POST['comment'];
                        $id_project  = $this->deans->getprojectprogress($id_student)[0]['id_project'];
                        $id_progress = $this->deans->getprojectprogress($id_student)[0]['id_progress'];
                        $updetail    = $this->deans->updetail($status,$comment,$id_project,$id_progress);
                    }
                }
                include_once './View/deans.php';
            break;
            case 'view-comment':
                if (isset($_GET['id'])) {
                    $id          = "'".$_GET['id']."'";
                    $result      = $this->deans->indexstudentview($id);
                    $id_project  = "'".$result[0]['idpr']."'";
                    $id_progress = "'".$_GET['id-comment']."'";
                    $comment     = $this->deans->indexcomment($id_project,$id_progress);
                    $idpr        = "'".$this->deans->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->deans->indexplan($idpr);
                    $id_student  = "'".$this->deans->indexstudentview($id)[0]['id']."'";
                    $content     = $this->deans->getprojectprogress($id_student);
                    $contentdone = $this->deans->getprojectprogressdone($id_student);
                }
                include_once './View/deans.php';
            break;

            // CREATE

            case 'create-teacher': 
                if(isset($_POST['create'])){
                    $id       = $_POST['id'];
                    $name     = $_POST['name'];
                    $birthday = $_POST['birthday'];
                    $address  = $_POST['address'];
                    $phone    = $_POST['phone'];
                    $email    = $_POST['email'];
                    if($this->deans->checkidteacher($id)){
                        $message = "Trùng mã giáo viên";
                        echo "<script>alert('$message');</script>";
                    }else{
                        $create    = $this->deans->createteacher($id,$name,$birthday,$address,$phone,$email);
                        $createacc = $this->deans->createaccteacher($id,$name,$birthday,$email);
                        header('Location: ./home.php?page=deans&method=list-teachers');
                    }
                }
                include_once './View/deans.php';
            break;
            case 'create-student': 
                $class = $this->deans->indexclass();
                if(isset($_POST['create'])){
                    $id       = $_POST['id'];
                    $name     = $_POST['name'];
                    $id_class = $_POST['id_class'];
                    $birthday = $_POST['birthday'];
                    $sex      = $_POST['sex'];
                    $address  = $_POST['address'];
                    $phone    = $_POST['phone'];
                    $email    = $_POST['email'];
                    if($this->deans->checkidstudent($id)){
                        $message = "Trùng mã sinh viên";
                        echo "<script>alert('$message');</script>";
                    }else{
                        $create    = $this->deans->createstudent($id,$name,$id_class,$birthday,$sex,$address,$phone,$email);
                        $createacc = $this->deans->createaccstudent($id,$name,$birthday,$email);
                        header('Location: ./home.php?page=deans&method=list-students');
                    }
                }
                include_once './View/deans.php';
            break;
            case 'create-project': 
                $topic   = $this->deans->indextopic();
                $student = $this->deans->indexstudent();
                $teacher = $this->deans->indexteacher();
                if(isset($_POST['create'])){
                    $id         = $_POST['id'];
                    $name       = $_POST['name'];
                    $id_topic   = $_POST['id_topic'];
                    $id_student = $_POST['id_student'];
                    $id_teacher = $_POST['id_teacher'];
                    $created_at = $_POST['created_at'];
                    $endtime    = $_POST['endtime'];
                    if($this->deans->checkidproject($name)){
                        $message = "Trùng tên đồ án";
                        echo "<script>alert('$message');</script>";
                    }else{
                        $create = $this->deans->createproject($id, $name, $id_topic, $id_student, $id_teacher, $created_at, $endtime);
                        $detail = $this->deans->createdetailproject($id);
                        header('Location: ./home.php?page=deans&method=list-projects');
                    }
                }
                include_once './View/deans.php';
            break;
            case 'create-progress': 
                if(isset($_POST['create'])){
                    $id    = $_POST['id'];
                    $title = $_POST['title'];
                    $start = $_POST['start'];
                    $end   = $_POST['end'];
                    if($this->deans->checkidprogress($name)){
                        $message = "Trùng tên";
                        echo "<script>alert('$message');</script>";
                    }else{
                        $create = $this->deans->createprogress($id,$title,$start,$end);
                        $id_project = $this->deans->indexprogressdetail()[0]['id_project'];
                        $id_progress = $this->deans->indexprogressdetail()[0]['id_progress']+1;
                        $createdetail = $this->deans->createprogressdetail($id_project,$id_progress);
                        header('Location: ./home.php?page=deans&method=list-progress');
                    }
                }
                include_once './View/deans.php';
            break;

            // DESTROY

            case 'destroy-teacher': 
                if (isset($_GET['id'])) {
                    $id      = "'".$_GET['id']."'";
                    $destroy = $this->deans->destroyteacher($id);
                }
                header('Location: ./home.php?page=deans&method=list-teachers');
            break;
            case 'destroy-student': 
                if (isset($_GET['id'])) {
                    $id      = "'".$_GET['id']."'";
                    $destroy = $this->deans->destroystudent($id);
                }
                header('Location: ./home.php?page=deans&method=list-students');
            break;
            case 'destroy-project': 
                if (isset($_GET['id'])) {
                    $id             = "'".$_GET['id']."'";
                    $destroyproject = $this->deans->destroyproject($id);
                    $destroydetail  = $this->deans->destroydetail($id);
                }
                header('Location: ./home.php?page=deans&method=list-projects');
            break;
            case 'destroy-progress': 
                if (isset($_GET['id'])) {
                    $id       = "'".$_GET['id']."'";
                    $progress = $this->deans->destroyprogress($id);
                    $id_project = $this->deans->indexprogressdetail()[0]['id_project'];
                    $id_progress = $id;
                    $progressdetail = $this->deans->destroyprogressdetail($id_project,$id_progress);
                }
                header('Location: ./home.php?page=deans&method=list-progress');
            break;

            // UPDATE

            case 'update-teacher': 
                if (isset($_GET['id'])) {
                    $id     = "'".$_GET['id']."'";
                    $result = $this->deans->indexupteacher($id);
                    if(isset($_POST['update'])){
                        $name     = $_POST['name'];
                        $birthday = $_POST['birthday'];
                        $address  = $_POST['address'];
                        $phone    = $_POST['phone'];
                        $email    = $_POST['email'];
                        $update   = $this->deans->updateteacher($id,$name,$birthday,$address,$phone,$email);
                        header('Location: ./home.php?page=deans&method=list-teachers');
                    }
                }
                include_once './View/deans.php';
            break;
            case 'update-student': 
                if (isset($_GET['id'])) {
                    $id     = "'".$_GET['id']."'";
                    $result = $this->deans->indexupstudent($id);
                    if(isset($_POST['update'])){
                        $name     = $_POST['name'];
                        $id_class = $_POST['id_class'];
                        $birthday = $_POST['birthday'];
                        $sex      = $_POST['sex'];
                        $address  = $_POST['address'];
                        $phone    = $_POST['phone'];
                        $email    = $_POST['email'];
                        $update   = $this->deans->updatestudent($id,$name,$id_class,$birthday,$sex,$address,$phone,$email);
                        header('Location: ./home.php?page=deans&method=list-students');
                    }
                }
                include_once './View/deans.php';
            break;
            case 'update-project': 
                if (isset($_GET['id'])) {
                    $id     = "'".$_GET['id']."'";
                    $result = $this->deans->indexupproject($id);
                    if(isset($_POST['update'])){
                        $name       = $_POST['name'];
                        $id_topic   = $_POST['id_topic'];
                        $id_student = $_POST['id_student'];
                        $id_teacher = $_POST['id_teacher'];
                        $created_at = $_POST['created_at'];
                        $endtime = $_POST['endtime'];
                        $update     = $this->deans->updateproject($id,$name,$id_topic,$id_student,$id_teacher,$created_at,$endtime);
                        header('Location: ./home.php?page=deans&method=list-projects');
                    }
                }
                include_once './View/deans.php';
            break;
            case 'update-progress': 
                if (isset($_GET['id'])) {
                    $id     = "'".$_GET['id']."'";
                    $result = $this->deans->indexupprogress($id);
                    if(isset($_POST['update'])){
                        $title  = $_POST['title'];
                        $start  = $_POST['start'];
                        $end    = $_POST['end'];
                        $update = $this->deans->updateprogress($id,$title,$start,$end);
                        header('Location: ./home.php?page=deans&method=list-progress');
                    }
                }
                include_once './View/deans.php';
            break;
                default: 
                # code...
            break;
        }
        
    }
    

}

?>