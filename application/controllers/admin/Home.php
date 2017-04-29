<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Trang chủ';
    }

    public function index()
    {
        $this->render('admin/home_view');
    }
}