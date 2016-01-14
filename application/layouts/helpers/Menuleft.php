<?php

// Zend_View_Helper co dinh
class Zend_View_Helper_Menuleft extends Zend_View_Helper_Abstract
{
    public $view;
    public $_db;
    function __construct() {
        $this->_db=Zend_Registry::get('connectDB');  
    }

    public function  menuleft()
    {
        
         $this->menu_doc();
        
     // $this->hot_product();
         $this->suppor_online();
          // $this->web_link();
         $this->cach_thuc_mua_hang();
       //  $this->web_link();
          
       
       
    }
    function cach_thuc_mua_hang() 
    {
        
        
        echo "<div class=\"title1\" align=\"center\">
                <div style=\"padding-top:10px;\" >Cách thức mua hàng</div>
                </div>";
       
         echo "<div class=\"hotro\">";
          
               $video= new Default_Model_Menuright();
               $video->cach_thuc_mua_hang();
                   echo "<div class='clear'></div>";
         echo "</div>";
      
            
        
    }
     function menu_doc() 
    {
        $vie= new Zend_View();
        $base= $vie->baseurl();
       echo"<link href=\"$base/template/menu/styles.css\" rel=\"stylesheet\" type=\"text/css\"/>
<script src=\"http://code.jquery.com/jquery-latest.min.js\" type=\"text/javascript\"></script>
";

     
         echo" <div class=\"title1\">
        <div style=\"padding-top:10px;\" align=\"center\">Danh mục sản phẩm</div>
        </div>";
       
        echo "<div id='cssmenu'>
 <ul>";
        
        $cnDB2= Zend_Registry::get('connectDB'); 
       
            $tv1="select * from  add_page where cat_page=1 and active=1 and id not in (42,12,6) order by id  "; 
             $stml2= $cnDB2->prepare($tv1); 
            $stml2->execute();
          
            
             
	$stt=1;
	 while ($tv_21=$stml2->fetch(PDO::FETCH_ASSOC)) { 
            
	 $dm=$tv_21['id'];

			$danhmuc=$tv_21['title'];
                      
					 $url__=  khongdau($danhmuc);
			
			
  echo"<li class='has-sub'><a href=\"$base/pages/$url__-$dm.html\" title=\"$danhmuc\"><span>$danhmuc</span></a>
";
		
       
			
				
                                $tv11="select * from page where menu like '$dm' and  active=1 order by position asc";
                                $stml21= $cnDB2->prepare($tv11);
                                $stml21->execute();
                               
                                if (!empty($stml21)){
                                    echo "<ul>";
				while ( $tv_2=$stml21->fetch(PDO::FETCH_ASSOC)) 
				{
                                    //var_dump($tv_2);exit;
					$id=$tv_2['id'];
                                        $menu=$tv_2['menu'];
					$ten=$tv_2['title'];
					 $url=  khongdau($ten);
					$link_menu="$base/trang/$url-$id-$menu.html";
					echo "<li>";
						echo "<a href=\"$link_menu\" title=\"$ten\">"; 
							echo  $tv_2['title'];
						echo "</a>";
						$xacdinh_menu_con_doc=  $this->xacdinh_menu_con_doc($id);
						if($xacdinh_menu_con_doc=="co")
						{
							echo "<ul>";
                                                        $this->dequy_menu_doc($id);
							echo "</ul>";
						}
						else
						{
						}
					echo "</li>";
				}
                                echo "</ul>";
                                }
			
            
                                
                 
        
                $stt++;} 

  	echo "</ul></div>";  
    }
    function xacdinh_menu_con_doc($id)
    {       $cnDB= Zend_Registry::get('connectDB'); 
            $query="select * from menu where parent_id='$id' and active=1 order by position asc";
            $stml= $cnDB->prepare($query);
            $stml->execute();
            $result=$stml->rowCount();
           // echo $result;
            if($result!=0){return "co";}else{return "khong";}
    }
    function dequy_menu_doc($id)
    {
            $vie= new Zend_View();
        $base= $vie->baseurl();
            $cnDB1= Zend_Registry::get('connectDB'); 
            $tv="select * from menu where parent_id='$id' and active=1 order by position ASC";
             $stml1= $cnDB1->prepare($tv);
            $stml1->execute();

             while ($result1=$stml1->fetch(PDO::FETCH_ASSOC)) {
                    $id=$result1['id'];
                    $ten=$result1['title'];
                     $url=khongdau($ten);
                    $link_menu="$base/danh-muc/$url-$id.html";
                    echo "<li>";
                            echo "<a href=\"$link_menu\">";
                                    echo $result1['title'];
                            echo "</a>";
                            $xacdinh_menu_con_doc=  $this->xacdinh_menu_con_doc($id);
                            if($xacdinh_menu_con_doc=="co")
                            {
                                    echo "<ul>";
                                    $this->dequy_menu_doc($id);
                                    echo "</ul>";
                            }
                            else
                            {
                            }
                    echo "</li>";
            }
    }
   

function suppor_online ()
    {
       echo" <div class=\"title1\">
        <div style=\"padding-top:10px;\" align=\"center\">Tư Vấn Bán Hàng</div>
        </div>
        <div class=\"hotro\" align=\"center\">";
  
           $page = new Default_Model_Page(); $hotline = $page->page_3(57); 
 foreach ($hotline as $value) {
    echo $value['content'];
} 

echo"<div style=\"clear:both; height:5px;\"></div>
</div>";



  }

    function web_link ()
    {
        echo "<SCRIPT language=\"JavaScript\">
function DD_jumpMenu(targ,selObj,restore){
var s = selObj.options[selObj.selectedIndex].value;
window.open(s);
if (restore) selObj.selectedIndex=0;
}
</SCRIPT> ";
         echo" <div class=\"title1\">
        <div style=\"padding-top:10px;\" align=\"center\">Liên kết website</div>
        </div>
        <div class=\"hotro\">";
        echo"   <div style=\"clear:both; height:10px;\"></div>";
         echo "<select onchange=\"DD_jumpMenu('parent',this,0)\" style=\"width:200px; margin-left:10px\"> ";
         echo "<option value=\"\">----- Chọn liên kết ------</option> ";
            $cndb=$this->_db;
	     $tv="select * from  link_web  order by id";
             $stml= $cndb->prepare($tv);
	    $stml->execute();
	
	  	while ($tv_2=$stml->fetch(PDO::FETCH_ASSOC)) 
		{
		    

			$title=$tv_2['title'];
			$link=$tv_2['link'];
			
			
			
			
            echo "<option value=\"$link\">$title</option> ";
 } 
echo"</select>";
 echo"   <div style=\"clear:both; height:10px;\"></div>";
echo"</div>";

    }
function Cart() 
    {
         echo "<div class=\"title2\">
<div style=\"padding-top:10px;\" align=\"center\">GIỎ HÀNG</div>
</div>
<div class=\"hotro\" align=\"center\">

<BR />";
       	 $yourCart = new Zend_Session_Namespace('cart');
         
         $ssInfo = $yourCart->getIterator();
                 // var_dump($ssInfo); exit;
         if(isset($ssInfo['cart'])){
                $cart = new Default_Model_Cart();
             
                $cart->cart_order($ssInfo['cart']);
        
               
         }
 else { echo "Hiện chưa có sản phẩm nào trong giỏ hàng";}
echo "</div>";         
        
    }
    function hot_product ()
    {
        $vie= new Zend_View();
        $base= $vie->baseurl();
       
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$base/template/css/sagscroller.css\" />
<script src=\"$base/template/js/sagscroller.js\"></script><script src=\"$base/template/js/jquery-1.7.2.min.js\"></script>";
        echo "<script>

                

                var sagscroller1=new sagscroller({
                id:'mysagscroller',
                mode: 'auto', //<--no comma following last option
                pause: 1000,
                animatespeed: 3000
                })

               

                </script>
                ";
         echo" <div class=\"title1\">
        <div style=\"padding-top:10px;\" align=\"center\">Liên kết</div>
        </div>";
          echo"<div class=\"hotro\">
              
            <div id=\"mysagscroller\" class=\"sagscroller\">
<ul>
            ";
          $cndb=$this->_db;
	     $tv="select * from page  where menu=57 and active=1 order by id";
            
             $stml= $cndb->prepare($tv);
	    $stml->execute();
	// echo 123; die;
	  	while ($tv_2=$stml->fetch(PDO::FETCH_ASSOC)) 
		{
		    
                        $id=$tv_2['id'];
			$title=$tv_2['title'];
			$images=$tv_2['images'];
                        $url=  khongdau($title);
                         $mask = APPLICATION_PATH."/../Upload/$images"; 
                        if (file_exists($mask)){
                            $images=$tv_2['images'];
                        } else {
                             $images="no-img.png";
                        }
                        $link="$base/chi-tiet/$url-$id.html";
                        echo "<li><a href=\"$link\" title='$title'><img src=\"$base/Upload/$images\" title='$title' alt='$title' /><br />$title</a></li>"; 
                }
          echo"</ul></div></div>";
           echo " <script type=\"text/javascript\" src=\"$base/template/js_side/jquery-1.4.3.min.js\"></script>";
         echo " <script type=\"text/javascript\" src=\"$base/template/js_side/jquery.nivo.slider.pack.js\"></script>";
         echo "<script type=\"text/javascript\">
                    $(window).load(function() {
                    $('#slider').nivoSlider();
                    });
                </script>";
        
    }
    
    public function setView(Zend_View_Interface $view) {
        $this->view=$view;
       
    }
}

