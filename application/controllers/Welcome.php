<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('robotsdata');
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
    public function index()
    {

        $this->data['pagebody'] = 'homepage';

        // build the list of authors, to pass on to our view
        $source = $this->robotsdata->getAllBotsAsArray();
        $partsOnHand = $this->partsdata->getAllParts();
        $transactions = $this->historydata->getAllTransaction();
        $bought = 0;
        $sold = 0;
        foreach ($transactions as $transaction)
        {
            if ($transaction['action'] == "Sell" || $transaction['action'] == "sell")
            {
                $sold+=$transaction['amount'];
            }
            if ($transaction['action'] == "Buy" || $transaction['action'] == "buy")
            {
                $bought+=$transaction['amount'];
            }
        }
        $info = array();

        $info[] = array('numBots' => count($source), 'numParts' => count($partsOnHand), 'monSpent' => $bought, 'monEarned' => $sold);

        $this->data['numbers'] = $info;

        $this->render();
    }

}
