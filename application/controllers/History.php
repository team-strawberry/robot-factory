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
class History extends Application {

    // construct function
    function __construct() {
        parent::__construct();
    }

    // index function
    public function index() {
        $this->data['pagebody'] = 'historypage';

        // gets all the history data
        $source = $this->historydata->getAllHistories();
        $history = array();

        // a record with an array of five data
        foreach ($source as $record) {
            $history[] = array('model' => $record['model'],
                'transaction' => $record['transaction'],
                'price' => $record['price'],
                'date' => $record['date'],
                'time' => $record['time']);
        }
        $this->data['transaction'] = $history;
        $this->render();
    }

}
