<?php 
include_once './config/myConfig.php';
class calenda extends Connect
{
    function __construct()
    {
        parent:: __construct();
    }
    function calendar()
    {
        $sql = "SELECT title, start, DATEDIFF(end,start) as 'time' FROM progress";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function deadine()
    {
        $sql = "SELECT title, end, DAY(end) - DAY(NOW()) as 'countdown' FROM progress WHERE month(end) = month(now())";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexstudenttutorial($id)
    {
        $sql = "SELECT students.name, students.email FROM students, teachers, projects WHERE projects.id_student = students.id AND projects.id_teacher = teachers.id AND teachers.id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexreminder($id)
    {
        $sql = "SELECT *,DAY(time) - DAY(NOW()) as 'countdown' FROM reminder WHERE id_teacher=$id ORDER BY time DESC";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function getidteacher($id)
    {
        $sql = "SELECT teachers.id FROM teachers, projects, students WHERE projects.id_student = students.id AND projects.id_teacher = teachers.id AND students.id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function remider()
    {
        $sql = "SELECT title, time as 'end', DAY(time) - DAY(NOW()) as 'countdown', content FROM reminder WHERE day(time) = day(now())";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function deleteremider()
    {
        $sql = "DELETE FROM reminder WHERE time < date(now())";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}