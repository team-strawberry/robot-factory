<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $this->data['pagebody'] = 'homepage';

        // build the list of authors, to pass on to our view
        $source = $this->historydata->getAllSummary();
        $info = array();
        foreach ($source as $record) {
            $info[] = array('numBots' => $record['numBots'], 'numParts' => $record['numParts'], 'monSpent' => $record['monSpent'], 'monEarned' => $record['monEarned']);
        }
        $this->data['numbers'] = $info;

        $this->render();
    }

}
