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
        $allParts = $this->partsdata->getAllParts();

        $this->generateTable($allParts);
        /*
          error_reporting(0);
          // Retrieves the file names for each part in the Robots model.
          $this->data['head1'] = $this->partsdata->getParts('a', 1)[0]['file_name'];
          $this->data['body1'] = $this->partsdata->getParts('a', 2)[0]['file_name'];
          $this->data['feet1'] = $this->partsdata->getParts('a', 3)[0]['file_name'];

          $this->data['head2'] = $this->partsdata->getParts('b', 1)[0]['file_name'];
          $this->data['body2'] = $this->partsdata->getParts('b', 2)[0]['file_name'];
          $this->data['feet2'] = $this->partsdata->getParts('b', 3)[0]['file_name'];

          $this->data['head3'] = $this->partsdata->getParts('c', 1)[0]['file_name'];
          $this->data['body3'] = $this->partsdata->getParts('c', 2)[0]['file_name'];
          $this->data['feet3'] = $this->partsdata->getParts('c', 3)[0]['file_name'];

          $this->data['head4'] = $this->partsdata->getParts('m', 1)[0]['file_name'];
          $this->data['body4'] = $this->partsdata->getParts('m', 2)[0]['file_name'];
          $this->data['feet4'] = $this->partsdata->getParts('m', 3)[0]['file_name'];

          $this->data['head5'] = $this->partsdata->getParts('r', 1)[0]['file_name'];
          $this->data['body5'] = $this->partsdata->getParts('r', 2)[0]['file_name'];
          $this->data['feet5'] = $this->partsdata->getParts('r', 3)[0]['file_name'];

          $this->data['head6'] = $this->partsdata->getParts('w', 1)[0]['file_name'];
          $this->data['body6'] = $this->partsdata->getParts('w', 2)[0]['file_name'];
          $this->data['feet6'] = $this->partsdata->getParts('w', 3)[0]['file_name'];
          $this->data['pagebody'] = 'assemblypage';
          $this->render();
         * 
         */
    }

    public function assembleBots()
    {
        $head = $this->input->post('head');
        $torso = $this->input->post('torso');
        $legs = $this->input->post('legs');

        $tempHead = explode('-', $head);
        $tempTorso = explode('-', $torso);
        $tempLegs = explode('-', $legs);

        $headModel = $tempHead[0];
        $torsoModel = $tempTorso[0];
        $legsModel = $tempLegs[0];

        $headId = $tempHead[1];
        $torsoId = $tempTorso[1];
        $legsId = $tempLegs[1];

        $newRobotForInsert = array(
            'head' => $headId,
            'body' => $torsoId,
            'legs' => $legsId
        );

        $newRobot = array(
            'head' => $headId,
            'body' => $torsoId,
            'legs' => $legsId,
            'headModel' => $headModel,
            'torsoModel' => $torsoModel,
            'legsModel' => $legsModel,
        );

        // move to model later
        $this->db->insert('assembledBots', $newRobotForInsert);
        // delete parts

        $assembledRobot = $this->createHistory($newRobot, 'Assemble', 0);
        
        // should make a bots history fucntion later
        $this->historydata->insertPartsHistory($assembledRobot);
        redirect('/assembly');
    }

    public function insertAssembled()
    {
        if ($this->input->is_ajax_request())
        { // just additional, to make sure request is from ajax
            if ($this->input->post('submit_a'))
            {
                $head = $this->input->post('head');
                $body = $this->input->post('body');
                $legs = $this->input->post('legs');
                // to model
                $headId = $this->partsdata->getPartByFile($head)[0]['id'];
                $bodyId = $this->partsdata->getPartByFile($body)[0]['id'];
                $legsId = $this->partsdata->getPartByFile($legs)[0]['id'];
                //


                $idNum = $this->robotsdata->getIdNum();
                $data = array('id' => $idNum, 'head' => $head, 'body' => $body, 'legs' => $legs);
                $this->robotsdata->createBot($data);
                $this->partsdata->deletePartById($headId);
                $this->partsdata->deletePartById($bodyId);
                $this->partsdata->deletePartById($legsId);
                $modelString = $data2 = array('seq' => $idNum, 'plant' => 'strawberry', 'model' => $head . ' ' . $body . ' ' . $legs, 'action' => 'Assembly', 'quantity' => 1, 'stamp' => date('Y-m-d H:i:s'));
                $this->robotsdata->updateHistory($data2);
                // return to view
                echo json_encode(array("error" => false));
                return false;
            }
        }
    }

    private function createHistory($part, $action, $amount)
    {
        $temp_array = array();

        $num_of_parts = count($part);

        $sequence = '';
        $models = '';
        
        var_dump($part);
        $sequence .= $part['head'] . ' ' . $part['body'] . ' ' . $part['legs'];
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
        $this->data['pagetitle'] = 'Assembly';
        $this->data['pagebody'] = 'assemblypage';
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

}
