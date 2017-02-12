<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
class Parts extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['pagebody'] = 'partspage';

        $allParts = $this->partsdata->getAllParts();

        foreach ($allParts as $part) {
            $cells[] = $this->parser->parse('_cell', (array) $part, true);
        }

        $this->load->library('table');

        $robot_array = array(
            'table_open' => '<table class="table-bordered">',
            'heading_cell_start' => '<th class="text-danger header-size">',
        );

        $this->table->set_heading('Head Parts', 'Torso Parts', 'Leg Parts');
        $this->table->set_template($robot_array);

        $rows = $this->table->make_columns($cells, 3);

        $this->data['parts_table'] = $this->table->generate($rows);

        $this->render();
    }

    public function getone($id) {
        // load a page for details
        $this->data['pagebody'] = 'singlepage';

        $record = $this->partsdata->getPart($id);

        // merge the records to data array
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}
