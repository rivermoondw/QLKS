<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Quản lý khách hàng';
        $this->load->model('admin/model_customer');
        $this->load->helper('form');
        $this->data['active_parent'] = 'customer';
    }

    public function index($page = 1)
    {
        $this->load->library('pagination');
        $this->data['active'] = 'customer';
        $this->data['content_header'] = 'Danh sách khách hàng';
        $this->data['before_head'] = '<!-- DataTables -->
  <link rel="stylesheet" href="' . base_url() . 'assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="' . base_url() . 'assets/admin/plugins/iCheck/flat/blue.css">';
        $this->data['before_body'] = '<!-- DataTables -->
<script src="' . base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="' . base_url() . 'assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- iCheck -->
<script src="' . base_url() . 'assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- page script -->
<script>
  $(function () {
      $(".del-btn").click(function(){
          if(!confirm ("Bạn có muốn xóa không?")) event.preventDefault();
      });
      $(\'#del-list\').click(function(){
        $("input[name=\'checkbox[]\']").each(function(index){
            if ($(this).is(\':checked\')){
                if(!confirm ("Bạn có muốn xóa lựa chọn không?")) event.preventDefault();
                return false;
            }
        });
      });
      //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $(\'#example2 input[type="checkbox"]\').iCheck({
      checkboxClass: \'icheckbox_flat-blue\',
      radioClass: \'iradio_flat-blue\'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data(\'clicks\');
      if (clicks) {
        //Uncheck all checkboxes
        $("#example2 input[type=\'checkbox\']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass(\'fa-square-o\');
      } else {
        //Check all checkboxes
        $("#example2 input[type=\'checkbox\']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass(\'fa-check-square-o\');
      }
      $(this).data("clicks", !clicks);
    });
  });
</script>';
        if ($this->input->post('btn-delete')) {
            $checkbox = $this->input->post('checkbox');
            if (is_array($checkbox)) {
                $flag = $this->model_customer->del_list($checkbox);
                $this->session->set_flashdata('message_flashdata', $flag);
                redirect('admin/customer');
            } else {
                $this->session->set_flashdata('message_flashdata', array(
                    'type' => 'error',
                    'message' => 'Bạn phải chọn đối tượng'
                ));
                redirect('admin/customer');
            }
        }

        $config['full_tag_open'] = '<ul class="pagination pull-right no-margin">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'Trang đầu';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Trang cuối';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['base_url'] = 'http://localhost:8080/qlks/admin/customer/index/';
        $config['total_rows'] = $this->model_customer->total();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();

        $total_page = ceil($config['total_rows'] / $config['per_page']);
        $page = ($page > $total_page) ? $total_page : $page;
        $page = ($page < 1) ? 1 : $page;
        $page = $page - 1;
        $this->data['list_customer'] = $this->model_customer->get_list(($page * $config['per_page']), $config['per_page']);
        $this->render('admin/customer/list_view');
    }

    public function add()
    {
        $this->data['active'] = 'add_customer';
        $this->data['content_header'] = 'Thêm khách hàng';
        $this->load->library('form_validation');
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fname', 'First name', 'required|trim');
            $this->form_validation->set_rules('fname', 'Last name', 'required|trim');
            $this->form_validation->set_rules('id', 'CMTND', 'required|trim');
            $this->form_validation->set_rules('dob', 'Ngày Sinh', 'required|trim');
            $this->form_validation->set_rules('fname', 'Giới Tính', 'required|trim');
            $this->form_validation->set_rules('fname', 'SDT', 'required|trim');
            $this->form_validation->set_rules('fname', 'Địa chỉ', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="text-red"><i class="fa fa-times-circle-o"></i> <b>', '</b></div>');
            if ($this->form_validation->run() === FALSE) {
                $this->render('admin/customer/add_view');
            } else {
                $flag = $this->model_customer->add();
                $this->session->set_flashdata('message_flashdata', $flag);
                redirect('admin/customer');

            }
        }
        $this->render('admin/customer/add_view');
    }

    public function del($id = 0)
    {
        $customer = $this->model_customer($id);
        if (!isset($customer) || count($customer) == 0) {
            $this->session->set_flashdata('message_flashdata', array(
                'type' => 'error',
                'message' => 'Khách hàng không tồn tại'
            ));
            redirect('admin/customer');
        }
        $flag = $this->model_customer->del($customer['customer_id']);
        $this->session->set_flashdata('message_flashdata', $flag);
        redirect('admin/customer');
    }

    public function edit($id = 0)
    {
        $this->data['content_header'] = 'Sửa khách hàng';
        $customer = $this->model_customer->get($id);
        $this->data['customer'] = $customer;
        if (!isset($customer) || count($customer) == 0) {
            $this->session->set_flashdata('message_flashdata', array(
                'type' => 'error',
                'message' => 'Khách hàng không tồn tại'
            ));
            redirect('admin/customer');
        }
        $this->load->library('form_validation');
        if ($this->input->post('submit')) {
           $this->form_validation->set_rules('fname', 'First name', 'required|trim');
            $this->form_validation->set_rules('fname', 'Last name', 'required|trim');
            $this->form_validation->set_rules('id', 'CMTND', 'required|trim');
            $this->form_validation->set_rules('dob', 'Ngày Sinh', 'required|trim');
            $this->form_validation->set_rules('fname', 'Giới Tính', 'required|trim');
            $this->form_validation->set_rules('fname', 'SDT', 'required|trim');
            $this->form_validation->set_rules('fname', 'Địa chỉ', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="text-red"><i class="fa fa-times-circle-o"></i> <b>', '</b></div>');
            if ($this->form_validation->run() === FALSE) {
                $this->render('admin/customer/edit_view');
            } else {
                $flag = $this->model_customer->edit($customer['customer_id']);
                $this->session->set_flashdata('message_flashdata', $flag);
                redirect('admin/customer');

            }
        }
        $this->render('admin/customer/edit_view');
    }
}