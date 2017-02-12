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
class Historydata extends CI_Model {

    // an array that holds fake data
    var $data = array(
        array('model' => 'robot A',
            'transaction' => 'purchased',
            'price' => '$100',
            'date' => '01/04/2017',
            'time' => '07:23:23'),
        array('model' => 'robot B',
            'transaction' => 'sold',
            'price' => '$25',
            'date' => '05/24/2016',
            'time' => '12:44:15'),
        array('model' => 'robot C',
            'transaction' => 'purchased',
            'price' => '$75',
            'date' => '09/01/2016',
            'time' => '17:19:59'),
        array('model' => 'robot D',
            'transaction' => 'sold',
            'price' => '$50',
            'date' => '02/20/2016',
            'time' => '20:44:51'),
        array('model' => 'robot E',
            'transaction' => 'sold',
            'price' => '$25',
            'date' => '02/09/2016',
            'time' => '11:11:11'),
        array('model' => 'robot F',
            'transaction' => 'purchased',
            'price' => '$50',
            'date' => '01/15/2017',
            'time' => '23:19:51')
    );
    var $summary = array(
        array('numBots' => '19',
            'numParts' => '40',
            'monSpent' => '$40000',
            'monEarned' => '$100000'),
    );

    // constructor    
    public function __construct() {
        parent::__construct();
    }

    // retrieves all of summary
    public function getAllSummary() {
        return $this->summary;
    }

    // retrieves all of transactions
    public function getAllHistories() {
        return $this->data;
    }

    // retrieves a specific model
    public function getModel($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['model'] == $which)
                return $record;
        return null;
    }

    // retrieve a specific transaction
    public function getTransaction($which) {
        // iterate over data until a specific one is found
        foreach ($this->data as $record)
            if ($record['transaction'] == $which)
                return $record;


        return null;
    }

    // retrieves a specific price
    public function getPrice($which) {
        // iterate over data until a specific one is found
        foreach ($this->data as $record)
            if ($record['price'] == $which)
                return $record;


        return null;
    }

    // retrieves a specific date
    public function getDate($which) {
        // iterate over data until a specific one is found
        foreach ($this->data as $record)
            if ($record['date'] == $which)
                return $record;


        return null;
    }

    // retrieves a specific time
    public function getTime($which) {
        // iterate over data until a specific one is found
        foreach ($this->data as $record)
            if ($record['time'] == $which)
                return $record;


        return null;
    }

}
