<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Robotsdata
 *
 * @author Jake
 */
class Robotsdata extends CI_Model
{

    // Constructor    
    public function __construct()
    {
        parent::__construct();
    }

    // retrieve all of bots
    public function getAllBots()
    {
        return $this->bots;
    }

    // get all robots
    public function getAllBotsAsArray()
    {
        return $this->db->get('assembledbots')->result_array();
    }

    // retrieve a single bot
    public function getBot($which)
    {
        // iterate over the data until we find the one we want
        foreach ($this->db->get('assembledbots')->result_array() as $record)
        {
            if ($record['id'] == $which)
            {

                return $record;
            }
        }
        return null;
    }

    // get size of rows
    function size()
    {
        $query = $this->db->get('assembledbots');
        return $query->num_rows();
    }

    // insert robot data to db
    public function createBot($data)
    {
        $this->db->insert('assembledbots', $data);
    }

    // Returns an ID number by adding 1 to the current number of rows.
    public function getIdNum()
    {
        $botRowCount = $this->db->count_all('assembledbots');
        $idNum = $botRowCount + 1;
        return $idNum;
    }

    // update history
    public function updateHistory($data2)
    {
        $this->db->insert('historydata', $data2);
    }

    // delete robot by id
    public function deleteRobotById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('assembledbots');
    }

    // for the reboot function
    public function deleteAll()
    {
        $this->db->empty_table('assembledbots');
    }

}
