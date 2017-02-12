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
class Assembly extends Application {

    public function index() {
        // Retrieves the file names for each part in the Robots model.
        $this->data['head1'] = $this->partsdata->getPart(1)['fileName'];
        $this->data['body1'] = $this->partsdata->getPart(2)['fileName'];
        $this->data['feet1'] = $this->partsdata->getPart(3)['fileName'];

        $this->data['head2'] = $this->partsdata->getPart(4)['fileName'];
        $this->data['body2'] = $this->partsdata->getPart(5)['fileName'];
        $this->data['feet2'] = $this->partsdata->getPart(6)['fileName'];

        $this->data['head3'] = $this->partsdata->getPart(7)['fileName'];
        $this->data['body3'] = $this->partsdata->getPart(8)['fileName'];
        $this->data['feet3'] = $this->partsdata->getPart(9)['fileName'];

        $this->data['head4'] = $this->partsdata->getPart(10)['fileName'];
        $this->data['body4'] = $this->partsdata->getPart(11)['fileName'];
        $this->data['feet4'] = $this->partsdata->getPart(12)['fileName'];

        $this->data['head5'] = $this->partsdata->getPart(13)['fileName'];
        $this->data['body5'] = $this->partsdata->getPart(14)['fileName'];
        $this->data['feet5'] = $this->partsdata->getPart(15)['fileName'];

        $this->data['head6'] = $this->partsdata->getPart(16)['fileName'];
        $this->data['body6'] = $this->partsdata->getPart(17)['fileName'];
        $this->data['feet6'] = $this->partsdata->getPart(18)['fileName'];
        $this->data['pagebody'] = 'assemblypage';
        $this->render();
    }

}
