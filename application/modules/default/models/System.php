<?php


class Default_Model_System {
    public $db;
    function __construct() {
        $this->db=  Zend_Registry::get('connectDB');      
       
    
        
    }
    function __destruct() {
        $this->db=NULL;
    }
    public function list_system()
    {
       try {    $query="SELECT * FROM he_thong where id like '1'";
       
                //$stml=$this->db->fetchAssoc($query);
               return  $stml=$this->db->fetchAll($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

       

       
    }
    public function contact($fullname,$address,$phone,$email,$title,$content)
    {
       
       $data=array(
		'fullname'  =>$fullname ,
		'title'   =>$title,
		'content' =>$content,
                'email' =>$email,
                'fax' =>'',
                'images' =>'',
                'phone' =>$phone,
               
                'address' =>$address,
		);
                $this->db->insert('contact', $data);

       

       
    }
    
    
     public function news()
    {
       
        try {       
               $query="SELECT * FROM he_thong where id like '1'";
       
                //$stml=$this->db->fetchAssoc($query);
               return  $stml=$this->db->fetchAssoc($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
       
    }
    
     public function list_menu_page()
    {
       
        try {       
               $query="select * from  add_page where cat_page=1 and cat_page_id like '' and active=1 and id not in (51,57) order by position ASC, id ASC ";
       
                //$stml=$this->db->fetchAssoc($query);
               return  $stml=$this->db->fetchAssoc($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
       
    }
    
    
    public function meta()
    {
        $df=" | ";
           $ctrol=  Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
       $ac=  Zend_Controller_Front::getInstance()->getRequest()->getActionName();
     
       
        switch ($ctrol) {
            // controler
            case 'index':
                switch ($ac) {
                // action
                    case 'index':
                        $this->meta_index();

                        break;
                    case 'contact':
                        echo "<title>Liên hệ $df</title>";
             echo "<meta name=\"description\" content=\"Liên hệ\" />
                 <meta name=\"keywords\" content=\"Liên hệ $df\" />";
                        break;

                    default:
                         $this->meta_index();
                        break;
                }  

                break;
            
            
            
            case 'page':
                switch ($ac) {
                    case 'page':
                        $this->meta_page();
                        break;
                    case 'detailpage':
                        $this->meta_detailpage();
                        break;

                    default:
                         $this->meta_index();
                        break;
                }  

                break;
            
            
            
            case 'register':
                switch ($ac) {
                    case 'index':
                        echo "<title>Đăng ký thành viên $df</title>";
             echo "<meta name=\"description\" content=\"Đăng ký thành viên\" />
                 <meta name=\"keywords\" content=\"Đăng ký thành viên $df\" />";
                        break;
                    
                    
                    case 'login':
                        echo "<title>Đăng nhập $df</title>";
             echo "<meta name=\"description\" content=\"Đăng nhập $df\" />
                 <meta name=\"keywords\" content=\"Đăng nhập $df\" />";
                        break;

                    default:
                         $this->meta_index();
                        break;
                }  

                break;
            
             case 'product':
                switch ($ac) {
                    case 'index':
                        $this->meta_product();
                        break;
                    case 'detailproduct':
                        $this->meta_detailproduct();
                        break;

                    default:
                         $this->meta_index();
                        break;
                }  

                break;
            
            default:
                 $this->meta_index();
                break;
        }
        
    }
    public function meta_index()
    {
        try {
            
               $query="SELECT * FROM he_thong where id like '1'";
       
                //$stml=$this->db->fetchAssoc($query);
                 $stml=$this->db->prepare($query);
                   
            
            $stml->execute();

             $result=$stml->fetch(PDO::FETCH_ASSOC);
             $dis=$result['dis'];
             $key=$result['key'];
             echo "<title>".$result['tieude']."</title>";
             echo "<meta name=\"description\" content=\"$dis\" />
                 <meta name=\"keywords\" content=\"$key\" />";
                 
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function meta_page()
    {
        $df="";
        try {
              $id=Zend_Controller_Front::getInstance()->getRequest()->getParam('id');
            
               $query="SELECT * FROM add_page where id like '$id'";
       
                //$stml=$this->db->fetchAssoc($query);
                 $stml=$this->db->prepare($query);
                   
            
            $stml->execute();

             $result=$stml->fetch(PDO::FETCH_ASSOC);
             $dis=$result['dis'];
             $key=$result['key'];
             echo "<title>".$result['title']." $df</title>";
             echo "<meta name=\"description\" content=\"$dis\" />
                 <meta name=\"keywords\" content=\"$key $df\" />";
                 
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function meta_product()
    {
         $df="";
        try {
              $id=Zend_Controller_Front::getInstance()->getRequest()->getParam('id');
            
               $query="SELECT * FROM menu where id like '$id'";
       
                //$stml=$this->db->fetchAssoc($query);
                 $stml=$this->db->prepare($query);
                   
            
            $stml->execute();

             $result=$stml->fetch(PDO::FETCH_ASSOC);
             $dis=$result['dis'];
             $key=$result['key'];
             echo "<title>".$result['title']."$df</title>";
             echo "<meta name=\"description\" content=\"$dis\" />
                 <meta name=\"keywords\" content=\"$key $df\" />";
                 
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function meta_detailproduct()
    {
         $df=" ";
        try {
              $id=Zend_Controller_Front::getInstance()->getRequest()->getParam('id');
            
               $query="SELECT * FROM products where id like '$id'";
       
                //$stml=$this->db->fetchAssoc($query);
                 $stml=$this->db->prepare($query);
                   
            
            $stml->execute();

             $result=$stml->fetch(PDO::FETCH_ASSOC);
             $dis=$result['dis'];
             $key=$result['key'];
             echo "<title>".$result['title']." $df</title>";
             echo "<meta name=\"description\" content=\"$dis\" />
                 <meta name=\"keywords\" content=\"$key $df\" />";
                 
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
     public function meta_detailpage()
    {
         $df="  ";
        try {
              $id=Zend_Controller_Front::getInstance()->getRequest()->getParam('id');
            
               $query="SELECT * FROM page where id like '$id'";
       
                //$stml=$this->db->fetchAssoc($query);
                 $stml=$this->db->prepare($query);
                   
            
            $stml->execute();

             $result=$stml->fetch(PDO::FETCH_ASSOC);
             $dis=$result['dis'];
             $key=$result['key'];
             echo "<title>".$result['title']."$df</title>";
             echo "<meta name=\"description\" content=\"$dis\" />
                 <meta name=\"keywords\" content=\"$key $df\" />";
                 
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
    public function list_category()
    {
       try {    $query="SELECT * FROM  category order by id ASC";
       
                //$stml=$this->db->fetchAssoc($query);
               return  $stml=$this->db->fetchAssoc($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

       

       
    }
     public function list_service($id)
    {
       try {    $query="SELECT * FROM  add_page where cat_page_id =$id and active=1 order by id ASC";
       
                //$stml=$this->db->fetchAssoc($query);
               return  $stml=$this->db->fetchAssoc($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

 
       
    }
    public function  footer()
    {
        
         
        // $cnDB= Zend_Registry::get('connectDB');  
            $query_1="SELECT * FROM he_thong where id like '1'";
            $stml_1= $this->db->prepare($query_1);
            $stml_1->execute();
            $result_1=$stml_1->fetch(PDO::FETCH_ASSOC);
        
        $cache = Zend_Registry::get('Cache');
        if (!$result___123 = $cache->load('footer')) {
           
            $result___123= $result_1['footer'];
            
            $cache->save($result___123,'footer');
            //Zend_Registry::get('Cache')->remove('main_menu');
            
        }
        echo($result___123);
        
        
       
    }
    
 public function list_menu_doc($id)
    {
       try {    $query="select * from  add_page where cat_page=1 and active=1 order by id";
       
               return  $stml=$this->db->fetchAll($query);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

 
       
    }
}
?>
