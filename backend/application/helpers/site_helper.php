<?php


if (!function_exists('response_json')) {
	function response_json($data = array())
	{
		$_CI = &get_instance();
		$_CI->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}

function pdie($data = array(), $type = false)
{
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
	if ($type) {
		die();
	}
}

function jsondata()
{
	return json_decode(trim(file_get_contents('php://input')), true);
}

function isPost()
{
	$_CI = &get_instance();
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$_CI = &get_instance();
		$_CI->load->library('user_agent');
		$_CI->load->model('Main');
		$data = $_CI->agent->browser();
		$data .= $_CI->agent->version();
		$data .= $_CI->agent->platform();
		$data .= $_SERVER['HTTP_USER_AGENT'];
		$ip = $_CI->input->ip_address();

		$logdata = array(
			"text" => $data,
			'ip' => $ip,
			'page' => uri_string(),
		);
		$_CI->Main->insert('securitylogs', $logdata);
		exit('No direct script access allowed!');
	}
}

function isAjax()
{
	$_CI = &get_instance();

	if (!$_CI->input->is_ajax_request()) {
		show_404();
	}
}

function sesdata($index = "", $rtype = "")
{
	$_CI = &get_instance();
	if (!empty($index)) {
		return $_CI->session->userdata($index);
	}
	if ($rtype == "jsontype") {
		return  json_encode($_CI->session->userdata());
	} else {
		return $_CI->session->userdata();
	}
}


function pageconfig($data = array())
{
	$config['base_url'] = $data['base_url'];
	$config['page_query_string'] = true;
	$config['query_string_segment'] = 'p';
	$config['total_rows'] = $data['total_rows'];
	$config['per_page'] = $data['per_page'];
	$config['full_tag_open'] = ' <ul class="pagination justify-content-end">';
	$config['full_tag_close'] = '</ul>';
	$config['first_link'] = 'First Page';
	$config['first_tag_open'] = '<li class="page-item ">';
	$config['first_tag_close'] = '</li>';
	$config['last_link'] = 'Last Page';
	$config['last_tag_open'] = '<li class="page-item ">';
	$config['last_tag_close'] = '</li>';
	$config['next_link'] = 'Next Page';
	$config['next_tag_open'] = '<li class="page-item ">';
	$config['next_tag_close'] = '</li>';
	$config['prev_link'] = 'Prev Page';
	$config['prev_tag_open'] = '<li class="page-item ">';
	$config['prev_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link"><span class="sr-only">(current)</span>';
	$config['cur_tag_close'] = '</span></span></li>';
	$config['num_tag_open'] = '<li class="page-item ">';
	$config['num_tag_close'] = '</li>';
	$config['num_links'] = 2;

	return $config;
}

function login_authentication($page = "")
{
	$_CI = &get_instance();


	if (!isset($_CI->session->userdata['logged_in']) || (isset($_CI->session->userdata['logged_in']) && !$_CI->session->userdata['logged_in'])) {
		redirect(base_url() . '404_override');
		show_404();
	}
}

function getFullDateFormat($dateObj)
{

	$monthNames = [
		"January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	];

	$date = explode("-", $dateObj);

	if (!empty($dateObj)) {
		return $monthNames[$date[1] - 1] . " " . $date[2] . ", " . $date[0];
	} else {
		return "";
	}
}

function getFullDateTimeFormat($dateObj)
{

	$monthNames = [
		"January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	];

	$date = explode("-", $dateObj);
	$time = explode(" ", $date[2]);
	$timem = date("h:i A", strtotime($time[1]));

	if (!empty($dateObj)) {
		return $monthNames[$date[1] - 1] . " " . $time[0] . ", " . $date[0] . " " . $timem;
	} else {
		return "";
	}
}

function getFullDateFormatNoTime($dateObj)
{

	$monthNames = [
		"January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	];

	$date = explode("-", $dateObj);
	$time = explode(" ", $date[2]);
	$timem = date("h:i A", strtotime($time[1]));

	if (!empty($dateObj)) {
		return $monthNames[$date[1] - 1] . " " . $time[0] . ", " . $date[0];
	} else {
		return "";
	}
}

function in_array_r($needle, $haystack, $strict = false)
{
	foreach ($haystack as $item) {
		if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
			return true;
		}
	}

	return false;
}


function restrict_user()
{
	$_CI = &get_instance();

	$user = $_CI->session->userdata();

	$response = [];

	if (!in_array($user['status'], [0, 1])) {
		$response['success'] = FALSE;
		$response['error_arr'] = "";
		$response['message'] = "ADDING/UPDATING/DELETING/TAGGING has been disabled in the system for the Final generation of the CERTIFICATION.";
	}

	return $response;
}


function inLog($text = 0,$type="",$rowid = 0)
{
	if (!empty($text) && !empty($type)) {
		$_CI = &get_instance();
		$data = [
			'text'	 => $text,
			'uid' => sesdata('user_id'),
			'date' => date('Y-m-d H:i:s'),
			'type' => $type,
			'rowid' => $rowid,
		];
		return $_CI->Main->insert('lib_logs', $data);
	}
}


function m_array($arr = [],$col = '')
{
	$new_arr = [];

	if(!empty($arr))
	{
		foreach ($arr as $key => $value) {
			$new_arr[$value[$col]][] = $value;
		}
	}

	return $new_arr;
}

function insertLogs($action = "", $module = "", $data = [])
{
	$_CI = &get_instance();
	$data['old_data'] = json_encode($data['old_data']);
	$data['new_data'] = json_encode($data['new_data']);
	$data['uid'] = $_SESSION['user_id'];
	$data['username'] = $_SESSION['name'];
	$data['action'] =  $action;
	$data['module'] =  $module;
	$data['date'] =  date('Y-m-d H:i:s');
	return $_CI->Main->insert('logs', $data);
}


function arCol($array = [], $colId = "")
{
	$_CI = &get_instance();
	$data = [];
	if (!empty($array)) {
		foreach ($array as $ark => $arv) {
			$data[$arv[$colId]][] = $arv;
		}
	}
	return $data;
}
