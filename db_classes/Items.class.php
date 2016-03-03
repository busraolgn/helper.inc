<?php
    include_once "Database.class.php";
    class Items{

    /*start variables
    $aid_id;
    $type;
    $item_name;
    $fill_rate;
    $needed;
    $provided;
    end variables*/

    /*primarykey
    $id;
    primarykey*/

    function  __construct()
     {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
     }

    function deleteItems($id)
     {
        $query = "DELETE FROM items WHERE id = '".addslashes(intval($id))."'";
        $this->db->query($query);
     }

    function insertItems($aid_id ,$type ,$item_name ,$fill_rate ,$needed ,$provided)
     {
        $data["aid_id"] = $aid_id;
        $data["type"] = $type;
        $data["item_name"] = $item_name;
        $data["fill_rate"] = $fill_rate;
        $data["needed"] = $needed;
        $data["provided"] = $provided;

        $primary_id = $this->db->query_insert("items", $data);
     }

    function updateItems($id, $aid_id ,$type ,$item_name ,$fill_rate ,$needed ,$provided)
     {
        $data["aid_id"] = $aid_id;
        $data["type"] = $type;
        $data["item_name"] = $item_name;
        $data["fill_rate"] = $fill_rate;
        $data["needed"] = $needed;
        $data["provided"] = $provided;

        $this->db->query_update("items", $data, "id = $id");
     }

    function getItems()
     {
        $results = array();
        $query = "SELECT * FROM items order by id desc";

        $rows = $this->db->query($query);

        while ($record = $this->db->fetch_array($rows)) {
            $results[] = $record["id"] . "#" .$record["aid_id"] . "#" . $record["type"] . "#" . $record["item_name"] . "#" . $record["fill_rate"] . "#" . $record["needed"] . "#" . $record["provided"];
        }

        return $results;
     }

         function getItemsByID($id)
     {
        $query = "SELECT * FROM items where id = '".addslashes(intval($id))."'";

        $record = $this->db->query_first($query);

        return $record["id"] . "#" .$record["aid_id"] . "#" . $record["type"] . "#" . $record["item_name"] . "#" . $record["fill_rate"] . "#" . $record["needed"] . "#" . $record["provided"];
     }

      function getItemsByAidID($id)
     {
        $query = "SELECT * FROM items where aid_id = '".addslashes(intval($id))."'";

        $rows = $this->db->query($query);
        $results=null;
        while ($record = $this->db->fetch_array($rows)) {
            $results[] = $record;
        }

        return $results;
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