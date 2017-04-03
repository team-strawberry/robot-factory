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
            
        } else
        {
            // didn't get the key
            $this->data['message'] = "<div class='text-danger'>$response</div>";
        }

        $this->render();
    }

    public function reboot()
    {
        $this->data['pagetitle'] = 'Management';
        $this->data['pagebody'] = 'managepage';
        
        $API_KEY = $this->managedata->getKey();

        if ($API_KEY == '000000')
        {
            $this->data['pagebody'] = 'blockedpage';
            $this->data['pagetitle'] = '<a class="text-danger">Please register first</a>';
            $this->render();
            return;
        }
        
        // get the api kry
        $response = file_get_contents("https://umbrella.jlparry.com/work/rebootme?key=$API_KEY");
        $responseArray = explode(" ", $response);

        // if page displays 'ok'
        if ($responseArray[0] == 'Ok')
        {
            // empty everything, start over
            $this->managedata->resetKey();
            $this->partsdata->deleteAll();
            $this->historydata->deleteAll();
            $this->robotsdata->deleteAll();
            $this->session->set_userdata('message', "Plant Rebooted.");
            $this->data['message'] = "<div>Successfully rebooted</div>";
        } else
        {
            //error
            $this->session->set_userdata('error', $response);
            $this->data['message'] = "<div class='text-danger'>$response</div>";
        }
        
        $this->render();
    }

}
