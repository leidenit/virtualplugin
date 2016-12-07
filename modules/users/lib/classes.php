<!-- User class -->
<?php

class UserClass
{
    // объявление свойства
    public $fname, $lname, $vid, $dbdescriptor;
    private $pdo;

    public function __construct($firstname, $lastname, $systemid, $dbobject)
    {
        $this->fname = $firstname;
        $this->lname = $lastname;
        $this->vid = $systemid;
        $this->pdo = $dbobject;
        $this->CheckUserBd();
    }

    private function CheckUserBd()
    {
        $stmt = $this->pdo->query("SELECT * FROM user WHERE id='$this->vid'");
        $data = $stmt->fetchAll();
        $today = date_create()->format('Y-m-d');
        if (sizeof($data) != 0) {
            $this->dbdescriptor = $data[0];
            $stmt = $this->pdo->query("UPDATE user SET ldate='$today' WHERE id='$this->vid'");
            int_notify('Вы уже есть в базе. Ваше данные подгрузились!', 'pe-7s-check');
        } else {
            $stmt = $this->pdo->query("INSERT INTO user (id,firstname,lastname,fdate,ldate) VALUES('$this->vid','$this->fname','$this->lname ','$today','$today')");
            int_notify('Вас не было в базе, но система вас занесла!', 'pe-7s-hourglass');
        }
    }

    public function create_vm($lab_id, $vm_name)
    {
        $stmt = $this->pdo->query("INSERT INTO vm (user_id,name,lab_id) VALUES('$this->vid','$vm_name','$lab_id')");
    }

    public function check_vm($lab_id)
    {
        $descr = $this->dbdescriptor;
        $d_id = $descr["Id"];
        $stmt = $this->pdo->query("SELECT * FROM vm WHERE user_id = '$d_id' AND lab_id = '$lab_id'");
        $res = $stmt->fetchAll();
        return $res;
    }

    public function get_all_vm()
    {
        $descr = $this->dbdescriptor;
        $d_id = $descr["Id"];
        $stmt = $this->pdo->query("SELECT * FROM vm WHERE user_id = '$d_id'");
        $res = $stmt->fetchAll();
        return $res;
    }

    public function get_vm_lesson_list($lab_id)
    {
        $descr = $this->dbdescriptor;
        $d_id = $descr["Id"];
        $stmt = $this->pdo->query("SELECT * FROM vm WHERE user_id = '$d_id' AND lab_id = '$lab_id'");
        $res = $stmt->fetchAll();
        return $res;
    }
};

?>