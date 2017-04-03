<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parts
 *
 * @author Jake
 */
class Partsdata extends CI_Model
{

    // Constructor    
    public function __construct()
    {
        parent::__construct('partsdata', 'id');
    }

    // retrieve all of the parts from db
    public function getAllParts()
    {
        return $this->db->get('partsdata')->result_array();
    }

    // get sorted parts by asc
    public function getAllSortedParts()
    {
        $this->db->select('*');
        $this->db->from('partsdata');
        $this->db->order_by('model', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    // retrieve a single part
    public function getSinglePart($which)
    {
        $all_parts = $this->getAllParts();

        // iterate over the data until we find the one we want
        foreach ($all_parts as $one_part)
        {
            if ($one_part['id'] == $which)
            {
                return $one_part;
            }
        }
        return null;
    }

    // insert parts to db
    public function insertParts($parts)
    {
        $this->db->insert_batch('partsdata', $parts);
    }

    // get part by piece - head, torso, legs
    public function getPartsByPiece($piece)
    {
        $this->db->select('*')->from('partsdata');
        $this->db->where('piece', $piece);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get a part by id
    public function getPartById($id)
    {
        $this->db->select('*')->from('partsdata');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    // delete a part by id
    public function deletePartById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('partsdata');
    }

    // get parts by file name
    public function getPartByFile($filename)
    {
        $this->db->select('*')->from('partsdata');
        $this->db->where('file_name', $filename);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get parts by model and piece
    public function getParts($model, $piece)
    {
        $this->db->select('*')->from('partsdata');
        $this->db->where('model', $model);
        $this->db->where('piece', $piece);
        $query = $this->db->get();
        return $query->result_array();
    }

    // for the reboot function
    public function deleteAll()
    {
        $this->db->empty_table('partsdata');
    }

}
