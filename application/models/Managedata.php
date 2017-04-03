<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Managedata
 *
 * @author Jake
 */
class Managedata extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // get api key
    public function getKey()
    {
        $this->db->where('id', 0);
        $data = $this->db->get('apikeydata');
        $array = $data->result_array();
        return $array[0]['keyvalue'];
    }

    // update api key
    public function updateKey($apikey)
    {
        $this->db->empty_table('apikeydata');
        $sql = 'INSERT INTO apikeydata (id, keyvalue) VALUES(?,?);';
        $query = $this->db->query($sql, array(0, $apikey));
    }

    // reset api key
    public function resetKey()
    {
        $this->db->empty_table('apikeydata');
        $sql = 'INSERT INTO apikeydata (id, keyvalue) VALUES(?,?);';
        $query = $this->db->query($sql, array(0, '000000'));
    }

}
