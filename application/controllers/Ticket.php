<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ticket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ticket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ticket/q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ticket/q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ticket/';
            $config['first_url'] = base_url() . 'ticket/';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ticket_model->total_rows($q);
        $ticket = $this->Ticket_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ticket_data' => $ticket,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        $this->load->view('ticket/ticket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ticket_model->get_by_id($id);
        if ($row) {
            $data = array(
              'no_spk' => $row->no_spk,
              'nama_klien' => $row->nama_klien,
              'report' => $row->report,
              'report_in' => $row->report_in,
              'level' => $row->level,
              'status' => $row->status,
              );
            $this->load->view('ticket/ticket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ticket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ticket/create_action'),
            'no_spk' => set_value('no_spk'),
            'nama_klien' => set_value('nama_klien'),
            'report' => set_value('report'),
            'report_in' => set_value('report_in'),
            'level' => set_value('level'),
            'status' => set_value('status'),
            );
        $this->load->view('ticket/ticket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_klien' => $this->input->post('nama_klien',TRUE),
              'report' => $this->input->post('report',TRUE),
              'report_in' => $this->input->post('report_in',TRUE),
              'level' => $this->input->post('level',TRUE),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Ticket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ticket'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ticket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ticket/update_action'),
                'no_spk' => set_value('no_spk', $row->no_spk),
                'nama_klien' => set_value('nama_klien', $row->nama_klien),
                'report' => set_value('report', $row->report),
                'report_in' => set_value('report_in', $row->report_in),
                'level' => set_value('level', $row->level),
                'status' => set_value('status', $row->status),
                );
            $this->load->view('ticket/ticket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ticket'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_spk', TRUE));
        } else {
            $data = array(
              'nama_klien' => $this->input->post('nama_klien',TRUE),
              'report' => $this->input->post('report',TRUE),
              'report_in' => $this->input->post('report_in',TRUE),
              'level' => $this->input->post('level',TRUE),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Ticket_model->update($this->input->post('no_spk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ticket'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ticket_model->get_by_id($id);

        if ($row) {
            $this->Ticket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ticket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ticket'));
        }
    }

    public function print_ticket($id){
       $row = $this->Ticket_model->get_by_id($id);
       if ($row) {
        $data = array(
          'no_spk' => $row->no_spk,
          'nama_klien' => $row->nama_klien,
          'report' => $row->report,
          'report_in' => $row->report_in,
          'level' => $row->level,
          'status' => $row->status,
          );
        $this->load->view('ticket/ticket_print' , $data);
    }
} 

public function _rules() 
{
	$this->form_validation->set_rules('nama_klien', 'nama klien', 'trim|required');
	$this->form_validation->set_rules('report', 'report', 'trim|required');
	$this->form_validation->set_rules('report_in', 'report in', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('no_spk', 'no_spk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

public function excel()
{
    $this->load->helper('exportexcel');
    $namaFile = "ticket.xls";
    $judul = "ticket";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Klien");
    xlsWriteLabel($tablehead, $kolomhead++, "Report");
    xlsWriteLabel($tablehead, $kolomhead++, "Report In");
    xlsWriteLabel($tablehead, $kolomhead++, "Level");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->Ticket_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_klien);
        xlsWriteLabel($tablebody, $kolombody++, $data->report);
        xlsWriteLabel($tablebody, $kolombody++, $data->report_in);
        xlsWriteLabel($tablebody, $kolombody++, $data->level);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

public function word()
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=ticket.doc");

    $data = array(
        'ticket_data' => $this->Ticket_model->get_all(),
        'start' => 0
        );

    $this->load->view('ticket/ticket_doc',$data);
}

}