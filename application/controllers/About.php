<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of About
 *
 * @author Michael
 */
class About extends Application
{

    public function index()
    {

        // load a page for details
        $this->data['pagebody'] = 'aboutpage';
        $this->render();
    }

}
