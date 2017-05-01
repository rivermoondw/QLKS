<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Admin_Controller {
    function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Đặt phòng';
        $this->load->model('admin/model_booking');
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

    public function detail(){
        $this->data['content_header'] = 'Thông tin đặt phòng';
        $this->render('admin/booking/booking_detail_view');
    }
}