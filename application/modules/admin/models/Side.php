<?php

class Admin_Model_Side {
     function __construct() {
        $this->db=  Zend_Registry::get('connectDB');      
       
        
        
        
    }
    function __destruct() {
        $this->db=NULL;
    }
    public function list_side()
    {
       
    
         try {
            
               $query="SELECT * FROM `side`";
       
              return  $stml=$this->db->fetchAssoc($query);
             
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }


    }
     public function list_side_1($id)
    {
       
        try {
            
               $query="SELECT * FROM side where id like '$id'";
       
                //$stml=$this->db->fetchAssoc($query);
               return  $stml=$this->db->fetchAssoc($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

       

       
    }
    public function insert_side($images, $title, $description, $link, $position)
	{
        
		$data=array(
		'images'  =>$images,
		'title'   =>$title,
		'description' =>$description,
                'link' =>$link,
                'position' =>$position,
               
		);
                $this->db->insert('side', $data);
		
                
                
	}
        public function update_side($images, $title, $description, $link, $position,$id)
	{
                $data=array(
		'images'  =>$images,
		'title'   =>$title,
		'description' =>$description,
                'link' =>$link,
                'position' =>$position,
		);
                $this->db->update('side', $data, 'id='.$id);
                
	}
        
         public function delete_support($id)
	{
        
       
          
         
                  $this->db->delete('side',  'id='.$id);
	}
}
?>
