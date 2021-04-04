<?php
class Login_Model extends CI_Model
{
	
	public function validLogin($loginData)
	{
		$this->db->where('email',$loginData['email']);
  		$this->db->where('password',$loginData['password']);
  		$data = $this->db->get('user')->row_array();
		return $data;
	}
	public function Auth($email, $pass)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$pass);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}