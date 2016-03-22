<?php
    include_once "Database.class.php";
    class Donations{

    /*start variables
    $user_id;
    $aid_id;
    $donation;
    $confirmation;
    $source_address;
    end variables*/

    /*primarykey
    $id;
    primarykey*/

    function  __construct()
     {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
     }

    function deleteDonations($id)
     {
        $query = "DELETE FROM donations WHERE id = '".addslashes(intval($id))."'";
        $this->db->query($query);
     }

    function insertDonations($user_id ,$aid_id ,$donation ,$confirmation ,$source_address)
     {
        $data["user_id"] = $user_id;
        $data["aid_id"] = $aid_id;
        $data["donation"] = $donation;
        $data["confirmation"] = $confirmation;
        $data["source_address"] = $source_address;

        $primary_id = $this->db->query_insert("donations", $data);
     }

    function updateDonations($id, $user_id ,$aid_id ,$donation ,$confirmation ,$source_address)
     {
        $data["user_id"] = $user_id;
        $data["aid_id"] = $aid_id;
        $data["donation"] = $donation;
        $data["confirmation"] = $confirmation;
        $data["source_address"] = $source_address;

        $this->db->query_update("donations", $data, "id = $id");
     }

    function getDonations()
     {
        $results = array();
        $query = "SELECT * FROM donations order by id desc";

        $rows = $this->db->query($query);

        while ($record = $this->db->fetch_array($rows)) {
            $results[] = $record["id"] . "#" .$record["user_id"] . "#" . $record["aid_id"] . "#" . $record["donation"] . "#" . $record["confirmation"] . "#" . $record["source_address"];
        }

        return $results;
     }

         function getDonationsByID($id)
     {
        $query = "SELECT * FROM donations where id = '".addslashes(intval($id))."'";

        $record = $this->db->query_first($query);

        return $record["id"] . "#" .$record["user_id"] . "#" . $record["aid_id"] . "#" . $record["donation"] . "#" . $record["confirmation"] . "#" . $record["source_address"];
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