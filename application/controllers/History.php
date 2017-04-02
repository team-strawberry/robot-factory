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
class History extends Application
{

    private $items_per_page = 20;

    // construct function
    function __construct()
    {
        parent::__construct();
        $this->load->model('historydata');
    }

    // index function
    public function index()
    {
        $this->page(1);
    }
	
	

    // Show a single page of transactions
    private function showPage($histories)
    {

        // get user roles
        $user_role = $this->session->userdata('userrole');

        // only allow to worker
        if ($user_role == 'boss' || $user_role == 'supervisor')
        {
            // build the transaction presentation output
            $temp_array = array(); // start with an empty array
            foreach ($histories as $history)
            {
                $temp_array[] = array(
                    'id' => $history['id'],
                    'action' => $history['action'],
                    'seq' => $history['seq'],
                    //'model' => $history['model'],
                    'amount' => $history['amount'],
                    'plant' => $history['plant'],
                    'stamp' => $history['stamp']);
            }
            $this->data['transaction'] = $temp_array;
            $this->data['pagetitle'] = 'History';
            $this->data['pagebody'] = 'historypage';
        } else
        {
            $this->data['pagetitle'] = 'History - Only Allow to Boss, Supervisor';
            $this->data['pagebody'] = 'blockedpage';
            $this->data['message'] = '';
        }
        $this->render();
    }

    // Extract & handle a page of items, defaulting to the beginning    
    public function page($num = 1, $order = NULL)
    {
        switch ($order)
        {
            case 'dateDesc':
                $histories = $this->historydata->sortByDate($order);
                break;
            case 'dateAsc':
                $histories = $this->historydata->sortByDate($order);
                break;
            case 'modelDesc':
                $histories = $this->historydata->sortByModel($order);
                break;
            case 'modelAsc':
                $histories = $this->historydata->sortByModel($order);
                break;
            default :
                $histories = $this->historydata->getAllTransaction();
                break;
        }

        $transactions = array();

        $index = 0;
        $count = 0;
        $start = ($num - 1) * $this->items_per_page;
        foreach ($histories as $history)
        {
            if ($index++ >= $start)
            {
                $transactions[] = $history;
                $count++;
            }
            if ($count >= $this->items_per_page)
            {
                break;
            }
        }
        $this->data['pagination'] = $this->pagenav($num);

        $this->showPage($transactions);
    }

    // Build the pagination navbar    
    private function pagenav($num)
    {
        $lastpage = ceil($this->historydata->size() / $this->items_per_page);
        $parms = array(
            'first' => 1,
            'previous' => (max($num - 1, 1)),
            'next' => min($num + 1, $lastpage),
            'last' => $lastpage
        );
        return $this->parser->parse('historynav', $parms, true);
    }

}
