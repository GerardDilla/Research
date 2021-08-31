<?php


class Item_model extends CI_Model{
	
	/*
	public function title_price(){
			
			
			$productID = $this->input->get('prodID');
			$Output = "";
			if(isset($productID)){
				
				$sql = "SELECT * FROM products WHERE Product_ID='$productID'";
				$query = $this->db->query($sql);
			
				if($query->num_rows() > 0){
					
					$Vals = $query->row();
					
					$Output .= 
					'
					
					<h4>'.$Vals->Product_Name.'</h4>
                            <hr>
                            
                            <div class="price">
                                <p><span class="price-after">'.$Vals->Product_Price.'&#8369;</span></p>
                            </div>
					
					
					';
					
				}else{
					
					$Output .= '';
					
					
					}
				return $Output;
					
			}	
	}
	
	public function prod_desc(){

			
			$productID = $this->input->get('prodID');
			$Output = "";
			if(isset($productID)){
				
				$sql = "SELECT * FROM products WHERE Product_ID='$productID'";
				$query = $this->db->query($sql);
			
				if($query->num_rows() > 0){
					
					$Vals = $query->row();
					
					$Output .= 
					'
					
					 <h4>Short description</h4>
                     <hr>
                     <p>'.$Vals->Product_Description.'</p>
					
					
					';
					
				}else{
					
					$Output .= '';
					
					
					}
				return $Output;
					
			}	
			
			
		}
		
		public function prod_pic(){
			
			$productID = $this->input->get('prodID');
			$Output = "";
			if(isset($productID)){
				
				$sql = "SELECT * FROM products WHERE Product_ID='$productID'";
				$query = $this->db->query($sql);
			
				if($query->num_rows() > 0){
					
					$Vals = $query->row();
					
					$Output .= 
					'
					
					 <img src="'.base_url().'img/'.$Vals->Product_Image.'" width="100%"/>
					
					
					';
					
				}else{
					
					$Output .= '';
					
					
					}
				return $Output;
					
			}	
			
			
		}

	*/
	
		
}

?>