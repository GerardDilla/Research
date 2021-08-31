<?php


class Process_Model extends CI_Model{
	
	public function categorylist($input){

		$this->db->select('*');
		if($input['searchkey'] != ''){
			$this->db->where('rdo_category',$input['searchkey']);
		}
		$this->db->where('rdo_category_publish',1);
		$this->db->where('rdo_category_active',1);
		$result = $this->db->get('rdo_category');
		return $result->result_array();

	}
	public function departmentlist(){

		$this->db->select('*');
		$result = $this->db->get('School_Info');
		return $result->result_array();

	}
	public function categorytotal($data){

		$this->db->where('rdo_category_id',$data['rdo_category_id']);
		$this->db->where('rdo_file_active',1);
		$result = $this->db->get('rdo_files');
		return $result->result_array();

	}
	public function UncategorizeCategoryFiles($input,$set){

		$this->db->trans_start();
		$this->db->where('rdo_category_id',$input['rdo_category_id']);
		$this->db->update('rdo_files',$set);
		$this->db->trans_complete();
		
		return $this->db->trans_status();

	}
	public function filelist($filters){

		/*
		$filtercontent = array();
		if($filters){

			echo 'Filters model raw: '.json_encode($filters);
			foreach($filters as $filter => $type){
				
				if(!array_key_exists($type,$filtercontent)){
					$filtercontent[$type] = array();
				}
				array_push($filtercontent[$type], $filter);
				//$this->db->where('rdo_file_active',1);
			}

		}
		echo 'Filters processed: '.json_encode($filtercontent);
		if($filtercontent){
			foreach($filtercontent as $key => $data){
				$this->db->group_start();
				foreach($data as $where){
					if($key == 1){
						$this->db->or_where('rdo_category_id',$where);
					}
					else if($key == 2){
						$this->db->or_where('department_id',$where);
					}
					else if($key == 3){
						$this->db->like('file_title',$where);
						$this->db->or_like('research_author',$where);
						$this->db->or_like('research_description',$where);
					}
					else if($key == 4){
						$this->db->where('rdo_file_active',$where);
					}
				}
				$this->db->group_end();
			}
		}
		*/
		if($filters){
			foreach($filters as $filterdata){
				$this->db->group_start();
				if($filterdata['SearchType'] == 1){

					$this->db->or_where('rdo_category_id',$filterdata['SearchKey']);

				}
				else if($filterdata['SearchType'] == 2){

					$this->db->or_where('department_id',$filterdata['SearchKey']);

				}
				else if($filterdata['SearchType'] == 3){

					$this->db->like('file_title',$filterdata['SearchKey']);
					$this->db->or_like('research_author',$filterdata['SearchKey']);
					$this->db->or_like('research_description',$filterdata['SearchKey']);

				}
				else if($filterdata['SearchType'] == 4){

					$this->db->where('rdo_file_active',$filterdata['SearchKey']);

				}
				$this->db->group_end();
			}
		}
		//echo json_encode($filtercontent);
		$this->db->where('rdo_file_active',1);
		$result = $this->db->get('rdo_files');
		return $result->result_array();

	}
	public function filedetails($FileID = ''){

		$this->db->where('rdo_file_id',$FileID);
		$this->db->where('rdo_file_active',1);
		$result = $this->db->get('rdo_files');
		return $result->result_array();

	}
	public function CategoryDetails($FileID = ''){

		$this->db->where('rdo_category_id',$FileID);
		$this->db->where('rdo_category_active',1);
		$result = $this->db->get('rdo_category');
		return $result->result_array();

	}
	public function UpdateFileDetails($input,$set){

		$this->db->trans_start();
		$this->db->where('rdo_file_id',$input['FileID']);
		$this->db->update('rdo_files',$set);
		$this->db->trans_complete();
		
		return $this->db->trans_status();

	}
	public function UpdateCategory($input,$set){

		$this->db->trans_start();
		$this->db->where('rdo_category_id',$input['rdo_category_id']);
		$this->db->update('rdo_category',$set);
		$this->db->trans_complete();
		
		return $this->db->trans_status();

	}
	public function AddFile($input){

		$this->db->insert('rdo_files',$input);
		return $this->db->insert_id();

	}
	public function AddCategory($input){

		$this->db->insert('rdo_category',$input);
		return $this->db->insert_id();

	}
	public function CheckPDFAvailability($Draft){
		
		$this->db->where('file_upload_name',$Draft);
		$this->db->where('rdo_file_active',1);
		$result = $this->db->get('rdo_files');
		return $result->result_array();

	}
	
		
		
		
}

?>