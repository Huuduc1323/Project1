<?php 
include_once './model/students.php';
class studentscontroller extends students
{   
    private $students;
    function __construct()
    {
        $this->students = new students();
    }
    function studentscontrol()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }else{
            $method = 'index';
        }
        switch ($method) {
            case 'list-projects': 
                $result = $this->students->indexproject();
                include_once './View/students.php';
            break;
            case 'my-project': 
                $id          = "'".$_SESSION['id']."'";
                $result      = $this->students->indexstudentview($id);
                
                if (count($this->students->indexstudentview($id)) != 0){
                    $idpr        = "'".$this->students->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->students->indexplan($idpr);
                }else{
                    $idpr        = "";
                    $plan        = [];
                }
                
                if (count($this->students->indexstudentview($id)) != 0){
                    $id_student  = "'".$this->students->indexstudentview($id)[0]['id']."'";
                    $content     = $this->students->getprojectprogress($id_student);
                    $contentdone = $this->students->getprojectprogressdone($id_student);
                }else{
                    $id_student  = "";
                    $content     = [];
                    $contentdone = [];
                }

                if(isset($_POST['sent'])){
                    $content     = $_POST['content'];
                    $comment     = $_POST['comment'];
                    $id_project  = $this->students->getprojectprogress($id)[0]['id_project'];
                    $id_progress = $this->students->getprojectprogress($id)[0]['id_progress'];
                    $updetail    = $this->students->updetail($content,$id_project,$id_progress);
                    header('Location: ./home.php?page=students&method=my-project');
                }
                include_once './View/students.php';
            break;
            case 'view-tutorial-student': 
                if (isset($_GET['id'])) {
                    $id          = "'".$_GET['id']."'";
                    $result      = $this->students->indexstudentview($id);
                    $idpr        = "'".$this->students->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->students->indexplan($idpr);
                    $id_student  = "'".$this->students->indexstudentview($id)[0]['id']."'";
                    $content     = $this->students->getprojectprogress($id_student);
                    $contentdone = $this->students->getprojectprogressdone($id_student);
                    // if(isset($_POST['sent'])){
                    //     $status = $_POST['status'];
                    //     $comment = $_POST['comment'];
                    //     $id_project = $this->deans->getprojectprogress($id_student)[0]['id_project'];
                    //     $id_progress = $this->deans->getprojectprogress($id_student)[0]['id_progress'];
                    //     $updetail = $this->deans->updetail($status,$comment,$id_project,$id_progress);
                    // }
                }
                include_once './View/students.php';
            break;
            case 'view-comment':
                if (isset($_GET['id'])) {
                    $id          = "'".$_GET['id']."'";
                    $result      = $this->students->indexstudentview($id);
                    $id_project  = "'".$result[0]['idpr']."'";
                    $id_progress = "'".$_GET['id-comment']."'";
                    $comment     = $this->students->indexcomment($id_project,$id_progress);
                    $idpr        = "'".$this->students->indexstudentview($id)[0]['idpr']."'";
                    $plan        = $this->students->indexplan($idpr);
                    $id_student  = "'".$this->students->indexstudentview($id)[0]['id']."'";
                    $content     = $this->students->getprojectprogress($id_student);
                    $contentdone = $this->students->getprojectprogressdone($id_student);
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