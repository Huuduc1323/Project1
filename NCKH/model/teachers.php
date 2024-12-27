<?php 
include_once './config/myConfig.php';
class teachers extends Connect
{
    function __construct()
    {
        parent:: __construct();
    }

    /***************
     * INDEX
     ***************/

    function indexstudent()
    {
        $sql = "SELECT students.id as'id',classes.id as'id_cl', students.name as 'namest', students.id_class, students.birthday, students.address, students.phone, students.email, classes.name as 'namecl', students.sex FROM students,classes WHERE students.id_class=classes.id ";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexproject()
    {
        $sql = "SELECT students.id as 'idsv', projects.id, projects.name as'namepr', projects.created_at,projects.endtime, teachers.name as 'namete', students.name as 'namest', topic.name as 'nameto' FROM projects, teachers, students, topic WHERE projects.id_student=students.id AND projects.id_teacher=teachers.id AND projects.id_topic=topic.id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexstudenttutorial($id)
    {
        $sql = "SELECT students.id as'id',classes.id as'id_cl', students.name as 'namest', students.id_class, students.birthday, students.address, students.phone, students.email, classes.name as 'namecl', students.sex FROM students,classes,projects,teachers WHERE students.id_class=classes.id AND projects.id_student=students.id AND projects.id_teacher=teachers.id AND teachers.id= $id";
        $pre = $this->pdo->prepare($sql);
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
    function indexreminder()
    {
        $sql = "SELECT * FROM reminder";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function getreminder($id)
    {
        $sql = "SELECT * FROM reminder WHERE id=$id";
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
    
    /***************
     * CREATE
     ***************/

    function createreminder($title,$time,$content,$id_teacher)
    {
        $sql = "INSERT INTO reminder(title, time, content, id_teacher) VALUES (:title,:time,:content,:id_teacher)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':title', $title);
        $pre->bindParam(':time', $time);
        $pre->bindParam(':content', $content);
        $pre->bindParam(':id_teacher', $id_teacher);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

     /***************
     * UPDATE
     ***************/

    function updetail($status,$comment,$id_project,$id_progress)
    {
        $sql = "UPDATE details SET status = :status, comment = :comment WHERE details.id_project = :id_project AND details.id_progress = :id_progress";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':status', $status);
        $pre->bindParam(':comment', $comment);
        $pre->bindParam(':id_project', $id_project);
        $pre->bindParam(':id_progress', $id_progress);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function updatereminder($id,$title,$time,$content)
    {
        $sql = "UPDATE reminder SET title=:title, content=:content, time=:time WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':title', $title);
        $pre->bindParam(':time', $time);
        $pre->bindParam(':content', $content);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /***************
     * DESTROY
     ***************/

    function destroyreminder($id)
    {
        $sql = "DELETE FROM reminder WHERE id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

     /***************
     * CHECK
     ***************/

    function checkreminder($title,$time,$content)
    {
        $sql = "SELECT title, content, time FROM reminder WHERE title=:title AND content=:content AND time=:time";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':title', $title);
        $pre->bindParam(':time', $time);
        $pre->bindParam(':content', $content);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}
/////////////////////////////////////////////////////////////







////////////////////////////////////////////////////////////
class deans extends Connect
{
    function __construct()
    {
        parent:: __construct();
    }

    /***************
     * INDEX
     ***************/

    function indexteacher()
    {
        $sql = "SELECT * FROM teachers";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexupteacher($id)
    {
        $sql = "SELECT * FROM teachers WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexstudent()
    {
        $sql = "SELECT students.id as'id',classes.id as'id_cl', students.name as 'namest', students.id_class, students.birthday, students.address, students.phone, students.email, classes.name as 'namecl', students.sex FROM students,classes WHERE students.id_class=classes.id ";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexprogress()
    {
        $sql = "SELECT * FROM progress";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexupprogress($id)
    {
        $sql = "SELECT * FROM progress WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexupstudent($id)
    {
        $sql = "SELECT students.id as'id', students.name as 'namest', students.id_class as'id_cl', students.birthday, students.address, students.phone, students.email, classes.name as 'namecl', students.sex FROM students,classes WHERE students.id=$id AND students.id_class=classes.id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    
    }
    function indexclass()
    {
        $sql = "SELECT * FROM classes";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indextopic()
    {
        $sql = "SELECT * FROM topic";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexupclass($id)
    {
        $sql = "SELECT * FROM classes, students WHERE classes.id=students.id_class AND students.id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexproject()
    {
        $sql = "SELECT students.id as 'idsv', projects.id, projects.name as'namepr', projects.created_at,projects.endtime, teachers.name as 'namete', students.name as 'namest', topic.name as 'nameto' FROM projects, teachers, students, topic WHERE projects.id_student=students.id AND projects.id_teacher=teachers.id AND projects.id_topic=topic.id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function indexupproject($id)
    {
        $sql = "SELECT projects.id as'id', projects.name as'name', projects.created_at,projects.endtime, teachers.id as 'idte',teachers.name as 'namete', students.id as 'idst',students.name as 'namest', topic.id as 'idto',topic.name as 'nameto' FROM projects, teachers, students, topic WHERE projects.id_student=students.id AND projects.id_teacher=teachers.id AND projects.id_topic=topic.id AND projects.id=$id";
        $pre = $this->pdo->prepare($sql);
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
    function indexprogressdetail()
    {
        $sql = "SELECT DISTINCT id_project, (SELECT MAX(id_progress) FROM details) as id_progress FROM details";
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

    /***************
     * CREATE
     ***************/
    
    function createteacher($id,$name,$birthday,$address,$phone,$email)
    {
        $sql = "INSERT INTO teachers(id, name, birthday, address, phone, email) VALUES (:id,:name,:birthday,:address,:phone,:email)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birthday', $birthday);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':phone', $phone);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createaccteacher($id,$name,$birthday,$email)
    {
        $sql = "INSERT INTO login(id, user, pass, name, powerful) VALUES (:id,:email,:birthday,:name,'gv')";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birthday', $birthday);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createstudent($id,$name,$id_class,$birthday,$sex,$address,$phone,$email)
    {
        $sql = "INSERT INTO students(id, name, id_class, birthday, sex, address, phone, email) VALUES (:id,:name,:id_class,:birthday,:sex,:address,:phone,:email)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':id_class', $id_class);
        $pre->bindParam(':birthday', $birthday);
        $pre->bindParam(':sex', $sex);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':phone', $phone);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createaccstudent($id,$name,$birthday,$email)
    {
        $sql = "INSERT INTO login(id, user, pass, name, powerful) VALUES (:id,:email,:birthday,:name,'hs')";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birthday', $birthday);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createproject($id, $name, $id_topic, $id_student, $id_teacher, $created_at, $endtime)
    {
        $sql = "INSERT INTO projects (id, name, id_topic, id_student, id_teacher, created_at, endtime) VALUES (:id, :name, :id_topic, :id_student, :id_teacher, :created_at, :endtime)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':id_topic', $id_topic);
        $pre->bindParam(':id_student', $id_student);
        $pre->bindParam(':id_teacher', $id_teacher);
        $pre->bindParam(':created_at', $created_at);
        $pre->bindParam(':endtime', $endtime);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createdetailproject($id)
    {
        $sql = "INSERT INTO details(id_project, id_progress) VALUES (:id,'1'),(:id,'2'),(:id,'3'),(:id,'4'),(:id,'5'),(:id,'6');";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function createprogress($id,$title,$start,$end)
    {
        $sql = "INSERT INTO progress(id, title, start, end) VALUES (:id,:title,:start,:end)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':title', $title);
        $pre->bindParam(':start', $start);
        $pre->bindParam(':end', $end);
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

    /***************
     * CHECK
     ***************/
    
    function checkidteacher($id)
    {
        $sql = "SELECT id FROM teachers WHERE id=:id ";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function checkidstudent($id)
    {
        $sql = "SELECT id FROM students WHERE id=:id ";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function checkidproject($name)
    {
        $sql = "SELECT name FROM projects WHERE name=:name ";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function checkidprogress($name)
    {
        $sql = "SELECT name FROM progress WHERE name=:name ";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /***************
     * DESTROY
     ***************/
    
    function destroyteacher($id)
    {
        $sql = "DELETE FROM teachers WHERE id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function destroystudent($id)
    {
        $sql = "DELETE FROM students WHERE id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function destroyproject($id)
    {
        $sql = "DELETE FROM projects WHERE id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function destroydetail($id)
    {
        $sql = "DELETE FROM details WHERE id_project = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function destroyprogress($id)
    {
        $sql = "DELETE FROM progress WHERE id = $id";
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function destroyprogressdetail($id_project,$id_progress)
    {
        $sql = "DELETE FROM details WHERE id_project = $id_project AND id_progress = $id_progress";   
        $pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /***************
     * UPDATE
     ***************/
    
    function updateteacher($id,$name,$birthday,$address,$phone,$email)
    {
        $sql = "UPDATE teachers SET name=:name,birthday=:birthday,address=:address,phone=:phone,email=:email WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':birthday', $birthday);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':phone', $phone);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function updatestudent($id,$name,$id_class,$birthday,$sex,$address,$phone,$email)
    {
        $sql = "UPDATE students SET name=:name,birthday=:birthday,sex=:sex,address=:address,phone=:phone,email=:email,id_class=:id_class WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':id_class', $id_class);
        $pre->bindParam(':birthday', $birthday);
        $pre->bindParam(':sex', $sex);
        $pre->bindParam(':address', $address);
        $pre->bindParam(':phone', $phone);
        $pre->bindParam(':email', $email);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateproject($id,$name,$id_topic,$id_student,$id_teacher,$created_at,$endtime)
    {
        $sql = "UPDATE projects SET name=:name,id_topic=:id_topic,id_student=:id_student,id_teacher=:id_teacher,created_at=:created_at,endtime=:endtime WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':id_topic', $id_topic);
        $pre->bindParam(':id_student', $id_student);
        $pre->bindParam(':id_teacher', $id_teacher);
        $pre->bindParam(':created_at', $created_at);
        $pre->bindParam(':endtime', $endtime);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateprogress($id,$title,$start,$end)
    {
        $sql = "UPDATE progress SET title=:title,start=:start,end=:end WHERE id=$id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':title', $title);
        $pre->bindParam(':start', $start);
        $pre->bindParam(':end', $end);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    function updetail($status,$comment,$id_project,$id_progress)
    {
        $sql = "UPDATE details SET status = :status, comment = :comment WHERE details.id_project = :id_project AND details.id_progress = :id_progress";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':status', $status);
        $pre->bindParam(':comment', $comment);
        $pre->bindParam(':id_project', $id_project);
        $pre->bindParam(':id_progress', $id_progress);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>