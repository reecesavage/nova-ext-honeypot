<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH . 'core/libraries/Nova_controller_admin.php';

class __extensions__nova_ext_honeypot__Manage extends Nova_controller_admin
{
    public function __construct()
    {
        parent::__construct();
     

        $this->ci = & get_instance();

        $this->ci->load->model('settings_model', 'settings');
        $this->_regions['nav_sub'] = Menu::build('adminsub', 'manageext');
        //$this->_regions['nav_sub'] = Menu::build('sub', 'sim');
        

        
    }


   



    public function index()
    {
          Auth::check_access('site/settings');
        $data['title'] = 'Manage Questions';


        if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
        {


             $id = $this->input->post('id', true);
        $id = (is_numeric($id)) ? $id : false;
        $delete = $this->ci->settings->delete_setting($id);
        if ($delete > 0)
        {
                     
                        $message = sprintf(
                                    lang('flash_success'),
                                    'Question',
                                    lang('actions_deleted'),
                                    ''
                                );


                        $flash['status'] = 'success';
                        $flash['message'] = text_output($message);

                        $this->_regions['flash_message'] = Location::view('flash', $this->skin, 'admin', $flash);
                    }
        }

        $data['images'] =
        ['add' => array(
                'src' => Location::img('icon-add.png', $this->skin, 'admin'),
                'alt' => ucfirst(lang('actions_add')),
                'title' => ucfirst(lang('actions_add')),
                'class' => 'image inline_img_left'),

        'delete' => array(
                'src' => Location::img('icon-delete.png', $this->skin, 'admin'),
                'alt' => lang('actions_delete'),
                'title' => ucfirst(lang('actions_delete')),
                'class' => 'image'),
        'edit' => array(
                'src' => Location::img('icon-edit.png', $this->skin, 'admin'),
                'alt' => lang('actions_edit'),
                'title' => ucfirst(lang('actions_edit')),
                'class' => 'image'),
       ]; 

        $this->db->from('settings');
        $this->db->where('setting_key', 'question');
        $query = $this->db->get();
        $data['models']= $query->result();
       
        $this->_regions['title'] .= 'Manage Questions';


           $this->_regions['javascript'] .= $this->extension['nova_ext_honeypot']->inline_js('custom', 'admin', $data);

        $this->_regions['content'] = $this->extension['nova_ext_honeypot']
            ->view('index', $this->skin, 'admin', $data);

        Template::assign($this->_regions);
        Template::render();
    }


   

     public function create()
    {
          Auth::check_access('site/settings');

            $data['title'] = 'Create Questions';


      if (isset($_POST['submit']) && $_POST['submit'] == 'Submit')
        {
           
            
                $json['question']=$_POST['question'];
                $json['answer']=$_POST['answer'];

            $this->ci->settings->add_new_setting( [
                'setting_key' => 'question',
                'setting_label' => 'Questions and Answer',
                'setting_value' => json_encode( $json)
            ] );



             $message = sprintf(lang('flash_success') ,
            // TODO: i18n...
            'Question Added successfully', '', '');

            $flash['status'] = 'success';
            $flash['message'] = text_output($message);

            $this->_regions['flash_message'] = Location::view('flash', $this->skin, 'admin', $flash);

        }

           $this->_regions['title'] .= 'Create Questions';

           $this->_regions['javascript'] .= $this->extension['nova_ext_honeypot']->inline_js('custom', 'admin', $data);

            $this->_regions['javascript'] .= $this->extension['nova_ext_honeypot']->inline_css('custom', 'admin', $data);

           $this->_regions['content'] = $this->extension['nova_ext_honeypot']
            ->view('create', $this->skin, 'admin', $data);

        Template::assign($this->_regions);
        Template::render();

    }

}