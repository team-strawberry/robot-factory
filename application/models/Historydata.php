<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of History
 *
 * @author Michael/Karan
 */
class Historydata extends MY_Model
{

    // constructor    
    public function __construct()
    {
        parent::__construct('historydata', 'id');
    }

    // retrieves all of summary
    public function getAllTransaction()
    {
        return $this->db->get('historydata')->result_array();
    }

    // retrieve a specific transaction
    public function getTransaction($which)
    {
        // iterate over data until a specific one is found
        foreach ($this->data as $record)
            if ($record['transaction'] == $which)
                return $record;
            
        return null;
    }

    // insert parts to db
    public function insertPartsHistory($history)
    {
        $this->db->insert_batch('historydata', $history);
    }

    public function sortByDate($order)
    {
        $temp = '';
        if (strcmp($order, 'dateDesc') == 0)
        {
            $temp = 'desc';
        } elseif (strcmp($order, 'dateAsc') == 0)
        {
            $temp = 'asc';
        }

        $this->db->select('*');
        $this->db->from('historydata');
        $this->db->order_by('stamp', $temp);
        $query = $this->db->get();
        return $query->result_array();
    }

  public function sortByModel($order)
    {
        $temp = '';
        if (strcmp($order, 'modelDesc') == 0)
        {
            $temp = 'desc';
        } elseif (strcmp($order, 'modelAsc') == 0)
        {
            $temp = 'asc';
        }

        $this->db->select('*');
        $this->db->from('historydata');
        $this->db->order_by('model', $temp);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function filterByModel($model)
    {
        $temp = '';
        switch ($model){
            case 'modelA':
                $temp = '%a%';
                break;
            case 'modelB':
                $temp = '%b%';
                break;
            case 'modelC':
                $temp = '%c%';
                break;
            case 'modelM':
                $temp = '%m%';
                break;
            case 'modelR':
                $temp = '%r%';
                break;
            case 'modelW':
                $temp = '%w%';
                break;         
        }
        $sql = 'SELECT * FROM historydata WHERE model LIKE ?;';  
        $query = $this->db->query($sql, $temp);
        return $query->result_array();
    }

    public function deleteAll()
    {
        $this->db->empty_table('historydata');
    }

}
