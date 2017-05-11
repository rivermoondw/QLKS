<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_list($start, $limit)
    {
        return $this->db->select('customer_id, fname, lname, id, dob, sex, phone, address')
            ->from('customer')
            ->limit($limit, $start)
            ->order_by('lname', 'ASC')
            ->get()->result_array();
    }

    public function get($id = 0)
    {
        return $this->db->select('customer_id, fname, lname, id, dob, sex, phone, address')
            ->from('customer')
            ->where('customer_id', (int)$id)
            ->get()->row_array();
    }

    public function add()
    {
        $this->db->insert('customer', array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'id' => $this->input->post('id'),
            'dob' => $this->input->post('dob'),
            'sex' => $this->input->post('sex'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
            
        ));
        $flag = $this->db->affected_rows();
        if ($flag > 0) {
            return array(
                'type' => 'success',
                'message' => 'Thêm dữ liệu thành công'
            );
        } else {
            return array(
                'type' => 'error',
                'message' => 'Lỗi thêm dữ liệu'
            );
        }
    }

    public function del($id = 0)
    {
        $this->db->delete('customer', array('customer_id' => (int)$id));
        $flag = $this->db->affected_rows();
        if ($flag > 0) {
            return array(
                'type' => 'success',
                'message' => 'Xóa dữ liệu thành công'
            );
        } else {
            return array(
                'type' => 'error',
                'message' => 'Lỗi xóa dữ liệu'
            );
        }
    }

    public function del_list($checkbox = NULL)
    {
        $this->db->where_in('customer_id', $checkbox)->delete('customer');
        $flag = $this->db->affected_rows();
        if ($flag > 0) {
            return array(
                'type' => 'success',
                'message' => 'Đã xóa (' . count($checkbox) . ') dữ liệu'
            );
        } else {
            return array(
                'type' => 'error',
                'message' => 'Lỗi xóa dữ liệu'
            );
        }
    }

    public function edit($id = 0)
    {
        $this->db->where('customer_id', (int)$id)->update('customer', array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'id' => $this->input->post('id'),
            'dob' => $this->input->post('dob'),
            'sex' => $this->input->post('sex'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        ));
        $flag = $this->db->affected_rows();
        if ($flag > 0) {
            return array(
                'type' => 'success',
                'message' => 'Cập nhật dữ liệu thành công'
            );
        } else {
            return array(
                'type' => 'error',
                'message' => 'Lỗi cập nhật dữ liệu'
            );
        }
    }

    public function total()
    {
        return $this->db->get('customer')->num_rows();
    }
}