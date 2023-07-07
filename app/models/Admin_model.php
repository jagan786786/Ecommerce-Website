<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function edit_productsadmin($product_id)
    {
        if ($product_id) {
            $query = $this->db->where('product_id', $product_id)->get('product');
            return $query->result();
        }
    }
    function update_productsadmin($submit)
    {
        // Code to store image
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = '50000'; // max_size in kb 
        $config['file_name'] = $_FILES['file-ip-1']['name'];
        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        $this->upload->do_upload('file-ip-1');
        $uploadData = $this->upload->data();
        $picture = $uploadData['file_name'];
        if ($submit) {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'product_summary' => $this->input->post('product_summary'),
                'product_brand' => $this->input->post('product_brand'),
                'product_cost_price' => $this->input->post('product_cost_price'),
                'product_selling_price' => $this->input->post('product_selling_price'),
                'product_marginal_price' => $this->input->post('product_selling_price') - ($this->input->post('product_selling_price') * $this->input->post('product_offer') / 100),
                'product_image' => $picture,
                'product_offer' => $this->input->post('product_offer')
            );
            $this->db->where('product_id', $submit['product_id']);
            $result = $this->db->update('product', $data);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
    function delete_product($product_id)
    {
            $this->db->where('product_id', $product_id);
            $this->db->delete('product');
            return true;
    }
    function ban_product($product_id)
    {
        if ($product_id) {
            $data = array(
                'product_delete ' => "1",
            );
            $this->db->where('product_id', $product_id);
            $this->db->update('product', $data);
            return true;
        }
    }
    function activate_product($product_id)
    {
        if ($product_id) {
            $data = array(
                'product_delete ' => "0",
            );
            $this->db->where('product_id', $product_id);
            $this->db->update('product', $data);
            return true;
        }
    }
    //User information
    function edit_usersadmin($user_id)
    {
        if ($user_id) {
            $query = $this->db->where('user_id', $user_id)->get('user');
            return $query->result();
        }
    }
    function update_usersadmin($submit)
    {
        if ($submit) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
            );
            $this->db->where('user_id', $submit['user_id']);
            $result = $this->db->update('user', $data);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
    function ban_user($user_id)
    {
        if ($user_id) {
            $data = array(
                'user_delete' => "1",
            );
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
    }
    function activate_user($user_id)
    {
        if ($user_id) {
            $data = array(
                'user_delete' => "0",
            );
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
    }
    function delete_user($user_id)
    {
        if ($user_id) {
            $data = array(
                'user_delete' => "0",
            );
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
        return true;
        }
    }
    //verification of user role
    function change_user($user_id)
    {
        if ($user_id) {
            $data = array(
                'role' => "0",
            );
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
    }
    function change_admin($user_id)
    {
        if ($user_id) {
            $data = array(
                'role' => "1",
            );
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
    }
    

}