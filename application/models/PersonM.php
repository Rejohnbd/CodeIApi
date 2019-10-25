<?php 
class PersonM extends CI_Model {
	// response if the field is empty 
  	public function empty_response () { 
    	$response ['status'] = 502; 
    	$response ['error'] = true; 
    	$response ['message'] = 'The field cannot be empty'; 
    	return $response; 
  	} 

  	// function to insert data into the tb_person 
  	public function add_person($name, $address, $phone) {
  		if (empty ($name) || empty ($address) || empty ($phone)) { 
	      return $this->empty_response (); 
	    } else {
	    	$data = array ( 
		        "name" => $name, 
		        "address" => $address, 
		        "phone" => $phone
	    	);
	    	$insert = $this->db->insert("tb_person", $data);

	    	if($insert){
		        $response['status']=200;
		        $response['error']=false;
		        $response['message']='Data person Added.';
		        return $response;
		     }else{
		        $response['status']=502;
		        $response['error']=true;
		        $response['message']='Data person failed to be added.';
		        return $response;
			}
		}
	}
	
	// retrieve all
	public function all_person(){
	    $all = $this->db->get("tb_person")->result();
	    $response['status']=200;
	    $response['error']=false;
	    $response['person']=$all;
	    return $response;
	}

	// delete data person
	public function delete_person($id){
	    if($id == ''){
	      return $this->empty_response();
	    }else{
	      $where = array(
	        "id"=>$id
	      );
	      $this->db->where($where);
	      $delete = $this->db->delete("tb_person");
	      if($delete){
	        $response['status']=200;
	        $response['error']=false;
	        $response['message']='Person data has been deleted.';
	        return $response;
	      }else{
	        $response['status']=502;
	        $response['error']=true;
	        $response['message']='Person data failed to deleted.';
	        return $response;
	      }
	    }
  	}

  	// update person 
  	public function update_person($id,$name,$address,$phone){
	    if($id == '' || empty($name) || empty($address) || empty($phone)){
	      return $this->empty_response();
	    }else{
	      $where = array(
	        "id"=>$id
	      );
	      $set = array(
	        "name"=>$name,
	        "address"=>$address,
	        "phone"=>$phone
	      );
	      $this->db->where($where);
	      $update = $this->db->update("tb_person",$set);
	      if($update){
	        $response['status']=200;
	        $response['error']=false;
	        $response['message']='Person data changed.';
	        return $response;
	      }else{
	        $response['status']=502;
	        $response['error']=true;
	        $response['message']='Person data failed to change.';
	        return $response;
	      }
	    }
  	}

}
?>