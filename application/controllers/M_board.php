<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_board_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'm_board/q=' . urlencode($q);
            $config['first_url'] = base_url() . 'm_board/q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'm_board/';
            $config['first_url'] = base_url() . 'm_board/';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_board_model->total_rows($q);
        $m_board = $this->M_board_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_board_data' => $m_board,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('m_board/m_board_list', $data);
    }

    public function read($id) 
    {
        $row = $this->M_board_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'pesan' => $row->pesan,
		'author' => $row->author,
	    );
            $this->load->view('m_board/m_board_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_board'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_board/create_action'),
	    'no' => set_value('no'),
	    'pesan' => set_value('pesan'),
	    'author' => set_value('author'),
	);
        $this->load->view('m_board/m_board_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pesan' => $this->input->post('pesan',TRUE),
		'author' => $this->input->post('author',TRUE),
	    );

            $this->M_board_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_board'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_board_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_board/update_action'),
		'no' => set_value('no', $row->no),
		'pesan' => set_value('pesan', $row->pesan),
		'author' => set_value('author', $row->author),
	    );
            $this->load->view('m_board/m_board_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_board'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
		'pesan' => $this->input->post('pesan',TRUE),
		'author' => $this->input->post('author',TRUE),
	    );

            $this->M_board_model->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_board'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_board_model->get_by_id($id);

        if ($row) {
            $this->M_board_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_board'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_board'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');
	$this->form_validation->set_rules('author', 'author', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_board.xls";
        $judul = "m_board";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Pesan");
	xlsWriteLabel($tablehead, $kolomhead++, "Author");

	foreach ($this->M_board_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pesan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->author);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_board.doc");

        $data = array(
            'm_board_data' => $this->M_board_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('m_board/m_board_doc',$data);
    }

}