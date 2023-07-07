<?php
class Product_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function saverecords($data)
  {
    // Code to store image
    $config['upload_path'] = 'assets/images/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
    $config['max_size'] = '50000'; // max_size in kb 
    $config['file_name'] = $_FILES['uploadimage']['name'];
    //Load upload library and initialize configuration
    $this->load->library('upload', $config);
    // $this->upload->initialize($config);
    $this->upload->do_upload('uploadimage');
    $uploadData = $this->upload->data();
    $picture = $uploadData['file_name'];
    if ($data) {
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
      $result = $this->db->insert('product', $data);
      return true;
    }
  }
  function getProducts()
  {
    $query = $this->db->select("*")
      ->get('product');
    return $query->result();
  }
  function getproductsonly()
  {
    $available_products = "0";
    $this->db->select("*");
    $this->db->from("product");
    $this->db->where('product_delete', $available_products);
    $query = $this->db->get();
    return $query->result();
  }
  public function getProductDetails($product_id)
  {
    // Query the database to fetch the product details
    $query = $this->db->get_where('product', array('product_id' => $product_id));

    // Return the fetched row as an object
    return $query->row();
  }
}