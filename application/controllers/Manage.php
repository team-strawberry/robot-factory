<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manage
 *
 * @author karan
 */
class Manage extends Application
{

    //put your code herefunction __construct() {
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // get user roles
        $user_role = $this->session->userdata('userrole');

        // only allow to worker
        if ($user_role == 'boss')
        {
            $this->data['pagetitle'] = 'Management';
            $this->data['pagebody'] = 'managepage';
            $this->data['message'] = '';
        } else
        {
            $this->data['pagetitle'] = 'Management - Only Allow to Boss';
            $this->data['pagebody'] = 'blockedpage';
        }

        $this->render();
    }

    public function register()
    {
        $this->data['pagetitle'] = 'Management';
        $this->data['pagebody'] = 'managepage';
        $password = $_POST["password"];

        // get the secret token
        $response = file_get_contents("https://umbrella.jlparry.com/work/registerme/strawberry/$password");
        $responseArray = explode(" ", $response);

        // if page displays 'ok'
        if ($responseArray[0] == 'Ok')
        {
            $this->managedata->updateKey($responseArray[1]);
            //got the key
            $this->data['message'] = "<div>Successfully get the API key</div>";
            $data = array('keyvalue' => $response);
            $this->db->insert('apikeydata', $data);
        } else
        {
            // didn't get the key
            $this->data['message'] = "<div class='text-danger'>$response</div>";
        }

        $this->render();
    }

    public function reboot()
    {

        $apikey = $this->managedata->getKey();

        // get the api kry
        $response = file_get_contents("https://umbrella.jlparry.com/work/rebootme?key=$apikey");
        $responseArray = explode(" ", $response);

        // if page displays 'ok'
        if ($responseArray[0] == 'Ok')
        {
            // empty everything, start over
            $this->partsdata->deleteAll();
            $this->historydata->deleteAll();
            $this->robotsdata->deleteAll();
            $this->session->set_userdata('message', "Plant Rebooted.");
            echo 'Success';
        } else
        {
            //error
            $this->session->set_userdata('error', $response);
            echo 'Error';
        }
        // go back to the page you were already on
        redirect('/manage');
    }

}
