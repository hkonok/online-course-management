<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inner extends MX_Controller {

    public function index() {
        $this->load->view('inner_view');
    }

}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */