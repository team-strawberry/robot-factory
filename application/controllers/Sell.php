<?php

class Sell extends Application
{

    private $items_per_page = 20;

    // construct function
    function __construct()
    {
        parent::__construct();
        $this->load->model('robotsdata');
    }

    // index function
    public function index()
    {
        $this->page(1);
    }

    // Show a single page of transactions
    private function showPage($robots)
    {

        // get user roles
        $user_role = $this->session->userdata('userrole');

        // only allow to worker
        if ($user_role == 'boss')
        {
            // build the transaction presentation output
            $temp_array = array(); // start with an empty array
            foreach ($robots as $robot)
            {
                $temp_array[] = array(
                    'id' => $robot['id'],
                    'head' => $robot['head'],
                    'torso' => $robot['torso'],
                    'legs' => $robot['legs']);
            }
            $this->data['transaction'] = $temp_array;
            $this->data['pagetitle'] = 'Sell';
            $this->data['pagebody'] = 'sellpage';
            $this->data['message'] = '';
        } else
        {
            $this->data['pagetitle'] = 'Sell - Only Allow to Boss';
            $this->data['pagebody'] = 'blockedpage';
            $this->data['message'] = '';
        }
        $this->render();
    }

    // Extract & handle a page of items, defaulting to the beginning    
    public function page($num = 1, $order = NULL)
    {

        // get sorted robot data
        $robots = $this->robotsdata->getAllBotsAsArray();
        $transactions = array();

        $index = 0;
        $count = 0;
        $start = ($num - 1) * $this->items_per_page;
        foreach ($robots as $robot)
        {
            if ($index++ >= $start)
            {
                $transactions[] = $robot;
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
        $lastpage = ceil($this->robotsdata->size() / $this->items_per_page);
        $parms = array(
            'first' => 1,
            'previous' => (max($num - 1, 1)),
            'next' => min($num + 1, $lastpage),
            'last' => $lastpage
        );
        return $this->parser->parse('sellnav', $parms, true);
    }

    // sell robot
    public function sellBot()
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

        $this->data['pagetitle'] = 'Sell';
        $this->data['pagebody'] = 'sellpage';
        $id = $_POST["id"]; //415157

        $robots = $this->robotsdata->getBot($id);
        var_dump($robots);

        $head = $robots['head'];
        $torso = $robots['torso'];
        $legs = $robots['legs'];

        $response = file_get_contents("https://umbrella.jlparry.com/work/buymybot/$head/$torso/$legs?key=" . $API_KEY);
        $responseArray = explode(" ", $response);

        // if page displays 'ok'
        if ($responseArray[0] == 'Ok')
        {
            $this->data['message'] = "<div>Successfully sold the robot</div>";
            // delete sold robot from db
            $this->robotsdata->deleteRobotById($id);
            // add to history
            $history_robot_to_save = $this->createHistory($robots, 'Sell', 100);
            $this->historydata->insertPartsHistory($history_robot_to_save);
        } else
        {
            // get message
            $this->data['message'] = "<div class='text-danger'>$response</div>";
        }

        redirect('/sell');
    }

    // create history
    private function createHistory($part, $action, $amount)
    {
        $temp_array = array();

        $num_of_parts = count($part);

        $sequence = '';
        $models = '';
        
        $sequence .= $part['head'] . ' ' . $part['torso'] . ' ' . $part['legs'];
        
        $temp_array[] = array(
            'action' => $action,
            'amount' => $amount,
            'quantity' => $num_of_parts,
            'plant' => 'strawberry',
            'model' => $sequence,
            'seq' => $sequence,
            'stamp' => date("Y-m-d H:i:s", time()),
        );

        return $temp_array;
    }

}

?>