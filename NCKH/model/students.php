<?php 
include_once './config/myConfig.php';
class students extends Connect
{
    function __construct()
    {
        parent::__construct();
    }
    function indexproject()
    {
        $sql = "SELECT students.id as 'idsv', projects.id, projects.name as'namepr', projects.created_at,projects.endtime, teachers.name as 'namete', students.name as 'namest', topic.name as 'nameto' FROM projects, teachers, students, topic WHERE projects.id_student=students.id AND projects.id_teacher=teachers.id AND projects.id_topic=topic.id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexstudent($id)
    {
        $sql = "SELECT students.id as'id', students.name as 'namest', students.id_class as'id_cl', students.birthday, students.address, students.phone, students.email, classes.name as 'namecl', teachers.name as'namete', students.sex FROM students,classes,projects,teachers WHERE students.id=$id AND students.id_class=classes.id AND projects.id_student=students.id AND projects.id_teacher=teachers.id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function updetail($content,$id_project,$id_progress)
    {
        $sql = "UPDATE details SET content= :content WHERE details.id_project = :id_project AND details.id_progress = :id_progress";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':content', $content);
        $pre->bindParam(':id_project', $id_project);
        $pre->bindParam(':id_progress', $id_progress);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexstudentview($id)
    {
        $sql = "SELECT projects.id as 'idpr', students.id, students.name as 'namest', students.id_class as'id_cl', students.birthday, students.address, students.phone, students.email, classes.name as 'namecl', teachers.name as'namete', students.sex FROM students,classes,projects,teachers WHERE students.id=$id AND students.id_class=classes.id AND projects.id_student=students.id AND projects.id_teacher=teachers.id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexplan($idpr)
    {
        $sql = "SELECT progress.id, progress.title, progress.start, progress.end, details.status, details.comment FROM progress, details WHERE details.id_progress=progress.id AND details.id_project = $idpr";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function getprojectprogress($id_student)
    {
        $sql = "SELECT details.id_project, details.id_progress, details.comment, details.content, details.status, projects.endtime FROM progress, projects, students, details WHERE details.id_project = projects.id AND details.id_progress = progress.id AND month(progress.end) = month(now()) AND projects.id_student = students.id AND students.id = $id_student";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function getprojectprogressdone($id_student)
    {
        $sql = "SELECT details.id_project, details.id_progress, details.comment, details.content, details.status, projects.endtime FROM progress, projects, students, details WHERE details.id_project = projects.id AND details.id_progress = progress.id AND projects.id_student = students.id AND students.id = $id_student AND details.id_progress = (SELECT MAX(details.id_progress) FROM details)";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexcomment($id_project,$id_progress)
    {
        $sql = "SELECT * FROM details WHERE id_project = $id_project AND id_progress = $id_progress";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createprogressdetail($id_project,$id_progress)
    {
        $sql = "INSERT INTO details(id_project, id_progress) VALUES (:id_project,:id_progress)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id_project', $id_project);
        $pre->bindParam(':id_progress', $id_progress);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>