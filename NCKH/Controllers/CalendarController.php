<?php 
include_once './model/calendar.php';
class calendarcontroller extends calenda
{
    private $calendar;
    function __construct()
    {
        $this->calendar = new calenda();
    }
    function calendarcontrol()
    {
        if(isset($_GET['page'])){
            $page = $_GET['page'];
          }else{
            $page = 'home';
          }
        switch ($page) {
            case 'dashboard': 
                $id       = "'".$_SESSION['id']."'";
                $calen    = $this->calendar->calendar();
                $stud     = $this->calendar->indexstudenttutorial($id);
                $dl       = $this->calendar->deadine();
                $reminder = $this->calendar->indexreminder($id);
                $remider  = $this->calendar->remider();
                if($_SESSION['pq']=='hs'){
                    if(count($this->calendar->getidteacher($id)) != 0){
                        $id_te           = "'".$this->calendar->getidteacher($id)[0]['id']."'";
                        $reminder_for_st = $this->calendar->indexreminder($id_te);
                    }
                }
                $deleteremider = $this->calendar->deleteremider();
                include_once './View/dashboard.php';
                break; 
            default: 
                $id       = "'".$_SESSION['id']."'";
                $calen    = $this->calendar->calendar();
                $stud     = $this->calendar->indexstudenttutorial($id);
                $dl       = $this->calendar->deadine();
                $reminder = $this->calendar->indexreminder($id);
                $remider  = $this->calendar->remider();
                if($_SESSION['pq']=='hs'){
                    $id_te           = "'".$this->calendar->getidteacher($id)[0]['id']."'";
                    $reminder_for_st = $this->calendar->indexreminder($id_te);
                }
                $deleteremider = $this->calendar->deleteremider();
                include_once './View/dashboard.php';
                break;
        }
    }
}