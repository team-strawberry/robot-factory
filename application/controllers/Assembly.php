<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Assembly
 *
 * @author Nick
 */
// A page for robot assembly, providing different parts to mix and match.
class Assembly extends Application
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('partsdata');
        $this->load->model('historydata');
    }

    public function index()
    {
        // get user roles
        $user_role = $this->session->userdata('userrole');

        // only allow to boss and supervisor
        if ($user_role == 'boss' || $user_role == 'supervisor')
        {
            $allParts = $this->partsdata->getAllSortedParts();
            $this->generateTable($allParts);
        } else
        {
            $this->data['pagetitle'] = 'Assemble Robot - Boss, Supervisor';
            $this->data['pagebody'] = 'blockedpage';
            $this->data['message'] = '';
            $this->render();
        }
    }

    public function assembleBots()
    {
        // get parts data
        $head = $this->input->post('head');
        $torso = $this->input->post('torso');
        $legs = $this->input->post('legs');

        // check parts data if one of them is null 
        if ($head == NULL || $torso == NULL || $legs == NULL)
        {
            $this->data['pagebody'] = 'assemblypage';
            $this->data['message'] = 'Please pick each part once';
            redirect('/assembly');
        }

        $tempHead = explode('-', $head);
        $tempTorso = explode('-', $torso);
        $tempLegs = explode('-', $legs);

        $headModel = $tempHead[0];
        $torsoModel = $tempTorso[0];
        $legsModel = $tempLegs[0];

        $headId = $tempHead[1];
        $torsoId = $tempTorso[1];
        $legsId = $tempLegs[1];

        $newRobot = array(
            'head' => $headId,
            'torso' => $torsoId,
            'legs' => $legsId,
            'headModel' => $headModel,
            'torsoModel' => $torsoModel,
            'legsModel' => $legsModel,
        );

        // delete the data from parts
        $this->partsdata->deletePartById($headId);
        $this->partsdata->deletePartById($torsoId);
        $this->partsdata->deletePartById($legsId);

        if ($this->input->post('assemble') == 'Assemble')
        {
            //create a robot
            $this->robotsdata->createBot($newRobot);
            // create history
            $assembledRobot = $this->createHistory($newRobot, 'Assemble', 0);

            // insert parts to history
            $this->historydata->insertPartsHistory($assembledRobot);
            
        } else if ($this->input->post('assemble') == 'Return')
        {

            $API_KEY = $this->managedata->getKey();

            // check key validation
            if ($API_KEY == '000000')
            {
                $this->data['pagebody'] = 'blockedpage';
                $this->data['pagetitle'] = '<a class="text-danger">Please register first</a>';
                $this->render();
                return;
            }

            $response = file_get_contents("https://umbrella.jlparry.com/work/recycle/$headId/$torsoId/$legsId?key=" . $API_KEY);

            $responseArray = explode(" ", $response);
            // get money earn from PRC
            $earned = $responseArray[1];

            // if returns 'ok'
            if ($responseArray[0] == 'Ok')
            {
                // create history
                $return_robots = $this->createHistory($newRobot, 'Return', $earned);
                $this->historydata->insertPartsHistory($return_robots);
            }
        }

        redirect('/assembly');
    }

    // create history data
    private function createHistory($part, $action, $amount)
    {
        $temp_array = array();

        // get num of parts
        $num_of_parts = count($part);

        $sequence = '';
        $models = '';

        // get names
        $sequence .= $part['head'] . ' ' . $part['torso'] . ' ' . $part['legs'];
        $models .= $part['headModel'] . ' ' . $part['torsoModel'] . ' ' . $part['legsModel'];

        $temp_array[] = array(
            'action' => $action,
            'amount' => $amount,
            'quantity' => $num_of_parts,
            'plant' => 'strawberry',
            'model' => $models,
            'seq' => $sequence,
            'stamp' => date("Y-m-d H:i:s", time()),
        );

        return $temp_array;
    }

    // generate table of parts
    public function generateTable($allParts)
    {
        $this->data['pagetitle'] = 'Assemble Robot';
        $this->data['pagebody'] = 'assemblypage';
        $this->data['message'] = 'Please pick each part once';

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

}
