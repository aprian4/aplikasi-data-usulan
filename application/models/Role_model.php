<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function getRole()
    {
        $query = "SELECT `role_user`.`role`, `user`.`id`
                  FROM `role_user` JOIN `user`
                  ON `role_user`.`id` = `user`.`role_id`
                ";
        return $this->db->query($query)->result_array();
    }
}
