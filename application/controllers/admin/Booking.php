<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Admin_Controller {
    function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Đặt phòng';
        $this->load->model('admin/model_booking');
        $this->data['active_parent'] = 'booking';
    }

    public function index(){
        $this->data['content_header'] = 'Tình trạng phòng';
        $this->data['before_head'] = '<style>
	.custom {
		color:#fff;
		color: rgba(255,255,255,0.95);
	}
	.custom:hover {
		color:#fff;
		color: rgba(255,255,255,1);
	}
  </style>';
        $this->data['list_room'] = $this->model_booking->get_room_list();
        $this->render('admin/booking/list_view');
    }

    public function detail($room_id = 0){
        $this->data['room'] = $this->model_booking->get_room($room_id);
        if (!isset($this->data['room']) || count($this->data['room']) == 0){
            $this->session->set_flashdata('message_flashdata', array(
                'type' => 'error',
                'message' => 'Phòng không tồn tại'
            ));
            redirect('admin/booking');
        }
        $this->data['content_header'] = 'Thông tin đặt phòng';
        $this->model_booking->get_booking_detail($room_id);
        $this->render('admin/booking/detail_view');
    }

    public function checkin(){
        $this->data['list_room'] = $this->model_booking->get_room_empty();
        if (!isset($this->data['list_room']) || count($this->data['list_room']) == 0){
            $this->session->set_flashdata('message_flashdata', array(
                'type' => 'error',
                'message' => 'Không còn phòng cho thuê'
            ));
            redirect('admin/booking');
        }
        $this->data['before_head'] = '<!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="' . base_url() . 'assets/admin/plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="' . base_url() . 'assets/admin/plugins/select2/select2.min.css">';
        $this->data['before_body'] = '<!-- InputMask -->
<script src="' . base_url() . 'assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="' . base_url() . 'assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<!-- Select2 -->
<script src="' . base_url() . 'assets/admin/plugins/select2/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="' . base_url() . 'assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
    //Flat red color scheme for iCheck
    $(\'input[type="checkbox"].flat-red, input[type="radio"].flat-red\').iCheck({
      checkboxClass: \'icheckbox_flat-green\',
      radioClass: \'iradio_flat-green\'
    });
  });
</script>';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->data['content_header'] = 'Đặt phòng';
        if ($this->input->post('submit')){
            $this->form_validation->set_rules('fname','Họ đệm', 'trim|required');
            $this->form_validation->set_rules('lname','Tên', 'trim|required');
            $this->form_validation->set_rules('id','Chứng minh thư', 'trim|required');
            $this->form_validation->set_rules('dob','Ngày sinh', 'trim|required');
            $this->form_validation->set_rules('start_date','Ngày đến', 'trim|required');
            $this->form_validation->set_rules('end_date','Ngày trả', 'trim|required');
            $this->form_validation->set_rules('room_id[]','Phòng thuê', 'required');
            $this->form_validation->set_error_delimiters('<div class="text-red"><i class="fa fa-times-circle-o"></i> <b>', '</b></div>');
            if ($this->form_validation->run() === FALSE){
                $this->render('admin/booking/checkin_view');
            }
            else{
                $flag = $this->model_booking->check_in();
                $this->session->set_flashdata('message_flashdata', $flag);
                redirect('admin/booking');
            }
        }
        $this->render('admin/booking/checkin_view');
    }
}