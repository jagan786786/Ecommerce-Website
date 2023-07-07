<?php
class User_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  function saverecords($data)
  {
    if ($data) {
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        
      );
      $result = $this->db->insert('user', $data);
      return true;
    }
  }
  function getusers()
  {
    $query = $this->db->select("*")
      ->get('user');
    return $query->result();
  }
  public function getuserDetails($user_id)
  {
    // Query the database to fetch the product details
    $query = $this->db->get_where('user', array('user_id' => $user_id));
    // Return the fetched row as an object
    return $query->row();
  }
  public function activate($data, $user_id)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->update('user', $data);
  }
  public function validateEmailid($email_id)
  {
    // Query the database to fetch the product details
    $query = $this->db->get_where('user', array('email' => $email_id));
    // Return the fetched row as an object
    $validateEmail = $query->row();
    if ($validateEmail) {
      return true;
    } else {
      return false;
    }

  }


  public function getUserByIdAndPassword($userId, $password)
  {
    $query = $this->db->get_where('user', array('user_id' => $userId, 'password' => $password));
    return $query->row();
  }

  public function updatePassword($userId, $newPassword)
  {
    $this->db->set('password', $newPassword);
    $this->db->where('user_id', $userId);
    $this->db->update('user');
  }


  // public function validate_user_password($password)
  // {
  //   // Query the database to fetch the product details
  //   $query = $this->db->get_where('user', array('password' => $password));
  //   // Return the fetched row as an object
  //   $validatePassword = $query->row();
  //   if ($validatePassword) {
  //     return true;
  //   } else {
  //     return false;
  //   }
  // }
  function loginUser($data)
  {
    if ($data) {
      $data = array(
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
      );
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('email', $data['email']);
      $this->db->where('password', $data['password']);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->row();
      } else {
        return false;
      }
    }
  }
}