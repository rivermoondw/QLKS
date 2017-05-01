<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_booking extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function get_room_list(){
        return $this->db->select('room_id, room, rank, type, state')
            ->from('room')
            ->join('rank', 'room.rank_id = rank.rank_id')
            ->join('type', 'room.type_id = type.type_id')
            ->order_by('room', 'ASC')
            ->get()->result_array();
    }

    public function get_room($room_id = 0){
        return $this->db->select('room_id, room, tel, rank, type, price, state')
            ->from('room')
            ->join('rank', 'room.rank_id = rank.rank_id')
            ->join('type', 'room.type_id = type.type_id')
            ->where('room_id', (int)$room_id)
            ->get()->result_array();
    }

    public function check_in(){
        $this->db->trans_start();
        $list_room = $this->input->post('room_id');
        $date = array(
            'dob' => str_replace('/', '-', $this->input->post('dob')),
            'start_date' => str_replace('/', '-', $this->input->post('start_date')),
            'end_date' => str_replace('/', '-', $this->input->post('end_date'))
        );
        $this->db->insert('customer', array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'id' => $this->input->post('id'),
            'dob' => date('Y-m-d',strtotime($date['dob'])),
            'gender' => $this->input->post('gender'),
            'phone' => empty($this->input->post('phone'))?'':$this->input->post('phone'),
            'address' => empty($this->input->post('address'))?'':$this->input->post('address')
        ));
        $flag = $this->db->affected_rows();
        if ($flag <= 0){
            return array(
                'type' => 'error',
                'message' => 'Lỗi đặt phòng'
            );
        }
        $customer_id = $this->db->insert_id();
        $this->db->insert('booking', array(
            'customer_id' => (int)$customer_id,
            'quantity' => count($list_room),
            'start_date' => date('Y-m-d',strtotime($date['start_date'])),
            'end_date' => date('Y-m-d',strtotime($date['start_date'])),
            'state' => 0,
            'create_date' => date('Y-m-d H:i:s', time())
        ));
        $flag = $this->db->affected_rows();
        if ($flag <= 0){
            return array(
                'type' => 'error',
                'message' => 'Lỗi đặt phòng'
            );
        }
        $booking_id = $this->db->insert_id();
        if (count($list_room) != 0){
            $data = array();
            foreach ($list_room as $key => $val){
                array_push($data, array(
                    'booking_id' => $booking_id,
                    'room_id' => $val
                ));
            }
            $this->db->insert_batch('bookingroom', $data);
            $flag = $this->db->affected_rows();
            if ($flag <= 0){
                return array(
                    'type' => 'error',
                    'message' => 'Lỗi đặt phòng'
                );
            }
            $this->db->where_in('room_id', $list_room)->update('room', array(
                'state' => 1
            ));
            $flag = $this->db->affected_rows();
            $this->db->trans_complete();
            if ($flag > 0) {
                return array(
                    'type' => 'success',
                    'message' => 'Đặt phòng thành công'
                );
            } else {
                return array(
                    'type' => 'error',
                    'message' => 'Lỗi đặt phòng'
                );
            }
        }
        else{
            return array(
                'type' => 'error',
                'message' => 'Lỗi đặt phòng'
            );
        }
    }

    public function get_room_empty(){
        return $this->db->select('room_id, room')
            ->from('room')
            ->where('state', 0)
            ->get()->result_array();
    }


}