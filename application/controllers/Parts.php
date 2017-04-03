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
class Parts extends Application
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('partsdata');
    }

    public function index()
    {
        // get user roles
        $user_role = $this->session->userdata('userrole');

        // only allow to worker
        if ($user_role == 'worker' || $user_role == 'boss' || $user_role == 'supervisor')
        {
            // Get all parts 
            $allParts = $this->partsdata->getAllParts();

            $this->generateTable($allParts);
        } else
        {
            $this->data['pagetitle'] = 'Parts List - Only Allow to Worker, Supervisor, Boss';
            $this->data['pagebody'] = 'blockedpage';
            $this->data['message'] = "<div></div>";
            $this->render();
        }
    }

    // generate table of parts
    public function generateTable($allParts)
    {
        $this->data['pagetitle'] = 'Parts List';
        $this->data['pagebody'] = 'partspage';
        $this->data['message'] = "<div></div>";

        $head_parts = array();
        $torso_parts = array();
        $legs_parts = array();

        // save parts by piece - head, torso, legs

        foreach ($allParts as $part)
        {
            switch ($part['piece'])
            {
                case '1':
                    $head_parts[] = array(
                        'id' => $part['id'],
                        'model' => $part['model'],
                        'piece' => $part['piece'],
                        'plant' => $part['plant'],
                        'stamp' => $part['stamp'],
                        'aquired_time' => date("Y-m-d H:i:s", time()),
                        'file_name' => $part['model'] . $part['piece'] . '.jpeg',
                        'href' => '/parts/' . $part['id']);
                    break;
                case '2':

                    $torso_parts[] = array(
                        'id' => $part['id'],
                        'model' => $part['model'],
                        'piece' => $part['piece'],
                        'plant' => $part['plant'],
                        'stamp' => $part['stamp'],
                        'aquired_time' => date("Y-m-d H:i:s", time()),
                        'file_name' => $part['model'] . $part['piece'] . '.jpeg',
                        'href' => '/parts/' . $part['id']);
                    break;

                case '3':
                    $legs_parts[] = array(
                        'id' => $part['id'],
                        'model' => $part['model'],
                        'piece' => $part['piece'],
                        'plant' => $part['plant'],
                        'stamp' => $part['stamp'],
                        'aquired_time' => date("Y-m-d H:i:s", time()),
                        'file_name' => $part['model'] . $part['piece'] . '.jpeg',
                        'href' => '/parts/' . $part['id']);
                    break;
            }
        }

        $this->data['head_parts'] = $head_parts;
        $this->data['torso_parts'] = $torso_parts;
        $this->data['legs_parts'] = $legs_parts;
        $this->render();
    }

    // get only single page - detail
    public function getSinglePage($id)
    {
        // load a page for details
        $this->data['pagebody'] = 'singlepage';

        // get single part
        $onePart = $this->partsdata->getSinglePart($id);

        // merge the records to data array
        $this->data = array_merge($this->data, (array) $onePart);

        $this->render();
    }

    // mybuild function
    public function getRandomParts()
    {
        $API_KEY = $this->managedata->getKey();

        if ($API_KEY == '000000')
        {
            $this->data['pagebody'] = 'blockedpage';
            $this->data['pagetitle'] = '<a class="text-danger">Please register first</a>';
            $this->render();
            return;
        }

        $json_parts = file_get_contents('https://umbrella.jlparry.com/work/mybuilds?key=' . $API_KEY);

        // decode json
        $random_parts = json_decode($json_parts, true);

        // create part array
        $random_parts_to_save = $this->createPartArray($random_parts);
        $history_parts_to_save = $this->createHistory($random_parts_to_save, 'Built parts', 0);

        // insert parts to db
        $this->partsdata->insertParts($random_parts_to_save);
        $this->historydata->insertPartsHistory($history_parts_to_save);

        redirect('/parts');
    }

    // buy box function
    public function buyParts()
    {
        $API_KEY = $this->managedata->getKey();

        if ($API_KEY == '000000')
        {
            $this->data['pagebody'] = 'blockedpage';
            $this->data['pagetitle'] = '<a class="text-danger">Please register first</a>';
            $this->render();
            return;
        }

        $json_parts = file_get_contents('https://umbrella.jlparry.com/work/buybox?key=' . $API_KEY);

        // decode json
        $buy_parts = json_decode($json_parts, true);
        // create part array
        $buy_parts_to_save = $this->createPartArray($buy_parts);
        $history_parts_to_save = $this->createHistory($buy_parts_to_save, 'Buy', 100);

        // insert parts to db
        $this->partsdata->insertParts($buy_parts_to_save);
        $this->historydata->insertPartsHistory($history_parts_to_save);

        redirect('/parts');
    }

    private function createHistory($array, $action, $amount)
    {
        $temp_array = array();

        $num_of_parts = count($array);

        $sequence = '';
        $models = '';
        foreach ($array as $part)
        {
            $sequence .= $part['id'] . ' ';
            $models .= $part['model'] . $part['piece'] . ' ';
        }

        $temp_array[] = array(
            'action' => $action,
            'amount' => $amount,
            'quantity' => $num_of_parts,
            'plant' => $part['plant'],
            'model' => $models,
            'seq' => $sequence,
            'stamp' => $part['stamp']
        );

        return $temp_array;
    }

    // create part array 
    private function createPartArray($array)
    {
        $temp_array = array();

        foreach ($array as $part)
        {
            $temp_array[] = array(
                'id' => $part['id'],
                'model' => $part['model'],
                'piece' => $part['piece'],
                'plant' => $part['plant'],
                'stamp' => $part['stamp'],
                'aquired_time' => date("Y-m-d H:i:s", time()),
                'file_name' => $part['model'] . $part['piece'] . '.jpeg',
                'href' => '/parts/' . $part['id']);
        }

        return $temp_array;
    }

}
