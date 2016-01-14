<?php

class AjaxController extends Zend_Controller_Action
{
     public function ajaxAction()
        {
            $this->_helper->layout->disablelayout(true);
            $this->_helper->viewRender->setNoRender(true);
            echo $this->view->render('ajax.phtml');
            exit;
        }
}
