
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BTransaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        if(!$this->session->userdata('username'))
            redirect('bauth');
    }

    public function index()
    {
        $data_page    = array(
        'title'     => 'Transaksi ',
        'button'    => '<button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success" name="button"><i class="ti-plus"></i>&nbsp&nbspBaru</button>',
        'side_bar'  => $this->modelsik->getmenu()->result(),
        'content'   => $this->parser->parse('b_transaksi', array(),true)
        );
        $this->parser->parse('b_main', $data_page);
    }

}

/* End of file BTransaksi.php */