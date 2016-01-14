<?php

class IndexController extends Zend_Controller_Action{
    
    public function init() {
       $baseurl=$this->_request->getbaseurl();
       //$this->view->headTitle('hello');
       
        //$this->view->headScript()->appendFile($baseurl.'/jquery.js');
        $this->view->headLink()->appendStylesheet($baseurl.'/css/validationEngine.jquery.css');
       // $this->view->headLink()->appendStylesheet($baseurl.'/template/images/MyStyles.css');
        $this->view->headLink()->appendStylesheet($baseurl.'/template/images/styles.css');
     
    }

  
    
      function  indexAction()
    {
        
        $muser= new Default_Model_Page();
        $conten=$muser->page_1();
        $qc=$muser->list_page(52);
        $this->view->list=$conten;
        $this->view->qc=$qc;
        
        $side=$muser->list_side_home();
        $this->view->side=$side;
        
    }
    function  sitemapAction()
    {
        
      
        
    }
    function  contactAction()
    {
        $muser= new Default_Model_System();
        $conten=$muser->list_system();
        $this->view->book=$conten;
        
        $captcha = new Zend_Captcha_Image();
        $vi=new Zend_View();
        $base=$vi->baseurl();
       if(!$this->_request->isPost()){
           $captcha->setTimeout('300')               
                 ->setWordLen('4')
                 ->setHeight('50')        
                 ->setWidth('320')   
                 ->setImgDir(APPLICATION_PATH . '/../captcha/images/')
                 ->setImgUrl($base.'/captcha/images/')
                 ->setFont(APPLICATION_PATH .'/../font/UTM-Avo.ttf'); 
         
          $captcha->generate(); 
          $this->view->captcha = $captcha->render($this->view);  
          $this->view->captchaID = $captcha->getId();
            // Dua chuoi Captcha vao session
          $captchaSession = new Zend_Session_Namespace('Zend_Form_Captcha_' . $captcha->getId());
          $captchaSession->word = $captcha->getWord();
          
      }else{
                  
         $captchaID = $this->_request->captcha_id; 
         
         $captchaSession = new Zend_Session_Namespace('Zend_Form_Captcha_' . $captchaID);
         $captchaIterator = $captchaSession->getIterator();
         $captchaWord = $captchaIterator['word'];

         if($this->_request->captcha == $captchaWord){
                       
            $this->view->purifier = Zend_Registry::get('purifier');
            $conf=  HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($conf);
            $fullname = $purifier->purify($this->_request->getParam('fullname'));
            $address= $purifier->purify($this->_request->getParam('address'));
            $phone = $purifier->purify($this->_request->getParam('phone'));
            $email = $purifier->purify($this->_request->getParam('email'));
            $content = $purifier->purify($this->_request->getParam('content'));
            $title = $purifier->purify($this->_request->getParam('title'));
            $emaillh = $purifier->purify($this->_request->getParam('emaillh'));
            
            $tinnhan="
			Họ tên : $fullname <br>
			Email : $email<br>
			Địa chỉ : $address<br>
			Điện thoại : $phone<br>
			
			Nội dung : $content<br>";
            
            $to      = $emaillh;
            $subject = $title;
            $message = $tinnhan;
            $headers = 'Content-type: text/html;charset=utf-8';
	   // mail($to, $subject, $message, $headers);
         //$html ="<img title=\"夕食：ル・バンドーム（フランス料理）\" alt=\"夕食：ル・バンドーム（フランス料理）\" src=\"http://toursystem.biz/uploads/product/1378725993LE_VENDOME_12.jpg\">";
//         $mail = new Zend_Mail('UTF-8');        
//          $mail->setBodyHtml("$tinnhan");
//          $mail->setFrom("$email", "$title");
//          $mail->addTo("lynguyetvan88@gmail.com", 'Ly Le');
//          $mail->addTo("$emaillh", "$fullname");
//          $mail->setSubject("Thông tin liên hệ  ngày  : ".date("F j, Y"));
//          $mail->send(); 
            	 // Thiết lập SMTP Server
					require('ham/class.phpmailer.php'); 
                                        require('ham/class.pop3.php');// nạp thư viện
					$mailer = new PHPMailer(); // khởi tạo đối tượng
					$mailer->IsSMTP(); // gọi class smtp để đăng nhập
					$mailer->CharSet="utf-8"; // bảng mã unicode
					
					//Đăng nhập Gmail
					$mailer->SMTPAuth = true; // Đăng nhập
					$mailer->SMTPSecure = "ssl"; // Giao thức SSL
					$mailer->Host = "smtp.gmail.com"; // SMTP của GMAIL
					$mailer->Port = 465; // cổng SMTP
					
					// Phải chỉnh sửa lại
					$mailer->Username = "dadichvu.88@gmail.com"; // GMAIL username
					$mailer->Password = "itwebsite"; // GMAIL password
					$mailer->AddAddress("$emaillh",'Recipient Name'); //email người nhận
					 
					// Chuẩn bị gửi thư nào
					$mailer->FromName = "$fullname"; // tên người gửi
					$mailer->From = "$email"; // mail người gửi
					$mailer->Subject = "$base";
					$mailer->IsHTML(true); //Bật HTML không thích thì false
					 
					// Nội dung lá thư
					$mailer->Body = "$tinnhan";
					 
					// Gửi email
					 
					if(!$mailer->Send())
					{
					// Gửi không được, đưa ra thông báo lỗi
				
					echo "Không gửi được ";
					echo "Lỗi: " . $mailer->ErrorInfo;
					}
					else
					{
					 
					$muser->contact($fullname, $address, $phone, $email, $title, $content);
                                        thongbao("Cảm ơn bạn đã liên hệ cho chúng tôi");   trangtruoc();
					 
					}
			
            
        }
        else{
             thongbao('Bạn nhập sai chuỗi Captcha');
             trang_truoc();
         }
          $this->_helper->viewRenderer->setNoRender();
        $mask = APPLICATION_PATH."/../captcha/images/*.png"; 
        array_map("unlink",glob($mask)); 
      } 
        
        
    }
    
     public function ajaxAction()
        {
           echo 123;
        }
          function  pageAction()
    {
          
              echo 9878786;
        
    }
   
}
?>
