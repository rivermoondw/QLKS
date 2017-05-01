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
            ->get()->result_array();
    }


}