<?php
    include_once "Database.class.php";
    class User_table{

    /*start variables
    $uname;
    $password;
    $e_mail;
    $name;
    $surname;
    $score;
    $favorites;
    $aid_started_by_user;
    $aid_attended_by_user;
    end variables*/

    /*primarykey
    $id;
    primarykey*/

    function  __construct()
     {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
     }

    function deleteUser_table($id)
     {
        $query = "DELETE FROM user_table WHERE id = '".addslashes(intval($id))."'";
        $this->db->query($query);
     }

    function insertUser_table($uname ,$password ,$e_mail ,$name ,$surname ,$score ,$favorites ,$aid_started_by_user ,$aid_attended_by_user)
     {
        $data["uname"] = $uname;
        $data["password"] = $password;
        $data["e_mail"] = $e_mail;
        $data["name"] = $name;
        $data["surname"] = $surname;
        $data["score"] = $score;
        $data["favorites"] = $favorites;
        $data["aid_started_by_user"] = $aid_started_by_user;
        $data["aid_attended_by_user"] = $aid_attended_by_user;

        $primary_id = $this->db->query_insert("user_table", $data);
     }

    function updateUser_table($id, $uname ,$password ,$e_mail ,$name ,$surname)
     {
        $data["uname"] = $uname;
        $data["password"] = $password;
        $data["e_mail"] = $e_mail;
        $data["name"] = $name;
        $data["surname"] = $surname;
        /*$data["score"] = $score;
        $data["favorites"] = $favorites;
        $data["aid_started_by_user"] = $aid_started_by_user;
        $data["aid_attended_by_user"] = $aid_attended_by_user;*/

        $this->db->query_update("user_table", $data, "id = $id");
     }

    function updateUser_tableCampaigns($id, $aid_started_by_user, $aid_attended_by_user)
     {
        $data["aid_started_by_user"] = $aid_started_by_user;
        $data["aid_attended_by_user"] = $aid_attended_by_user;

        $this->db->query_update("user_table", $data, "id = $id");
     }

    function getUser_table()
     {
        $results = array();
        $query = "SELECT * FROM user_table order by id desc";

        $rows = $this->db->query($query);

        while ($record = $this->db->fetch_array($rows)) {
            $results[] = $record["id"] . "#" .$record["uname"] . "#" . $record["password"] . "#" . $record["e_mail"] . "#" . $record["name"] . "#" . $record["surname"] . "#" . $record["score"] . "#" . $record["favorites"] . "#" . $record["aid_started_by_user"] . "#" . $record["aid_attended_by_user"];
        }

        return $results;
     }

         function getUser_tableByID($id)
     {
        $query = "SELECT * FROM user_table where id = '".addslashes(intval($id))."'";

        $record = $this->db->query_first($query);

        return $record["id"] . "#" .$record["uname"] . "#" . $record["password"] . "#" . $record["e_mail"] . "#" . $record["name"] . "#" . $record["surname"] . "#" . $record["score"] . "#" . $record["favorites"] . "#" . $record["aid_started_by_user"] . "#" . $record["aid_attended_by_user"];
     }
    function getUserByUname($username,$password)
     {
        $query = "SELECT * FROM user_table WHERE uname= '".addslashes($username)."' AND password= '".addslashes($password)."'";

        $record = $this->db->query_first($query);

        return $record;
     }
     function checkMail($mail)
     {
        $query = "SELECT * FROM user_table WHERE `e-mail`= '".$mail."'";

        $record = $this->db->query_first($query);

        return $record;
     }

    function closeDB()
     {
        $this->db->close();
     }

    function openDB()
     {
        $this->db->connect();
     }
}
?>