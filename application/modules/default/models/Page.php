<?php

class Default_Model_Page {

    function __construct() {
        $this->db = Zend_Registry::get('connectDB');
    }

    function __destruct() {
        $this->db = NULL;
    }

    public function page_1() {

        try {

            $query = "select * from  add_page where cat_page=1 and cat_page_id like '' and active=1 and id not in (51,57,42,74) order by position ASC, id ASC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function page_2($id) {


        try {

            $query = "select * from  add_page where cat_page=1 and cat_page_id=$id and active=1  order by position ASC, id ASC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_page___($id, $limit = "") {


        try {

            $query = "select * from  page where menu=$id and active=1   order by position ASC, id DESC limit $limit ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function page_3($id) {

        try {

            $query = "SELECT * FROM add_page where id like '$id' and active like '1'";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Page_1($id) {

        try {

            $query = "SELECT * FROM add_page where id like '$id' and active=1";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Page_2($id, $limit = "") {

        try {

            $query = "SELECT * FROM page where menu like '$id' and active=1 order by position ASC, id DESC limit $limit";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Page___2($id, $limit = "") {

        try {

            $query = "SELECT * FROM page where menu like '$id' and active=1 order by position ASC, id DESC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Page_search($key) {

        try {

            $query = "SELECT * FROM page where title like '%$key%' and active=1 order by position ASC, id DESC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Page_3($id) {

        try {

            $query = "SELECT * FROM page where id like '$id' order by position ASC, id DESC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Page_4($id, $menu) {

        try {

            $query = "SELECT * FROM page where id <> '$id' and menu like '$menu' and active=1  order by position ASC, id DESC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Products_Nb() {

        try {
            // home like '1' and
            $query = "SELECT * FROM products where  active like '1' and home like '1'  order by position DESC, date DESC limit 0,5";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_side_home() {

        try {

            $query = "SELECT * FROM  side  order by   position  ASC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_page($id) {
        try {

            $query = "SELECT * FROM  add_page where id = $id  order by   position  ASC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_menu_page($id) {

        try {

            $query = "SELECT * FROM add_page where  cat_page_id like '$id' and active like '1'  order by position ASC, id ASC ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Products_title($id) {

        try {

            $query = "SELECT menu.title as title_menu,category.title as title_category,menu.parent_id, category.id as id_category  FROM menu,category where  menu.category_id=category.id and  menu.id = '$id' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_menu_title_2($parent_id) {

        try {

            $query = "SELECT * FROM menu where   menu.id = '$parent_id' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_menu_title_1($id) {

        try {

            $query = "SELECT * FROM menu where   menu.id = '$id' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function kiem_tra_menu_con($id) {
        $sql = "select * from menu where id='$id' and parent_id not like ''";
        $count = $this->db->fetchRow($sql);
        if ($count != 0) {
            return "co";
        } else {
            return "khong";
        }
    }

    function check_menu($id) {
        $sql = "select * from menu where parent_id='$id' ";
        $count = $this->db->fetchRow($sql);
        if ($count != 0) {
            return "co";
        } else {
            return "khong";
        }
    }

    function list_menu($id) {

        try {

            $query = "select * from menu where parent_id='$id' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_Products_title_c($id) {

        try {

            $query = "SELECT * FROM category where  id like '$id' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function qc_home() {

        try {

            $query = "SELECT * FROM add_page where id like '15' and active like '1'";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_detail_products($id) {

        try {

            $query = "SELECT * FROM products where  id like '$id' and active like '1'";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function district($district_id) {

        $query = "SELECT * FROM district where id like '$district_id'";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];
            $category = $result['category'];


            echo $category;
        }
    }

    public function menu($menu_id) {

        $query = "SELECT * FROM menu where id like '$menu_id'";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {

            $title = $result['title'];


            echo $title;
        }
    }

    public function member($member) {
        $view = new Zend_View();
        $base = $view->baseurl();
        $query = "SELECT * FROM products where members like '$member' order by date DESC, id DESC limit 0,5 ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];

            $mystring = $result['date'];
            $findme = '-';
            $pos = strpos($mystring, $findme);
            if ($pos === false) {
                $date = gmdate("d-m-Y", $result['date'] + 7 * 3600);
            } else {
                $date = $result['date'];
            }
            $title = $result['title'];
            $url = khongdau($title);

            echo " <a href=\"$base/chi-tiet/$url-$id.html\" title=\"$title\"> <h5> $title ($date)</h5></a>  ";
        }
    }

    public function list_Products_New() {

        try {
            $id = Zend_Controller_Front::getInstance()->getRequest()->getParam('id');
            $query = "SELECT * FROM products where id like '$id'  ";
            $stml = $this->db->prepare($query);
            $stml->execute();
            while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
                $menu_id = $result['menu_id'];

                $query = "SELECT * FROM products where  active like '1' and menu_id like '$menu_id' and id <> $id order by date DESC, id DESC limit 0,5";

                return $stml = $this->db->fetchAssoc($query);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function detail_member($user) {

        try {


            $query = "SELECT * FROM users where  username like '$user' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function update_views($views, $id) {


        $data = array(
            'views' => $views,
        );
        $this->db->update('products', $data, 'id=' . $id);
    }

    public function top_vip() {
        $view = new Zend_View();
        $base = $view->baseurl();
        $query = "SELECT * FROM products where type like '3' and active like '1' order by date DESC, id DESC limit 0,10 ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];
            $date = $result['date'];
            $title = $result['title'];
            $url = khongdau($title);

            echo " <a href=\"$base/chi-tiet/$url-$id.html\" title=\"$title\"> <h5> $title ($date)<img src=\"$base/template/images/vip.gif\"></h5></a>  ";
        }
    }

    public function views_n() {
        $view = new Zend_View();
        $base = $view->baseurl();
        $query = "SELECT * FROM products where  active like '1' order by views DESC,date DESC, id DESC limit 0,10 ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];
            $views = $result['views'];
            $title = $result['title'];
            $url = khongdau($title);

            echo " <a href=\"$base/chi-tiet/$url-$id.html\" title=\"$title\"> <h5> $title ($views)</h5></a>  ";
        }
    }

    public function top_hot() {
        $view = new Zend_View();
        $base = $view->baseurl();
        $query = "SELECT * FROM products where active like '1' order by RAND() limit 0,10 ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];
            $date = $result['date'];
            $title = $result['title'];
            $url = khongdau($title);

            echo " <a href=\"$base/chi-tiet/$url-$id.html\" title=\"$title\"> <h5> $title <img src=\"$base/template/images/HOT2.gif\"></h5></a>  ";
        }
    }

    public function top_km() {
        $view = new Zend_View();
        $base = $view->baseurl();
        $query = "SELECT * FROM products where type like '4' and active like '1' order by date DESC, id DESC limit 0,10 ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];
            $date = $result['date'];
            $title = $result['title'];
            $url = khongdau($title);

            echo " <a href=\"$base/chi-tiet/$url-$id.html\" title=\"$title\"> <h5> $title </h5></a>  ";
        }
    }

    public function list_category() {
        $view = new Zend_View();
        $base = $view->baseurl();
        $query = "SELECT * FROM category order by id ASC ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        echo "<select name=\"category_id\" id='category_id' class='form_tk' style=\"float: left;margin: 2px 10px 0px 0px\">";
        echo "<option value=\"\">
				------ Chọn danh mục gốc ------
			</option>";

        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {

            $title = $result['title'];
            $id = $result['id'];

            echo "<option value=\"$id\">
				$title
			</option>";
        }
        echo "</select>";
    }

    public function search_1($title) {

        try {

            $query = "SELECT * FROM products  where  title like '%$title%' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function search_2($title, $parent_id) {

        try {

            $query = "SELECT * FROM products  where menu_id = '$parent_id' and title like '%$title%' ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_menu_price() {

        try {

            $query = "SELECT * FROM add_page where  cat_page_id  = 12 ";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function check_menu_con($id) {
        $sql = "select * from add_page where cat_page_id='$id'";
        $count = $this->db->fetchRow($sql);
        if ($count != 0) {
            return "co";
        } else {
            return "khong";
        }
    }

    public function list_Page_67($id) {

        try {

            $query = "SELECT * FROM add_page where cat_page_id like '$id' and active=1 and cat_page=1";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function page_sildeshow() {
        $view = new Zend_View();
        $base = $view->baseUrl();
        echo "
   <link rel=\"stylesheet\" href=\"$base/template/js_side/nivo-slider.css\" type=\"text/css\" media=\"all\" />
       <link rel=\"stylesheet\" href=\"$base/template/js_side/style_1.css\" type=\"text/css\" media=\"all\" />     
";
        echo "
        <div id=\"slider\" class=\"nivoSlider\">";




        $query = "SELECT * FROM side  order by position ASC limit 0,10 ";
        $stml = $this->db->prepare($query);
        $stml->execute();
        while ($result = $stml->fetch(PDO::FETCH_ASSOC)) {
            $id = $result['id'];
            $images = $result['images'];
            $title = $result['title'];
            $description = nl2br($result['description']);
            $link = $result['link'];


            // cache


            echo " 
             
                
                    <img src=\"$base/Upload/$images\"  alt=\"$title\" title=\"$title\" data-transition=\"fade\" />
                    
                

                ";


            //Zend_Registry::get('Cache')->remove('main_menu');
        }




        echo "</div> ";
        echo " <script type=\"text/javascript\" src=\"$base/template/js_side/jquery-1.4.3.min.js\"></script>";
        echo " <script type=\"text/javascript\" src=\"$base/template/js_side/jquery.nivo.slider.pack.js\"></script>";
        echo "<script type=\"text/javascript\">
                    $(window).load(function() {
                    $('#slider').nivoSlider();
                    });
                </script>";
    }

    public function list_sildeshow() {
        try {

            $query = "SELECT * FROM side  order by position ASC limit 0,10";

            return $stml = $this->db->fetchAssoc($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function list_comment($id) {
        try {
            $query = "SELECT * FROM comment where page_id = $id and child_comment_id=0 order by comment_id DESC ";
            $stml = $this->db->fetchAll($query);
           
            for ($i = 0; $i < count($stml); $i ++) { 
              $check =  $this->list_comment_child($id,$stml[$i]['comment_id']);
              if(!empty($check))
                  $stml[$i]['child']=$check;
            }
            return $stml;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    private function list_comment_child($id,$comment_id) {
        try {
            $query = "SELECT * FROM comment where page_id = $id and child_comment_id=$comment_id order by comment_id ASC ";
            return $stml = $this->db->fetchAll($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function save_commnent($data,$link="") {
        $id = $this->db->insert("comment", $data);
        
        if(!empty($id)){
               require_once ('ham/class.phpmailer.php');
         $mail = new PHPMailer(); //khoi tao doi tuong
        $mail->IsSMTP();  //Goi den class xu ly SMTP
        $mail->SMTPDebug = 0;     // enables SMTP debug information (// 1 = errors and messages
        // 2 = messages only)
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->CharSet = "UTF-8";
        $mail->Username = "dadichvu.88@gmail.com"; // SMTP account username
        $mail->Password = "itwebsite";            // SMTP account password
        $mail->SetFrom('myphamkangnam@gmail.com', 'Mỹ Phẩm Sakura');

        $mail->AddAddress($data['email'], $data['full_name']);
        $mail->AddCC('tuankangnam@gmail.com', 'Tuấn Hoàng Anh');
        $mail->AddBCC('lynguyetvan88@gmail.com', 'Ly Le');

        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = 'Bình luận đánh giá sản phẩm sakura';
      
        $html = "<p><strong>Chào $data[full_name]</strong>, Cảm ơn bạn đã tham gia bình luận trên website chúng tôi</p>"
                . "<p>Nội dung bình luận:".$data['comment']."</p>"
                . "<p>Hệ thống sẽ cập nhật và trả lời bạn trong vòng 24h.</p>"
                . "<p>Liên kết bình luận : http://".$link."</p>"
                
                . "<p><strong>Hotline: 0979 45 20 90</strong></p>"
                
                . "";
        $mail->Body = "$html";
        $mail->Send();

        }
        return $id;
    }

}
