<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmenutop extends CI_Model
{
	public function get_data($induk=0)
	{
		$userpk = $_SESSION['userpk'];
		$data = array();
		$result = $this->db->query("SELECT t2.menuid, t1.menuname,t1.menuicon, t1.menuexe , t2.acl
			FROM tblmenu t1, tblusermenu t2 
			WHERE t1.menuparent='$induk' AND t1.menuid=t2.menuid AND t2.userpk='$userpk' ORDER BY menuseq ASC");
		foreach($result->result() as $row)
		{
			$data[] = array(
					'menuid'	=>$row->menuid,
					'menuname'	=>$row->menuname,
					'menuicon'	=>$row->menuicon,
					'menuexe'	=>$row->menuexe,
					'acl'	=>$row->acl,
					// recursive
					'child'	=>$this->get_data($row->menuid)
				);
		}
		return $data;
	}
	public function get_child($menuid)
	{
		$data = array();
		$this->db->from('tblmenu');
		$this->db->where('menuparent',$menuid);
		$this->db->order_by("menuseq", "asc"); 
		$result = $this->db->get();
		foreach($result->result() as $row)
		{
			$data[$row->menuid] = $row->menuname;
		}
		return $data;
	}

	function get_menuid($menuexe){
		$userpk = $_SESSION['userpk'];
		$result = $this->db->query("SELECT t2.acl
			FROM tblmenu t1, tblusermenu t2 
			WHERE t1.menuexe='$menuexe' AND t1.menuid=t2.menuid AND t2.userpk='$userpk'");
		foreach($result->result() as $row)
		{
			$data = $row->acl;
		}
		return @$data;
	}
}