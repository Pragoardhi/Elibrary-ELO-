<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function getUser()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[User]");
        // echo $data->result_array();
        return $data->result_array();
    }
    public function saveEditUser($id, $newusername, $newemail)
    {
        $this->db->query("UPDATE [dbo].[User] SET email='$newemail', username='$newusername' WHERE id='$id'");
    }
}
