<?php

// Zend_View_Helper co dinh
class Zend_View_Helper_Footer extends Zend_View_Helper_Abstract
{
    public $view;
    public function  footer()
    {
        
         
         $cnDB= Zend_Registry::get('connectDB');  
            $query_1="SELECT * FROM he_thong where id like '1'";
            $stml_1= $cnDB->prepare($query_1);
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
    
    
    
     
    public function setView(Zend_View_Interface $view) {
        $this->view=$view;
       
    }
}


