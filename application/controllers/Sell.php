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
                    'body' => $robot['body'],
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

	public function sellBot()
		{
			$this->data['pagetitle'] = 'Sell';  
			$this->data['pagebody'] = 'sellpage';
			$id = $_POST["id"]; //415157
			$robots = $this->robotsdata->getBot($id);
			$head = $robots['head'];
			$body = $robots['body'];
			$legs = $robots['legs'];
			$response = file_get_contents("https://umbrella.jlparry.com/work/buymybot/$head/$body/$legs");
			$responseArray = explode(" ", $response);

			if ($responseArray[0] == 'Ok')
			{
				$this->managedata->updateKey($responseArray[1]);
				$this->data['message'] = "<div>Successfully get the API key</div>";
			} else
			{
				$this->data['message'] = "<div class='text-danger'>$response</div>";
			}
			
			$this->render();
	}
	
}
?>