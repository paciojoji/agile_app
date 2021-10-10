<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agile extends CI_Controller
{

  public function __construct()
  {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == "OPTIONS") {
      die();
    }

    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '');
    $this->load->model('Main');
    $this->load->model('Agile_model', 'a_model');
  }

  public function index()
  {
    $this->template->title('Agile');
    $this->template->set_layout('default');
    $this->template->set_partial('header', 'partials/header');
    $this->template->set_partial('sidebar', 'partials/sidebar');
    $this->template->set_partial('aside', 'partials/aside');
    $this->template->set_partial('footer', 'partials/footer');
    $this->template->append_metadata('<script src="' . base_url("assets/js/pages/agile.js?ver=") . filemtime(FCPATH . "assets/js/pages/agile.js") . '"></script>');

    $this->template->build('agile_view');
  }

  public function getAllAgile()
  {
    extract($_GET);
    $status = 200;

    $data = $this->a_model->getAllAgileData();
    $data = arCol($data, 'type');

    $data = [
      'status' => $status,
      'data'   => $data,
    ];

    response_json($data);
  }

  public function save()
  {
    extract($_POST);

    $status = 0;
    $message = "";

    $insertData = [
      "title"       => $title,
      "description" => $description,
      "type"        => $type
    ];

    $success = $this->a_model->addAgileData($insertData);

    if ($success) {
      $status = 200;
      $message = "Successfully added data.";
    } else {
      $status = 500;
      $message = "Unable to add data.";
    }

    $response = array(
      'status'  => $status,
      'message' => $message,
    );

    response_json($response);
  }

  public function updateData()
  {
    extract($_POST);
    $status = 0;
    $message = "";

    $updateData = [
      "title"       => $title,
      "description" => $description,
      "type"        => $type
    ];

    $success = $this->a_model->updateAgileData($updateData, ["agile_id" => $agile_id]);

    if ($success) {
      $status = 200;
      $message = "Successfully updated data.";
    } else {
      $status = 500;
      $message = "Unable to update data.";
    }

    $response = array(
      'status'  => $status,
      'message' => $message,
    );

    response_json($response);
  }

  public function removeData()
  {
    extract($_POST);
    $status = 0;
    $message = "";

    $success = $this->a_model->removeAgileData($agile_id);

    if ($success) {
      $status = 200;
      $message = "Successfully removed data.";
    } else {
      $status = 500;
      $message = "Unable to remove data.";
    }

    $response = array(
      'status'  => $status,
      'message' => $message,
    );

    response_json($response);
  }
}

/* End of file Dashboard.php */
/* Location: ./application/modules/admin/controllers/Dashboard.php */