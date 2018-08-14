<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function print_recursive_list($data)
{
    // print_r($data);
    $str = "";
    foreach($data as $list)
    {
        $str .= "<div a href='".base_url().$list['menuexe']."' iconCls='".$list['menuicon']."'>".$list['menuname'];
        $subchild = print_recursive_list($list['child']);
        if($subchild != ''){
            $str .= "<span>".$subchild."</span>";
            $str .= "<div>".$subchild."</div>";
        }
        $str .= "</div>";
        // echo "masuk";
    }
    return $str;
}
function escapeString($val){
    $db = get_instance()->db->conn_id;
    $val = mysqli_real_escape_string($db, $val);
    return $val;
}
function getParameterKey($key){
    $db = get_instance()->db;
    $db->where('parameter_key',$key);
    $sql =$db->get('tblparameter');
    return $sql->row();
}
function getParameter($tipe){
    $db = get_instance()->db;
    $db->where('parametergrpid',$tipe);
    $sql =$db->get('tblparameter');
    return $sql->result();
}
function getComboParameter($tipe){
        $data="{value:'',text:'All'},";
        $sql = getParameter($tipe);
        foreach ($sql as $key) {
            $data .="{value:'".$key->parameter_key."',text:'".$key->parametertext."'},";
        }
        $data=strrev($data);
        $data=substr($data,1);
        $data=strrev($data);
        return $data;
    }
function queryCustom($sql){
    @$CI =& get_instance();
    @$data = $CI->db->query($sql)->result()[0];
    return @$data;
}
function queryCustom2($sql){
    @$CI =& get_instance();
    @$data = $CI->db->query($sql)->result_array()[0];
    return @$data;
}