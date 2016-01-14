<?php

class PageController extends Zend_Controller_Action {

    public function init() {
        $baseurl = $this->_request->getbaseurl();
        $this->view->headTitle('hello');

        $this->view->headScript()->appendFile($baseurl . '/jquery.js');
        $this->view->headLink()->appendStylesheet($baseurl . '/css/validationEngine.jquery.css');
        $this->view->headLink()->appendStylesheet($baseurl . '/template/images/MyStyles.css');
        $this->view->headLink()->appendStylesheet($baseurl . '/template/images/styles.css');
        $this->view->headLink()->appendStylesheet($baseurl . '/template/images/juizDropDownMenu.css');
        $this->view->headLink()->appendStylesheet($baseurl . '/template/images/menu_doc.css');


        $this->view->headScript()->appendFile($baseurl . '/js/jquery-1.8.2.min.js');
    }

    function indexAction() {
        
    }

    function demoAction() {
        echo 65438685;
    }

    function pageAction() {
        //echo 133; die;
        $system = new Default_Model_Page();
        $id = $this->_request->getParam('id');
        $this->view->id = $id;
        $list = $system->page_3($id);
        $this->view->books = $list;


        $list_1 = $system->list_Page_1($id);
        $this->view->bookss = $list_1;
        $paginator = Zend_Paginator::factory($system->list_Page___2($id));
        $paginator->setItemCountPerPage(15);
        $paginator->setPageRange(5);
        $currentPage = $this->_request->getParam('page', 1);
        $paginator->setCurrentPageNumber($currentPage);
        $this->view->booksss = $paginator;
    }

    function searchAction() {

        $this->_helper->layout->disableLayout();
        $system = new Default_Model_Page();
        $this->view->purifier = Zend_Registry::get('purifier');
        $conf = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($conf);
        $key = $purifier->purify($this->_request->getParam('key'));


        $paginator = Zend_Paginator::factory($system->list_Page_search($key));
        $paginator->setItemCountPerPage(20);
        $paginator->setPageRange(5);
        $currentPage = $this->_request->getParam('page', 1);
        $paginator->setCurrentPageNumber($currentPage);
        $this->view->booksss = $paginator;
    }

    function pagepriceAction() {


        $system = new Default_Model_Page();
        $id = $this->_request->getParam('id');
        $this->view->id = $id;
        $list = $system->page_3($id);
        $this->view->books = $list;


        $list_1 = $system->list_Page_1($id);
        $this->view->bookss = $list_1;
        $paginator = Zend_Paginator::factory($system->list_Page_2($id));
        $paginator->setItemCountPerPage(10);
        $paginator->setPageRange(5);
        $currentPage = $this->_request->getParam('page', 1);
        $paginator->setCurrentPageNumber($currentPage);
        $this->view->booksss = $paginator;


        $this->view->menu_price = $system->list_menu_price();
    }

    public function detailpageAction() {
        $system = new Default_Model_Page();
        $id = $this->_request->getParam('id');
        $this->view->id = $id;
        $menu = $this->_request->getParam('menu');
        $this->view->menu = $menu;
        $list = $system->page_3($menu);
        $this->view->books = $list;


        $list_1 = $system->list_Page_1($id);
        $this->view->bookss = $list_1;
        $paginator = Zend_Paginator::factory($system->list_Page_3($id));
        $paginator->setItemCountPerPage(10);
        $paginator->setPageRange(5);
        $currentPage = $this->_request->getParam('page', 1);
        $paginator->setCurrentPageNumber($currentPage);
        $this->view->booksss = $paginator;


        $list_3 = $system->list_Page_4($id, $menu);
        $this->view->bookk = $list_3;
        $comment = $system->list_comment($id);
        
          $this->view->comment = $comment;
        
    }

    public function commentAction() {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $full_name = "";
        } else {
            $infoUser = $auth->getIdentity();
            $full_name = $infoUser->full_name;
        }
       
        $system = new Default_Model_Page();
        $this->view->purifier = Zend_Registry::get('purifier');
        $conf = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($conf);
         $comment_id = $purifier->purify($this->_request->getParam('comment_id'));
        if(empty($comment_id)){
            $comment_id=0;
        }
        $link=$purifier->purify($this->_request->getParam('link'));
        $data = array(
            "comment" => $purifier->purify($this->_request->getParam('content')),
            "email" => $purifier->purify($this->_request->getParam('email')),
            "full_name" => $purifier->purify($this->_request->getParam('full_name')),
            "page_id" => $purifier->purify($this->_request->getParam('id')),
            "user_name" => $full_name,
            "date_create" => time(),
            "child_comment_id" => $comment_id,
            
        );
        echo $system->save_commnent($data,$link);
        die();
    }

}

?>
