<?php 
	namespace App\Models;
	use CodeIgniter\Model; 

	use CodeIgniter\Controller;
	use App\Controllers\Home; 

	class Biketrip_model extends Model{

		public function getBikeTripLists(){
			$home = new Home();
	  		$url = base_url_SLim.'/biketrips/getbiketrips';
	  		// echo $url;die();
	  		return $home->CallAPI('GET',$url);
		}
 
		public function getBiketripFaqs($tripId){
			$home = new Home();
			$url = base_url_SLim.'/biketrips/getfaq/'.$tripId;
			// echo $url;die(); 
			return $home->CallAPI('GET',$url);
		}

		public function getCategories(){
			$home = new Home();
			$url = base_url_SLim.'/faq/getfaqcategories';
			// echo $url;die();
			return $home->CallAPI('GET',$url);
		}

		public function saveFaq($data){
			$home = new Home();
			$url = base_url_SLim.'/biketrips/addtripfaq';
			$data['status'] = 0;
			$data['createdBy'] = '1';
			echo $url;var_dump(json_encode($data));die();
			return $home->CallAPI('POST',$url,$data);
		}
		
		public function getEditFaq($faq_id){
			$home = new Home();
			$url = base_url_SLim.'/biketrips/getEditFaq/'.$faq_id;
			// echo $url;die();
			return $home->CallAPI('GET',$url);
		}

		public function updateFaq($data){
			$home = new Home();
			$url = base_url_SLim.'/biketrips/updatetripfaq'; 
			$data['status'] = 0;
			$data['createdBy'] = '1';
			// var_dump(json_encode($data));die;
			return $home->CallAPI('POST',$url,$data);
		}

		public function deleteBikeFaq($data){
			// var_dump(json_encode($data));die();
			$home = new Home();
			$url = base_url_SLim.'/biketrips/updatetripfaqstatus';
			// echo $url;die;
			return $home->CallAPI('POST',$url,$data);
		}
		
		public function getGalleryimages($trip_id){
			$home = new Home();
			$url = base_url_SLim.'/biketrips/getgallery/'.$trip_id;
			// echo $url;die();
			return $home->CallAPI('GET',$url);
		}
		
		public function addgalleryDetails($data){
			$home = new Home();
			$url = base_url_SLim.'/biketrips/addgallery';
			$data['status'] = 0;
			$data['createdBy'] = '1';
			// echo $url;var_dump(json_encode($data));die();
			return $home->CallAPI('POST',$url,$data);
		}

		/* sartaj code*/
		public function get_itinerary_trip($trip_id =""){       
	        $home = new Home();
	        $data = array();
	        $url = base_url_SLim.'/biketrips/gettripitinerary/'.$trip_id;
	        return $home->CallAPI('GET',$url,$data);	      
	    }

	     public function addtripiterinarydata($data){           
	        $home = new home();   
	        $url = base_url_SLim.'/biketrips/addbiketripiterinary';//exit;
	       return $home->CallAPI('POST',$url,$data);          
	    }

	    public function edittripiterinarydata($data){           
	        $home = new Home();   
	       $url = base_url_SLim.'/biketrips/editbiketripiterinary';
	       return $home->CallAPI('POST',$url,$data);          
	    }

	     public function addtrip($data){           
	        $home = new Home();
	       $url = base_url_SLim.'/biketrips/addbiketrip';
	       return $home->CallAPI('POST',$url,$data);          
	    }

	    public function getTrip($trip_id =""){       
	        $home = new Home();
	        $url = base_url_SLim.'/biketrips/getbiketrip/'.$trip_id;
	       return $home->CallAPI('GET',$url);	      
	    }

	    public function edittripdata($data){           
	        $home = new Home();   
	       $url = base_url_SLim.'/biketrips/updatebiketrip';
	       return $home->CallAPI('POST',$url,$data);          
	    }
	    public function deletegallery($data){           
	        $home = new Home();   
	       $url = base_url_SLim.'/biketrips/deletegallery';
	       return $home->CallAPI('POST',$url,$data);          
	    }
	     public function deleteitineraryTrip($data){           
        	$home = new Home();
        	$url = base_url_SLim.'/biketrips/deleteiterinary/'.$data['tripitinerary_id'];
       		return $home->CallAPI('DELETE',$url);          
    	}

		
		
	    


	}

?>