<?php

class ProductController extends Zend_Controller_Action{
    
    public function init() {
       $baseurl=$this->_request->getbaseurl();
       
       
        $this->view->headScript()->appendFile($baseurl.'/jquery.js');
        $this->view->headLink()->appendStylesheet($baseurl.'/css/validationEngine.jquery.css');
        $this->view->headLink()->appendStylesheet($baseurl.'/template/images/MyStyles.css');
        $this->view->headLink()->appendStylesheet($baseurl.'/template/images/styles.css');
        $this->view->headLink()->appendStylesheet($baseurl.'/template/images/juizDropDownMenu.css');
         $this->view->headLink()->appendStylesheet($baseurl.'/template/images/menu_doc.css');
          
        
        $this->view->headScript()->appendFile($baseurl.'/js/jquery-1.8.2.min.js');
        $this->view->headScript()->appendFile($baseurl.'/js/languages/jquery.validationEngine-en.js');
        $this->view->headScript()->appendFile($baseurl.'/js/jquery.validationEngine.js');
        $this->view->headScript()->appendFile($baseurl.'/template/js/juizDropDownMenu-1.5.min.js');
        $this->view->headScript()->appendFile($baseurl.'/template/images/menu_doc.js');
    }
 function  indexAction()
    {
         
         $muser= new Default_Model_Page();
         $id=  $this->_request->getUserParam('id');
           $paginator = Zend_Paginator::factory($muser->list_Products_left($id));
                 //Số user trên một trang
               	$paginator->setItemCountPerPage(20);
                
                //Số trang được hiện ra để click
		$paginator->setPageRange(5);
                
                //Lấy trang hiện tại
		$currentPage = $this->_request->getParam('page',1);
 		$paginator->setCurrentPageNumber($currentPage);
                
                //Truyền dữ liệu ra view
		$this->view->book=$paginator;
                
                $title =$muser->list_Products_title($id);
                $this->view->books=$title;
                
                $this->view->id =$id;
       
      
    }
    function  categoryAction()
    {
         
         $muser= new Default_Model_Page();
         $id=  $this->_request->getUserParam('id');
           $paginator = Zend_Paginator::factory($muser->list_Products_category($id));
                 //Số user trên một trang
               	$paginator->setItemCountPerPage(20);
                
                //Số trang được hiện ra để click
		$paginator->setPageRange(5);
                
                //Lấy trang hiện tại
		$currentPage = $this->_request->getParam('page',1);
 		$paginator->setCurrentPageNumber($currentPage);
                
                //Truyền dữ liệu ra view
		$this->view->book=$paginator;
                
                $title =$muser->list_Products_title_c($id);
                $this->view->books=$title;
       
      
    }
    function  searchAction()
    {
        
                $muser= new Default_Model_Page();
                
                $this->view->purifier = Zend_Registry::get('purifier');
                $conf=  HTMLPurifier_Config::createDefault();
                $purifier = new HTMLPurifier($conf);
                $title = $purifier->purify($this->_request->getParam('title'));
                $category_id = $purifier->purify($this->_request->getParam('category_id'));
                 $parent_id = $purifier->purify($this->_request->getParam('parent_id'));
                 $this->view->bookk=$title;
            
                if ($category_id==""){
                $paginator = Zend_Paginator::factory($muser->search_1($title));
                 //Số user trên một trang
               	$paginator->setItemCountPerPage(15);
                
                //Số trang được hiện ra để click
		$paginator->setPageRange(5);
                
                //Lấy trang hiện tại
		$currentPage = $this->_request->getParam('page',1);
 		$paginator->setCurrentPageNumber($currentPage);
                
                //Truyền dữ liệu ra view
		$this->view->book=$paginator;
                }
                else {
                    
                     $paginator = Zend_Paginator::factory($muser->search_2($title, $parent_id));
                 //Số user trên một trang
               	$paginator->setItemCountPerPage(15);
                
                //Số trang được hiện ra để click
		$paginator->setPageRange(5);
                
                //Lấy trang hiện tại
		$currentPage = $this->_request->getParam('page',1);
 		$paginator->setCurrentPageNumber($currentPage);
                
                //Truyền dữ liệu ra view
		$this->view->book=$paginator;
                }
                
                
               // $title =$muser->list_Products_title($id);
               // $this->view->books=$title;
       
      
    }
    
    
    
    function  detailproductAction()
    { 
        $muser= new Default_Model_Page();
         $id=  $this->_request->getParam('id');
     
      
       
        $pro= $muser->list_detail_products($id);
        $this->view->book=$pro;
        
        $new=$muser->list_Products_New();
        $this->view->bookk=$new;
       // Zend_Registry::getInstance();
      //  echo  $value = Zend_Registry::get('memberss');
         $session = new Zend_Session_Namespace('members');
              $username =$session->members;
        $member=$muser->detail_member($username);
        $this->view->members=$member;
    }
   
}
?>
