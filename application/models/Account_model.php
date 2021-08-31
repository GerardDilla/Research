<?php


class Account_model extends CI_Model{


	public function StudentLogin($data){

		$this->db->join('Student_Info as S','H.Student_Number = S.Student_Number');
		$this->db->where('H.Student_Number',$data['Student_Number']);
		$this->db->where('H.Password',$data['Student_Number']);
		$this->db->where('H.Student_Number !=',0);
		$this->db->where('H.Active',1);
		$result = $this->db->get('highered_accounts as H');
		return $result->result_array();

	}
	public function TeacherLogin($data){

		$this->db->where('Instructor_ID',$data['Instructor_ID']);
		$this->db->where('Passkey',$data['Passkey']);
		$this->db->where('Instructor_ID !=','');
		$this->db->where('Active',1);
		$result = $this->db->get('Instructor');
		return $result->result_array();

	}
	public function PeerLogin($data){

		$this->db->where('username',$data['Instructor_ID']);
		$this->db->where('password',$data['Passkey']);
		$this->db->where('Active',1);
		$result = $this->db->get('rdo_external_accounts');
		return $result->result_array();

	}
	public function AddPeerAccount($data){

		$this->db->insert('rdo_external_accounts',$data);
		return $this->db->insert_id();

	}
	public function CheckExistingPeerAccount($data){

		$this->db->where('username',$data['username']);
		$this->db->where('active',1);
		$result = $this->db->get('rdo_external_accounts');
		return $result->result_array();
		
	}
	public function CheckExistingAdminAccount($data){

		$this->db->where('rdo_username',$data['rdo_username']);
		$this->db->where('rdo_active',1);
		$result = $this->db->get('rdo_admin_account');
		return $result->result_array();
		
	}
	public function CheckExistingExternalAccount($data){

		$this->db->where('username',$data['username']);
		$this->db->where('active',1);
		$result = $this->db->get('rdo_external_accounts');
		return $result->result_array();
		
	}
	public function AddAdminAccount($data){

		$this->db->insert('rdo_admin_account',$data);
		return $this->db->insert_id();

	}
	public function UpdateAdminAccount($data,$id){

		$this->db->trans_start();
		$this->db->where('rdo_admin_id',$id);
		$this->db->update('rdo_admin_account',$data);
		$this->db->trans_complete();
		return $this->db->trans_status();

	}
	public function UpdateExternalAccount($data,$id){

		$this->db->trans_start();
		$this->db->where('ID',$id);
		$this->db->update('rdo_external_accounts',$data);
		$this->db->trans_complete();
		return $this->db->trans_status();

	}
	public function GetAccounts($input){
	
		if($input['searchkey'] != ''){
			$this->db->like('rdo_fullname',$input['searchkey']);
			$this->db->or_like('rdo_username',$input['searchkey']);
		}
		$this->db->where('rdo_active',1);
		$result = $this->db->get('rdo_admin_account');
		return $result->result_array();

	}
	public function GetExternalAccounts($input){
	
		if($input['searchkey'] != ''){
			$this->db->like('fullname',$input['searchkey']);
			$this->db->or_like('username',$input['searchkey']);
		}
		$this->db->where('active',1);
		$result = $this->db->get('rdo_external_accounts');
		return $result->result_array();

	}
	public function AccountDetails($input){

		$this->db->where('rdo_admin_id',$input['id']);
		$this->db->where('rdo_active',1);
		$result = $this->db->get('rdo_admin_account');
		return $result->result_array();

	}
	public function ExternalAccountDetails($input){

		$this->db->where('ID',$input['id']);
		$this->db->where('active',1);
		$result = $this->db->get('rdo_external_accounts');
		return $result->result_array();

	}
	
		
}

?>