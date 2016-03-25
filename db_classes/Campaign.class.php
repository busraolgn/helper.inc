<?php
    include_once "Database.class.php";
    class Campaign{

    /*start variables
    $user_id;
    $aid_name;
    $aid_comment;
    $start_date;
    $end_date;
    $fav_count;
    $city;
    $district;
    $neigborhood;
    $address;
    $tags;
    $aid_img;
    end variables*/

    /*primarykey
    $id;
    primarykey*/

    function  __construct()
     {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
     }

    function deleteCampaign($id)
     {
        $query = "DELETE FROM campaign WHERE id = '".addslashes(intval($id))."'";
        $this->db->query($query);
     }

    function insertCampaign($user_id ,$aid_name ,$aid_comment ,$start_date ,$end_date ,$fav_count ,$city ,$district ,$neigborhood ,$address ,$tags, $main_category_tags, $sub_category_tags ,$aid_img)
     {
        $data["user_id"] = $user_id;
        $data["aid_name"] = $aid_name;
        $data["aid_comment"] = $aid_comment;
        $data["start_date"] = $start_date;
        $data["end_date"] = $end_date;
        $data["fav_count"] = $fav_count;
        $data["city"] = $city;
        $data["district"] = $district;
        $data["neigborhood"] = $neigborhood;
        $data["address"] = $address;
        $data["tags"] = $tags;
        $data["main_category_tags"] = $main_category_tags;
        $data["sub_category_tags"] = $sub_category_tags;
        $data["aid_img"] = $aid_img;

        $primary_id = $this->db->query_insert("campaign", $data);
     }

    function updateCampaign($id, $user_id ,$aid_name ,$aid_comment ,$start_date ,$end_date ,$fav_count ,$city ,$district ,$neigborhood ,$address ,$tags, $main_category_tags, $sub_category_tags ,$aid_img)
     {
        $data["user_id"] = $user_id;
        $data["aid_name"] = $aid_name;
        $data["aid_comment"] = $aid_comment;
        $data["start_date"] = $start_date;
        $data["end_date"] = $end_date;
        $data["fav_count"] = $fav_count;
        $data["city"] = $city;
        $data["district"] = $district;
        $data["neigborhood"] = $neigborhood;
        $data["address"] = $address;
        $data["tags"] = $tags;
        $data["main_category_tags"] = $main_category_tags;
        $data["sub_category_tags"] = $sub_category_tags;
        $data["aid_img"] = $aid_img;

        $this->db->query_update("campaign", $data, "id = $id");
     }

    function getCampaign()
     {
        $results = array();
        $query = "SELECT * FROM campaign order by id asc";

        $rows = $this->db->query($query);

        while ($record = $this->db->fetch_array($rows)) {
            $results[] = $record;
        }

        return $results;
     }

     function getCampaignByID($id)
     {
        $query = "SELECT * FROM campaign where id = '".addslashes(intval($id))."'";

        $record = $this->db->query_first($query);

        return $record;
     }
     function getCampaignByUserID($id)
     {
        $query = "SELECT * FROM campaign where user_id = '".addslashes(intval($id))."'";
        $rows = $this->db->query($query);
        $results=[];
        while ($record = $this->db->fetch_array($rows)) {
            $results[] = $record;
        }
        return $results;
     }
     function getCampaignCitiesDistinct()
     {
        $query = "SELECT DISTINCT city FROM campaign";
        $rows = $this->db->query($query);
        $cities = [];
        while ($record = $this->db->fetch_array($rows)) {
            $cities[] = $record;
        }
        return $cities; 
     }
     function getCampaignByCity($city){
        $query = "SELECT * FROM campaign where city = '".addslashes($city)."'";
        $rows = $this->db->query($query);
        $results=[];
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