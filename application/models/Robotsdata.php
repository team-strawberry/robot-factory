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
class Robotsdata extends CI_Model {

    var $bots = array(
        array('id' => '19',
            'name' => 'robot A',
            'fileName' => 'a.jpg'),
        array('id' => '20',
            'name' => 'robot B',
            'fileName' => 'b.jpg'),
        array('id' => '21',
            'name' => 'robot C',
            'fileName' => 'c.jpg'),
        array('id' => '22',
            'name' => 'robot M',
            'fileName' => 'm.jpg'),
        array('id' => '23',
            'name' => 'robot R',
            'fileName' => 'r.jpg'),
        array('id' => '24',
            'name' => 'robot W',
            'fileName' => 'w.jpg')
    );

    // Constructor    
    public function __construct() {
        parent::__construct();
    }

    // retrieve all of bots
    public function getAllBots() {
        return $this->bots;
    }

    // retrieve a single bot
    public function getBot($which) {

        // iterate over the data until we find the one we want
        foreach ($this->bots as $record) {
            if ($record['id'] == $which) {
                return $record;
            }
        }
        return null;
    }

}
