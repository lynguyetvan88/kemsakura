<?php

// Zend_View_Helper co dinh
class Zend_View_Helper_Menu extends Zend_View_Helper_Abstract {

    public $view;

    public function menu() {
        $view = new Zend_View();
        $base = $view->baseurl();
        //  $this->chamsocda();

        $this->menu_doc();
    }

    function menu_doc() {
        $vie = new Zend_View();
        $base = $vie->baseurl();

        $list = new Default_Model_Menuright();
        // $list1= $list->page_1();
        //  $list1=$list1[0]['title'];
        // $list2= $list->page_2();


        $cnDB2 = Zend_Registry::get('connectDB');

        $tv1 = "select * from  add_page where cat_page=1 and cat_page_id like '' and active=1 and id not in (51,57) order by position ASC, id ASC  ";
        $stml2 = $cnDB2->prepare($tv1);
        $stml2->execute();



        $stt = 1;
        echo "
     <link rel=\"stylesheet\" type=\"text/css\" href=\"$base/template/css/style_mn.css\" />
  
 <div class=\"webtmtbar webtmtnav\">
      <div class=\"webtmtnav-outer\">
        
    <ul class=\"webtmthmenu\">";
        echo " <li> <a href=\"$base\"> Trang chủ </a></li>";
        echo " <li> <a href=\"$base/pages/gioi-thieu-6.html\"> Giới thiệu </a></li>";
//         echo  " <li> <a href=\"javascript:void(0>\)\"> Sản phẩm </a>"
//                   . "<ul>"
//                   . "<li><a href='#'>sds</a></li>"
//                   . ""
//                   . ""
//                   . "</ul>"
//                   . "</li>";
        echo " <li> <a href=\"$base/pages/gioi-thieu-12.html\"> Giấy chứng nhận </a></li>";
        echo " <li> <a href=\"$base/pages/gioi-thieu-42.html\"> Blog làm đẹp </a>";
        echo " <li> <a href=\"$base/lien-he.html\" > Liên hệ </a></li>";
        echo"  </ul>";
        echo"  
      </div>
    </div>";
    }

    function xacdinh_menu_con_doc($id) {
        $cnDB = Zend_Registry::get('connectDB');
        $query = "select * from add_page where  cat_page_id='$id' and active=1 order by position asc";
        $stml = $cnDB->prepare($query);
        $stml->execute();
        $result = $stml->rowCount();
        // echo $result;
        if ($result != 0) {
            return "co";
        } else {
            return "khong";
        }
    }

    function dequy_menu_doc($id) {
        $vie = new Zend_View();
        $base = $vie->baseurl();
        $cnDB1 = Zend_Registry::get('connectDB');
        $tv = "select * from add_page where cat_page_id='$id' and active=1 order by position ASC";
        $stml1 = $cnDB1->prepare($tv);
        $stml1->execute();

        while ($result1 = $stml1->fetch(PDO::FETCH_ASSOC)) {
            $id = $result1['id'];
            $ten = $result1['title'];
            $url = khongdau($ten);
            $link_menu = "$base/pages/$url-$id.html";
            echo "<li>";
            echo "<a href=\"$link_menu\">";
            echo $result1['title'];
            echo "</a>";
            $xacdinh_menu_con_doc = $this->xacdinh_menu_con_doc($id);
            if ($xacdinh_menu_con_doc == "co") {
                echo "<ul>";
                $this->dequy_menu_doc($id);
                echo "</ul>";
            } else {
                
            }
            echo "</li>";
        }
    }

    public function setView(Zend_View_Interface $view) {
        $this->view = $view;
    }

}
