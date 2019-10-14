<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Spk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'spk/q=' . urlencode($q);
            $config['first_url'] = base_url() . 'spk/q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'spk/';
            $config['first_url'] = base_url() . 'spk/';
        }
        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Spk_model->total_rows($q);
        $spk = $this->Spk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'spk_data' => $spk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        $this->load->view('spk/spk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Spk_model->get_by_id($id);
        if ($row) {
            $data = array(
              'no_spk' => $row->no_spk,
              'nama_klien' => $row->nama_klien,
              'details' => $row->details,
              'project_name' => $row->project_name,
              'start_date' => $row->start_date,
              'duedate' => $row->duedate,
              'status' => $row->status,
              'last_update_by' => $row->last_update_by,
              'last_update_time' => $row->last_update_time,
              );
            $this->load->view('spk/spk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('spk/create_action'),
            'no_spk' => set_value('no_spk'),
            'nama_klien' => set_value('nama_klien'),
            'details' => set_value('details'),
            'project_name' => set_value('project_name'),
            'start_date' => set_value('start_date'),
            'duedate' => set_value('duedate'),
            'status' => set_value('status'),
            );
        $this->load->view('spk/spk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_klien' => $this->input->post('nama_klien',TRUE),
              'details' => $this->input->post('details',TRUE),
              'project_name' => $this->input->post('project_name',TRUE),
              'start_date' => $this->input->post('start_date',TRUE),
              'duedate' => $this->input->post('duedate',TRUE),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Spk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('spk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Spk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('spk/update_action'),
                'no_spk' => set_value('no_spk', $row->no_spk),
                'nama_klien' => set_value('nama_klien', $row->nama_klien),
                'details' => set_value('details', $row->details),
                'project_name' => set_value('details', $row->project_name),
                'start_date' => set_value('start_date', $row->start_date),
                'duedate' => set_value('duedate', $row->duedate),
                'status' => set_value('status', $row->status),
                );
            $this->load->view('spk/spk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spk'));
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
              'details' => $this->input->post('details',TRUE),
              'project_name' => $this->input->post('project_name',TRUE),
              'start_date' => $this->input->post('start_date',TRUE),
              'duedate' => $this->input->post('duedate',TRUE),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Spk_model->update($this->input->post('no_spk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spk'));
        }
    }

    public function print_spk($id){
     $row = $this->Spk_model->get_by_id($id);
     if ($row) {
        $data = array(
          'no_spk' => $row->no_spk,
          'nama_klien' => $row->nama_klien,
          'details' => $row->details,
          'project_name' => $row->project_name,
          'start_date' => $row->start_date,
          'duedate' => $row->duedate,
          'last_update_by' =>$row->last_update_by,
          'last_update_time' =>$row->last_update_time,
          );
        $this->load->view('spk/spk_print' , $data);
    }
}    
public function delete($id) 
{
    $row = $this->Spk_model->get_by_id($id);

    if ($row) {
        $this->Spk_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('spk'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('spk'));
    }
}

public function _rules() 
{
 $this->form_validation->set_rules('nama_klien', 'nama klien', 'trim|required');
 $this->form_validation->set_rules('details', 'details', 'trim|required');
 $this->form_validation->set_rules('project_name', 'project name', 'trim|required');
 $this->form_validation->set_rules('start_date', 'start date', 'trim|required');
 $this->form_validation->set_rules('duedate', 'duedate', 'trim|required');
 $this->form_validation->set_rules('status', 'status', 'trim|required');

 $this->form_validation->set_rules('no_spk', 'no_spk', 'trim');
 $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

public function excel()
{
    $this->load->helper('exportexcel');
    $namaFile = "spk.xls";
    $judul = "spk";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Details");
    xlsWriteLabel($tablehead, $kolomhead++, "Project Name");
    xlsWriteLabel($tablehead, $kolomhead++, "Start Date");
    xlsWriteLabel($tablehead, $kolomhead++, "Duedate");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->Spk_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_klien);
        xlsWriteLabel($tablebody, $kolombody++, $data->details);
        xlsWriteLabel($tablebody, $kolombody++, $data->start_date);
        xlsWriteLabel($tablebody, $kolombody++, $data->duedate);
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
    header("Content-Disposition: attachment;Filename=spk.doc");

    $data = array(
        'spk_data' => $this->Spk_model->get_all(),
        'start' => 0
        );
    
    $this->load->view('spk/spk_doc',$data);
}

public function profil($id = null){
    $dataUser = $this->session->all_userdata();
    $row = $this->User_model->get_by_id($dataUser['id']);

    if ($row) {
        $data = array(
            'user_fullname' => set_value('user_fullname', $row->user_fullname),
            );
        $this->load->view('backend/profil' , $data);

    }
}

}
