
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postform extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->fields = ['FirstName','LastName','City','ContactNumber','Email'];
        $this->table = "signupdb_data";
    }

    function fetch_user(){
        $query = $this->db->get($this->table);
        if($query->num_rows()){
            return $query->result_array();   
        }
    }

    function insert_user($params=[]){
        $this->db->insert($this->table, $this->trackFields($params));
    }

    function update(){
        die("hi komal");
    }
    function delete(){
        die("hi komal");
    }
    
    function trackFields ($params){
        $data = [];
        foreach($params as $pKey => $pVal){
            if(in_array($pKey, $this->fields)){
                $data[$pKey] = $pVal;
            }
        }
        return $data;
    }
}