<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $db_tabel = 'user';

    public function load_form_rules()
    {
        $form_rules = array(
                            array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required'
                            ),
        );
        return $form_rules;
    }

    public function validasi()
    {
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // cek status user, login atau tidak?
    public function cek_user()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        //untuk mengatasi injection
        $a = mysql_real_escape_string($username);
        $b = mysql_real_escape_string($password);

        $query = $this->db->query("SELECT * FROM user 
            where username='$a' AND password='$b' AND deleted IS NULL");
        if ($query->num_rows() == 1)
        {
            $dt = $this->tahun->get_tahun_active();
            $data = array(  'username' => $username,
                            'nama_user'=> $query->row()->nama_user,
                            'status'=> $query->row()->status,
                            'registerd'=> $query->row()->registerd,  
                            'id_user'=> $query->row()->id_user, 
                            'login' => TRUE,
                            'tahun' => $dt->judul_tahun,
                            'wilayah' => $query->row()->wilayah);
            // buat data session jika login benar
            $this->session->set_userdata($data);
            
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('username' => '', 'login' => FALSE));
        $this->session->sess_destroy();
    }
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */