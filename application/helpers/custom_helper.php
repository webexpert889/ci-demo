<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function get_date_format($date)
{
    if ($date == '0000-00-00 00:00:00' || $date == '') {
        return "N/A";
    } else {
        $myDateTime           = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $newDateString = $myDateTime->format('d/m/Y h:i A');
    }
}

function get_date_withouttime_format($date)
{
    if ($date == '0000-00-00 00:00:00' || $date == '') {
        return "N/A";
    } else {
        $myDateTime           = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $newDateString = $myDateTime->format('d/m/Y');
    }
}

function get_time_format($date)
{
    if ($date == '0000-00-00 00:00:00' || $date == '') {
        return "N/A";
    } else {
        $myDateTime           = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $newDateString = $myDateTime->format('h:i A');
    }
}

function set_date_format($date)
{
    if ($date == '00/00/0000') {
        return "N/A";
    } else {
        $myDateTime           = DateTime::createFromFormat('d/m/Y', $date);
        return $newDateString = $myDateTime->format('Y-m-d h:i:s');
    }
}

function filter_date($date)
{
    if ($date == '00-00-0000') {
        return false;
    } else {
        $myDateTime           = DateTime::createFromFormat('d-m-Y', $date);
        return $newDateString = $myDateTime->format('Y-m-d');
    }
}

function RandomPassword($digit)
{
    $alphabet    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass        = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $digit; $i++) {
        $n      = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

//Link generate
function randomLink()
{
    $alphabet    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass        = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 15; $i++) {
        $n      = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function search_permission($id, $array)
{
    foreach ($array as $key => $val) {
        if ($val['Perm_Id'] === $id) {
            return true;
        }
    }
    return false;
}

function search_checked($id, $array, $keyword)
{
    foreach ($array as $key => $val) {
        if ($val['Perm_Id'] === $id) {
            if ($val[$keyword] == '1') {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}

function CountCustomer($where)
{
    $CI = &get_instance();
    return $CI->common_model->count_data('users', $where);
}

function inquiry_status($status)
{
    $CI = &get_instance();
    switch ($status) {
        case '0':
            $status = $CI->lang->line('inquiry_status_value_0');
            break;
        case '1':
            $status = $CI->lang->line('inquiry_status_value_1');
            break;
        case '2':
            $status = $CI->lang->line('inquiry_status_value_2');
            break;
        case '3':
            $status = $CI->lang->line('inquiry_status_value_3');
            break;
        case '4':
            $status = $CI->lang->line('inquiry_status_value_4');
            break;
    }
    return $status;
}

function inquiry_comming($status)
{
    $CI = &get_instance();
    switch ($status) {
        case '0':
            $status = $CI->lang->line('inquiry_coming_value_0');
            break;
        case '1':
            $status = $CI->lang->line('inquiry_coming_value_1');
            break;
        case '2':
            $status = $CI->lang->line('inquiry_coming_value_2');
            break;
        case '3':
            $status = $CI->lang->line('inquiry_coming_value_3');
            break;
        case '4':
            $status = $CI->lang->line('inquiry_coming_value_4');
            break;
        case '5':
            $status = $CI->lang->line('inquiry_coming_value_5');
            break;
        case '6':
            $status = $CI->lang->line('inquiry_coming_value_6');
            break;
    }
    return $status;
}

function email_log_status($status)
{
    $CI = &get_instance();
    switch ($status) {
        case '0':
            $status = $CI->lang->line('email_log_status_value_2');
            break;
        case '1':
            $status = $CI->lang->line('email_log_status_value_1');
            break;
    }
    return $status;
}

function agent_order_status($status)
{
    $CI = &get_instance();
    switch ($status) {
        case 0:
            $status = $CI->lang->line('agent_order_status_pending');
            break;
        case 1:
            $status = $CI->lang->line('agent_order_status_win');
            break;
        case 2:
            $status = $CI->lang->line('agent_order_status_lost');
            break;
        case 3:
            $status = $CI->lang->line('status_cancel');
            break;
    }
    return $status;
}

function get_scenario_data($Scenario_Id)
{

    $CI   = &get_instance();
    $data = $CI->common_model->get_scenario($Scenario_Id);
    return $data;
}

function get_country_name($Id)
{

    $CI   = &get_instance();
    $data = $CI->common_model->get_country($Id);
    return $data['CountryName'];
}

function get_user_name($Id)
{

    $CI   = &get_instance();
    $data = $CI->common_model->get_user($Id);
    return $data['FirstName'] . ' ' . $data['LastName'];
}
