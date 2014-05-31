<?php
/**
 * @author Sudhir Pandey <sudhir@hostnsoft.com>
 * @since 12 july 2013
 * @package Phone91
 * @details action handler class
 */

 #include config,dbconfig and phonebook_class
 include('config.php');
 include('dbconfig.php');
 include ('excel_reader2.php');
 include_once("classes/phonebook_class.php");
       
       
class actionClass {
    
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (15/07/2013)
   #function use to delete contact number
   function deleteContact($_REQUEST, $_SESSION){
       
        #create object of phonebook class
        $pbookobj = new phonebook_class();
        $userid = $_SESSION['userid'];
        echo $result = $pbookobj->deleteContact($_REQUEST,$userid);
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (15/07/2013)
   #function use to show Edit contact number
   function showEditContact($_REQUEST, $_SESSION){
       
    $pbookobj = new phonebook_class();
    echo $result = $pbookobj->showEditContact($_REQUEST); 
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (15/07/2013)
   #function use to update contact number
   function updateContact($_REQUEST, $_SESSION){
       
    $pbookobj = new phonebook_class();
    $userid = $_SESSION['userid'];
    echo $result = $pbookobj->updateContact($_REQUEST,$userid); 
      
       
   }
   
   #created by sudhir pandey ( sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #codition for add new emailid of login user 
   function update_newEmail($_REQUEST, $_SESSION){
       
        # get new email id 
        $new_emailid=$_REQUEST['newEmail'];
        # get confirm email id 
        $confirm_emailid=$_REQUEST['confirmEmail'];

        #check both email id is same or not 
        if($new_emailid == $confirm_emailid){
          include_once("classes/contact_class.php");
          $cont_obj = new contact_class();
          $userid=$_SESSION["id"];	
          echo $cont_obj->addnew_emailid($new_emailid,$userid);
        }else
          echo json_encode(array('msgtype' => 'error', 'msg' => 'Email id not matched !'));


   }
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (23/07/2013)
   #function use to add new contact of login user 
   function update_newcontact($_REQUEST, $_SESSION){

         include_once("classes/contact_class.php");
         $cont_obj = new contact_class();
         $userid=$_SESSION["id"];	
         #variable country_code use to country code     
         $country_code = $_REQUEST['country_code'] ;
         //$code = substr($code, 1, strlen($code) - 1);
         $phone = $_REQUEST['contact_no'];
         echo $msg=$cont_obj->update_newcontact($country_code,$phone,$userid);
        //        echo $msg1=$cont_obj->resellercheck($phone,$userid);

       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (25/07/2013)
   #function use to verify email id  
   function verifyEmailid($_REQUEST, $_SESSION){
       
    include_once("classes/contact_class.php");
    $cont_obj = new contact_class();
    $userid=$_SESSION["id"];	
    echo $msg=$cont_obj->verifyEmailid($_REQUEST,$userid);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25-07-2013
   #function use use to make default email  
   function makeDefaultemail($_REQUEST, $_SESSION){
       
     include_once("classes/contact_class.php");
     $cont_obj = new contact_class();
     $userid=$_SESSION["id"];	
     echo $msg=$cont_obj->makeDefaultemail($_REQUEST,$userid);

   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (23/07/2013)
   #function use to verify mobile number 
   function verifyNumber($_REQUEST, $_SESSION){
       
    include_once("classes/contact_class.php");
    $cont_obj = new contact_class();
    $userid=$_SESSION["id"];	
    echo $msg=$cont_obj->verifyNumber($_REQUEST,$userid); 

       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 24-07-2013
   #function use use to make default number 
   function makeDefaultNumber($_REQUEST, $_SESSION){
       
    include_once("classes/contact_class.php");
    $cont_obj = new contact_class();
    $userid=$_SESSION["id"];	
    echo $msg=$cont_obj->makeDefaultNumber($_REQUEST,$userid); 
      
       
   }
   
   # modified by sudhir pandey <sudhir@hostnsoft.com>
   # date :  02/09/2013
   # function use to recharge user balance by pin 
   function rechargeByPin($_REQUEST, $_SESSION){
       
    include_once("classes/pin_class.php");
    $pin_obj=new pin_class();
    echo $msg=$pin_obj->rechargeByPin($_REQUEST,$_SESSION["userid"],$_SESSION['id_tariff']);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (18/07/2013)
   #function use to add pin batch
   function createPinBatch($_REQUEST, $_SESSION){
       
    error_reporting(-1);
    include_once("classes/pin_class.php");
    error_reporting(-1);
    $pin_obj=new pin_class();
    $userId=$_SESSION["id"];	
    echo $pin_obj->generateBatch($_REQUEST,$userId);

       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (19/07/2013)
   #function use to add pin batch
   function editPinBatch($_REQUEST, $_SESSION){
       
    error_reporting(-1);
    include_once("classes/pin_class.php");
    error_reporting(-1);
    $pin_obj=new pin_class();
    $userId=$_SESSION["id"];	
    echo $msg=$pin_obj->editPinBatch($_REQUEST,$userId);

   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (19/07/2013)
   #function use to add pin batch
   function searchBatch($_REQUEST, $_SESSION){
       
    error_reporting(-1);
    include_once("classes/pin_class.php");
    error_reporting(-1);
    $pin_obj=new pin_class();
    $userId=$_SESSION["id"];	
    echo $msg=$pin_obj->searchBatch($_REQUEST,$userId);

   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (07-08-2013)
   #function use to change pin batch status (enable / disable)
   function changeBatchAction($_REQUEST, $_SESSION){
       
        error_reporting(-1);
	include_once("classes/pin_class.php");
	error_reporting(-1);
	$pin_obj=new pin_class();
	$userId=$_SESSION["id"];	
	echo $msg=$pin_obj->changeBatchAction($_REQUEST,$userId);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (12-08-2013)
   #function use to change batch amount status (paid / unpaid).
   function pinBatchAmountStatus($_REQUEST, $_SESSION){
       
        error_reporting(-1);
	include_once("classes/pin_class.php");
	error_reporting(-1);
	$pin_obj=new pin_class();
	$userId=$_SESSION["id"];	
	echo $msg=$pin_obj->pinBatchAmountStatus($_REQUEST,$userId);
       
   }
   
   # created by Balachandra Hegde<balachandra@hostnsoft.com>
   # date 02/08/2013
   # deletion of user Email Id
   function deletephone($_REQUEST, $_SESSION){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting id of the contact number through the POST method
        $contactid=$_REQUEST['id'];
        #creating the new object of class contact_class   
        $contact_obj = new contact_class();

        #getting the userid by session. 
        $userId=$_SESSION["id"];

        #get the message after the action from deletephone function
        $msg= $contact_obj->deletephone($contactid,$userId);
        #display the message
        echo $msg;


       
   }

   #created by Balachandra Hegde<balachandra@hostnsoft.com>
   #date 31/07/2013
   # deletion of user Email Id
   function deleteEmailId($_REQUEST, $_SESSION){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting the id of email address by POST method
        $emailid=$_REQUEST['emailId'];
        #creating the class object of contact_class    
        $email_obj = new contact_class();
        #getting the userid by SESSION
        $userId=$_SESSION["id"];

        #store the result in $msg for the action to be taken in deleteEmailId()
        $msg= $email_obj->deleteEmailId($emailid,$userId);
        echo $msg;
       
   }

   #created by Balachandra Hegde<balachandra@hostnsoft.com>
   #date 07/08/2013
   # deletion of user unverifiedEmail Id
   function deleteunverifyemail($_REQUEST, $_SESSION){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting the id of email address by POST method
        $unverifyemail=$_REQUEST['unverifyid'];
        #creating the class object of contact_class    
        $unverifyemail_obj = new contact_class();
        #getting the userid by SESSION
        $userId=$_SESSION["id"];

        #store the result in $msg for the action to be taken in deleteEmailId()
        $msg= $unverifyemail_obj->deleteunverifyemail($unverifyemail,$userId);
        echo $msg;  

   }
   
   #created by Balachandra Hegde<balachandra@hostnsoft.com>
   #date 07/08/2013
   # deletion of user unverified number
   function deleteunverifyphone($_REQUEST, $_SESSION){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting the id of email address by POST method
        $tempid=$_REQUEST['tempid'];

        #creating the class object of contact_class    
        $temp_obj = new contact_class();
        #getting the userid by SESSION
        $userId=$_SESSION["id"];

        #store the result in $msg for the action to be taken in deleteEmailId()
        $msg= $temp_obj->deleteunverifyphone($tempid,$userId);
        echo $msg;
       
   }

    #created by Balachandra Hegde<balachandra@hostnsoft.com>
    #date 02/008/2013
    # deletion for the unused pinBatch
   function deleteBatchPin($_REQUEST, $_SESSION){
     
        #include the pin class for function
        include_once("classes/pin_class.php");

        #get the batchid by POST method
        $batchid=$_REQUEST['batchid'];

        #create a function object to access data
        $pin_obj = new pin_class();

        #userid 
        $userId=$_SESSION["id"];

        #connecting to function deleteBatchPin
        echo $msg= $pin_obj->deleteBatchPin($batchid,$userId);  
      
       
   }
   
    #created by sudhir pandey (sudhir@hostnsoft.com)
    #creation date 25/07/2013
    #function use to resend confirmation code for contact no verification
   function resendConfirm_code($_REQUEST, $_SESSION){
       
        include_once("classes/contact_class.php");
        $cont_obj = new contact_class();
        $userid=$_SESSION["id"];	
        echo $msg=$cont_obj->resendConfirm_code($_REQUEST,$userid);
	
       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #function use to resend confirmation code by call for contact no verification
   function callmeConfirm_code($_REQUEST, $_SESSION){
       
        include_once("classes/contact_class.php");
        $cont_obj = new contact_class();
        $userid=$_SESSION["id"];	
        echo $msg=$cont_obj->callmeConfirm_code($_REQUEST,$userid);

       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #function use to resend confirmation code by email for email verification
   function resendEmailConfirm_code($_REQUEST, $_SESSION){

        include_once("classes/contact_class.php");
        $cont_obj = new contact_class();
        $userid=$_SESSION["id"];	
        echo $msg=$cont_obj->resendEmailConfirm_code($_REQUEST,$userid);

   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #function use to add new client 
   function addNewClient($_REQUEST, $_SESSION){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$_SESSION["id"];	
	echo $msg=$client_obj->addNewClient($_REQUEST,$userid);
       
   }
   
   #created by Rahul Chordiya (rahul@hostnsoft.com)
   #creation date 06/08/2013
   #code for bulk user generate
   function addNewClientBatch($_REQUEST, $_SESSION){
       
        include_once("classes/signup_class.php");
        $client_obj = new signup_class();
        $userid=$_SESSION["id"];	
	echo $msg=$client_obj->addNewClientBatch($_REQUEST,$userid);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 05/09/2013
   #code for change bulk client status used or unused username and password . 
   function changeBulkClientStatus($_REQUEST, $_SESSION){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$_SESSION["id"];
        echo $msg=$client_obj->changeBulkClientStatus($_REQUEST,$userId);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 05/09/2013
   #code for search bulk client username and password . 
   function searchBulkClient($_REQUEST, $_SESSION){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        echo $msg=$client_obj->searchBulkClient($_REQUEST); 
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 05/08/2013
   #function use to see call rate 
   function seeCallRate($_REQUEST, $_SESSION){
       
        include_once("classes/call_class.php");
        $call_obj = new call_class();
        $userid=$_SESSION["id"];
        $tariff_id = $_SESSION["id_tariff"];
	echo $msg=$call_obj->seeCallRate($_REQUEST,$tariff_id);  
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 06-08-2013
   #function use to add reduce transaction log into manageclient
   function addReduceTransaction($_REQUEST, $_SESSION){

        include_once("classes/transaction_class.php");
        $trans_obj = new transaction_class();
        $userid=$_SESSION["id"];
        $tariff_id = $_SESSION["id_tariff"];
        
	echo $msg=$trans_obj->addReduceTransaction($_REQUEST,$userid);
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 06-08-2013
   #function use to get transaction log detail.
   function getTransactionLog($_REQUEST, $_SESSION){

        include_once("classes/transaction_class.php");
        $trans_obj = new transaction_class();
        echo $msg=$trans_obj->getTransactionLogDetail($_REQUEST['fromuser'],$_REQUEST['touser']);
      
       
   }
   
   #created by sudhir pandey <sudhir@hostnsoft.com>
   #creation date 25/10/2013
   #function use to get user transaction log for admin panel
   function adminGetTransaction($_REQUEST,$_SESSION){
        include_once("classes/transaction_class.php");
        $trans_obj = new transaction_class();
        echo $msg = $trans_obj->getPersonalTransaction($_REQUEST['touser']);
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 06-08-2013
   #function use to edit fund  add reduce uesr balance and amount 
   function editFund($_REQUEST, $_SESSION){
   
   
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$_SESSION["id"];	
	echo $msg=$client_obj->editFund($_REQUEST,$userid);
      
       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 07-08-2013
   #function use to edit client info  
   function editClientInfo($_REQUEST, $_SESSION){
       
       include_once("classes/reseller_class.php");
       $client_obj = new reseller_class();
       $userid=$_SESSION["id"];	
       echo $msg=$client_obj->editClientInfo($_REQUEST,$userid); 
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 16-09-2013
   #function use use to set user status (block or unblock) with all chain users 
   function changeUserStatus($_REQUEST, $_SESSION){
       
      include_once("classes/reseller_class.php");
      $client_obj = new reseller_class();
      $userid=$_SESSION["id"];	
      echo $msg=$client_obj->changeUserStatus($_REQUEST,$userid,"isBlocked");
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 19-09-2013
   #function use use to set user Delete flage with all chain users 
   function setUserDeleteFlag($_REQUEST, $_SESSION){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$_SESSION["id"];	
        echo $msg=$client_obj->changeUserStatus($_REQUEST,$userid,"deleteFlag");
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 16-09-2013
   #function use use to set batch user status (block or unblock) 
   function BatchBlockOrUnblock($_REQUEST, $_SESSION){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$_SESSION["id"];	
        echo $msg=$client_obj->BatchBlockOrUnblock($_REQUEST,$userid,"isBlocked");
       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 16-09-2013
   #function use use to set batch user Delete flag
   function setBatchDeleteFlag($_REQUEST, $_SESSION){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$_SESSION["id"];	
        echo $msg=$client_obj->BatchBlockOrUnblock($_REQUEST,$userid,"deleteFlag");  
       
   }

   function feedbak($_REQUEST, $_SESSION){
       
        //Mix this with inner feed back
        $header= 'MIME-Version: 1.0' . "\n";

        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\n";						

        if(strlen($_REQUEST['mailid'])>8) //if user have his or her email then mail send by user email
        {
                $header .= 'From: '.$_REQUEST['mailid']."\n"	;	
                 $header .= "Reply-To: ".$_REQUEST['mailid']."\r\n";
        }
        else
        {
                $header .= 'To: business@phone91.com <business@phone91.com>'. "\n"	;
        }

        mail("business@phone91.com,shubh124421@gmail.com","Feedback","Name:".$_REQUEST['mailid']."\n
            Username/Number ".$_REQUEST["number"]."\n
            Message:".$_REQUEST['msg'],$header);
        $randomCaptcha = rand('100', '990');
        $_SESSION['captcha'] = $randomCaptcha;
        echo "Success"; 

       
   }
   
   
   function sendSms($_REQUEST, $_SESSION){
       
    $funobj = new fun();   
    $nmbrs=$funobj->sql_safe_injection($_REQUEST['nmbrs']);
    $msg=$funobj->sql_safe_injection($_REQUEST['msg']);
    $dataSms['mobiles']=$nmbrs;
    $dataSms['message']=$msg;
    $dataSms['sender']=$funobj->user_contact();
    $curl_scraped_page='';
    $tariff=$funobj->get_currency($_SESSION['id_tariff']);
    $main_balance=$funobj->user_balance();
    $deductAmount='';
    if($tariff=='INR')
            $deductAmount=1.2;
    else if($tariff=='USD')
            $deductAmount=0.025;
    else if($tariff=='AE')
            $deductAmount=0.085;
    $new_balance=$main_balance-$deductAmount;

    if($dataSms['sender']!="" and $tariff!='' and $nmbrs!='' and ($main_balance!='' or $main_balance>0) and $new_balance>=0)
    {
            $sender=$dataSms['sender'];
            $curl_scraped_page=$funobj->SendSMSUSD($dataSms);

            //echo 'Main Balance='.$main_balance.' '.$tariff.'<br />';
            //echo 'New Balance='.$new_balance.' '.$tariff.'<br />';

            $con=$funobj->connect();

            $sqlUpd="update clientsshared set
                                      account_state='".$new_balance."'
                                      where
                                      id_client='".$_SESSION['userid']."'";
            $resultServer=mysql_query($sqlUpd,$con) or die('Query error');
            //echo '<br />';

            //mysql_close($con);

            //$con = mysql_connect("localhost","root",'') or die(" Couldnot connect to the server ");
            //mysql_select_db("voipswitch",$con) or die(" Database Not Found ");
            $qry2="insert into voipswitch.smsreport set
                            UserId='".$_SESSION['userid']."',
                            Sender='".$sender."',
                            Recipients='".$dataSms['mobiles']."',
                            Message='".$dataSms['message']."',
                            InsertDateTime=now(),
                            CurlReturnValue='".$curl_scraped_page."',
                            Status='Pending'";
            $result=mysql_query($qry2,$con) or die('Query error');
            mysql_close($con);
    }
    else
    {
            echo "Error In Code";
    }
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (12/07/2013)
   #function use to add contact number
   function addContact($_REQUEST, $_SESSION){
       
    $userid = $_SESSION['userid'];
    $pbookobj = new phonebook_class();
    echo $result = $pbookobj->addContact($_REQUEST,$userid);
      
   }
   
   function searchContact($_REQUEST, $_SESSION){
       
    $pbookobj = new phonebook_class();
    echo $result = $pbookobj->searchContact($_REQUEST); 
      
       
   }
   
   function login_user($_REQUEST, $_SESSION){

    $funobj = new fun();   
    $userid=$funobj->sql_safe_injection($_REQUEST['uname']);
    $pwd=$funobj->sql_safe_injection($_REQUEST['pwd']);
    $funobj->login_user($userid,$pwd);

   }
   
   function feedback($_REQUEST, $_SESSION){
    $funobj = new fun();   
    $sub=$funobj->sql_safe_injection($_REQUEST['subject']);
    $dis=$funobj->sql_safe_injection($_REQUEST['discription']);
    if(strlen($sub)>5 && strlen($dis)>20)
            echo $funobj->user_feedback($sub,$dis);
    else
    echo "Please Provide Proper Information";

       
   }
   
   function get_country($_REQUEST, $_SESSION){
    $funobj = new fun();   
    $country=$_REQUEST['q'];
    if(strlen($country)>5)
    echo $funobj->get_country_frm_num($country);
    else
    echo "";   

       
   }
   
   function logout($_REQUEST, $_SESSION){
    $funobj = new fun();
    $funobj->logout();   
       
   }
   function check_avail($_REQUEST, $_SESSION){
     
    include_once("classes/signup_class.php");
    $signup_obj = new signup_class();
    $a =$signup_obj->check_user_avail($_REQUEST['username']);
    if(isset($_GET["callback"])){
     echo $_GET["callback"]."(".$a.")"; 
    }else
     echo $a;   
       
   }
   
   function check_email_avail($_REQUEST, $_SESSION){
        
    include_once("classes/signup_class.php");
    $a =$signup_obj->check_email_avail($_REQUEST["email"]);
    if(isset($_GET["callback"])){
     echo $_GET["callback"]."(".$a.")"; 
    }else
     echo $a;   
      
       
   }
   
    function verifyConfirmation($_REQUEST, $_SESSION){
        $funobj = new fun();
        $a =$funobj->verifyCode($_REQUEST["code"]);
        echo $a;


    }
    function reset_pwd($_REQUEST, $_SESSION){
        $funobj = new fun();
        $userId=$funobj->verifyCode($_REQUEST["code"]);
        if($userId == base64_decode($_REQUEST["key"]))
        {
         $a =$funobj->change_pwd("", $_REQUEST["new_pwd"],$userid,1);
         echo $a;
        }

    }
    
    function forget_pass($_REQUEST, $_SESSION){
     
        $funobj = new fun();
        $username=trim($_REQUEST['uname']);
        echo $a = $funobj->forget_password($username,$_REQUEST["smsCall"]); 


    }
    function delete_smpp($_REQUEST, $_SESSION){
        
         $smsc_id=$_REQUEST['smsc_id'];
         $con=$fun->smpp_connect();														
         $search_qry="DELETE FROM smpp_setup_request where smsc_id like '$smsc_id' limit 1";
         $exe_qry=mysql_query($search_qry) or die(mysql_error());
         mysql_close($con);


    }
    
    /*
    * modified by:Balachandra<balachandra@hostnsoft.com>
    *  date: 29/07/2013
    */
   function change_pwd($_REQUEST, $_SESSION){
       
      #store the posted current password  in $curr_pwd
      $curr_pwd = $_REQUEST['curr_pwd'];

      #store the posted new password in $new_pwd
      $new_pwd = $_REQUEST['new_pwd'];

      #getting the session userid
      $userid = $_SESSION['userid'];

      #confirm password also stored in $confirm_pwd
      $confirm_pwd = $_REQUEST['confirm_pwd'];

      #required field validator 
      if($curr_pwd == "" || $new_pwd == "" || $userid== "" || $confirm_pwd =="")
      {
          echo json_encode(array('msgtype'=>'error','msg'=>'All fields are required please provide proper input'));		
          exit();
      }


      #comapre entered two new passwords
      if( $confirm_pwd === $new_pwd )
      { 
          #not needed any more 
              #remove new lines and slashes in the variable;
    //		$new_pwd = $funobj->sql_safe_injection($new_pwd);

              #$a is the variable to return a value from the function layer
              $funobj = new fun();
              $a = $funobj->change_pwd($curr_pwd,$new_pwd,$userid);		
              echo $a;
              exit();	
      }
      else
      {
          //"new passwords do not match"
           echo json_encode(array('msgtype'=>'error','msg'=>'new passwords do not matching'));		
           exit();
      }
       
   }
   
   function change_emailid($_REQUEST, $_SESSION){
        $funobj = new fun();
        $new_emailid=$_REQUEST['new_emailid'];
        $confirm_emailid=$_REQUEST['confirm_emailid'];
        if(     $confirm_emailid == $new_emailid)
        {
                $check = $funobj->isValidEmail($confirm_emailid);
                if($check){
                        $new_emailid=$funobj->sql_safe_injection($new_emailid);
                        $a = $funobj->change_emailid($new_emailid);
                        echo $a;
                        exit();
                }
                else{
                        echo '2';
                }
        }
        else
        {
                echo '3';//"Password not matched";
                exit();
        }    

       
   }
   
   function delete_emailid($_REQUEST, $_SESSION){
       $funobj = new fun();
        $result = $funobj->delete_emailid();
        if($result){
                  echo 1;
        } 

       
   }
   
   function resend_ecode($_REQUEST, $_SESSION){
       
       $funobj = new fun();
        $result = $funobj->resend_ecode();
        if($result){
                echo 1;
        }
        
   }
   function search_rate($_REQUEST, $_SESSION){
       
       $funobj = new fun();
       $a = $funobj->check_rate($_REQUEST['code']);
       echo $a;
      
       
   }
   function signup($_REQUEST, $_SESSION){
    
       
     include_once("classes/signup_class.php");
     $signup_obj = new signup_class();
     $msg=$signup_obj->sign_up($_REQUEST);
     if(isset($_GET["callback"])){
     echo $_GET["callback"]."(".$msg.")"; 
    }else
     echo $msg;  
        	
      
       
   }
   function signupP91($_REQUEST, $_SESSION){
       /*phone91 signup*/
       
     include_once("classes/signup_class.php");
     $signup_obj = new signup_class();
     $msg=$signup_obj->sign_up($_REQUEST);
     $msg = json_decode($msg);
     
     if($msg->status == "success")
         header("Location: userhome.php#!contact.php");
     else {
         $domain = $_REQUEST['domain'];
         header("Location: ".$domain."?msg=".$msg->msg."&status=".$msg->status);
     }
     exit();
   }
   function update_profile($_REQUEST, $_SESSION){
       
    include_once("classes/profile_class.php");
    $check_parrent=$pro_obj->check_parent_reseller($_REQUEST['id']);
    if($pro_obj->check_admin() || $check_parrent)
    {
    echo $msg=$pro_obj->update_client_details();
    }
       
   }
   
   function resetClientPassword($_REQUEST, $_SESSION){
       
    include_once("classes/reseller_class.php");
    $res_obj=new reseller_class();
    $check_parrent=$res_obj->checkParentReseller($_REQUEST,$_SESSION);
    //    if($pro_obj->check_admin() || $check_parrent)
    if($check_parrent)
    {
        echo $msg=$res_obj->resetClientPassword($_REQUEST,$_SESSION);
    }

       
   }
   
   function updateStatus($_REQUEST, $_SESSION){
       
      include_once("classes/profile_class.php");
      $check_parrent=$pro_obj->check_parent_reseller($_REQUEST['cid']);
      if($pro_obj->check_admin() || $check_parrent)
      {
               $pro_obj->updateSta($_REQUEST['cid'], $_REQUEST['cstatus']);//update user status recursively
               echo "Client status updated.";
      }
       
   }
   function update_dialplan($_REQUEST, $_SESSION){
       
      include_once("classes/profile_class.php");
      echo $msg=$pro_obj->edit_default_route();
       
   }
   function edit_details($_REQUEST, $_SESSION){
       
    include_once("classes/setting_class.php");
    $editobj=new setting_class();
    $userid=$_SESSION["userid"];
    echo $msg=$editobj->update_newdetails($_REQUEST,$userid);
       
   }
   
   
   
   function searchClient($_REQUEST, $_SESSION){
        error_reporting(-1);
	include_once("classes/reseller_class.php");
	error_reporting(-1);
	$reseller_obj=new reseller_class();
	$userId=$_SESSION["id"];	
	if(isset($_REQUEST["term"]))
		$q=$_REQUEST["term"];
	else
		$q="";
	//echo $msg=$pin_obj->generateBatch($_REQUEST,$userId);
	echo $reseller_obj->searchChiildList($userId,$q);
      
       
   }
   
   function changeResellerSettings($_REQUEST, $_SESSION){
        error_reporting(-1);
	include_once("classes/reseller_class.php");
	error_reporting(-1);
	$reseller_obj=new reseller_class();
	$userId=$_SESSION["id"];
        $userId=1;
	echo $reseller_obj->changeResellerSettings($_REQUEST,$userId);
      
       
   }
   function updateProfile($_REQUEST, $_SESSION){
        $con = dbConnect();
        if($con){
        $update_sql = "UPDATE `user_profile` SET `name`='".$_REQUEST['name']."',
            `dob`='".$_REQUEST['dob']."',`city`='".$_REQUEST['city']."',
            `zip`='".$_REQUEST['zip']."',`country`='".$_REQUEST['country']."', 
            `address`='".$_REQUEST['address']."',`sex`=".$_REQUEST['sex'].",
            `ocupation`='".$_REQUEST['ocupation']."' WHERE userid=".$_SESSION['userid'];
        echo mysql_query($update_sql,$con);
        mysql_close($con);
        }


   }
   
   function changeSettings($_REQUEST, $_SESSION){
       
        $con = dbConnect();
	$value = ($_REQUEST['value'] == 0)?1:0;
	$update_sql = "UPDATE profile_settings SET ".$_REQUEST['key']."=".$value." WHERE user_id =".$_SESSION['userid'];
	mysql_query($update_sql,$con);
	mysql_close($con);
       
   }
   
    /**
    * Add a new plan using
    * Imported File
    * Old existing Plans
    * New Plans
    */
   function add($_REQUEST, $_SESSION){
       
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->addPlan($_REQUEST, $_SESSION, $_FILES);
      
       
   }
    /**
    * Editing a plan single detail
    */

   function edit_plan($_REQUEST, $_SESSION){
       
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->editPlan($_REQUEST, $_SESSION);
       
   }
    /**
    * Deleting a plan single detail
    */

   function delete_plan($_REQUEST, $_SESSION){
       
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->deletePlan($_REQUEST, $_SESSION);  
       
   }
    /**
    * Multiple deletion of plans and plan details 
    * Kept details in backup before deletion
    */

   function delete_plans($_REQUEST, $_SESSION){
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->deletePlans($_REQUEST, $_SESSION);

       
   }
    //change batch status
    function batch_status($_REQUEST, $_SESSION){
       include_once("classes/pin_class.php");
     $pin_obj = new pin_class();
     echo $msg = $pin_obj->batchStatus($_REQUEST); 


    }
    /**
    * Update user fund
    */


   function edit_funds($_REQUEST, $_SESSION){
       
        $con = dbConnect();
          $insert_sql = "INSERT INTO `reseller_transaction`
                        ( `trans_fuserid`, `trans_tuserid`, `trans_amt`, `trans_crnt_amt`, `trans_type`) 
                 VALUES (".$_SESSION['userid'].",".$_REQUEST['to_id'].",".$_REQUEST['amount_transfer'].",".$_REQUEST['balance'].",'".$_REQUEST['type']."')";
          echo mysql_query($insert_sql, $con);
       
   }
   /**
 * Update user contact detail
 */
   function update_contactno($_REQUEST, $_SESSION){
       
        include_once("classes/updateContact_class.php");
	$contobj = new updateContact_class();
	echo $update_contact = $contobj->changeContact($_REQUEST, $_SESSION);
       
   }
    /**
    * delete phone no
    */
   function delete_phoneno($_REQUEST, $_SESSION){
    include_once("classes/updateContact_class.php");
    $contobj = new updateContact_class();
    echo $update_contact = $contobj->deleteContact($_REQUEST['phone_no'], $_SESSION['userid']);
      
       
   }
    /**
    * add a new subsite
    */
   function add_subsite($_REQUEST, $_SESSION){
        include_once("classes/subSite_class.php");
        $siteobj = new subSite_class();
        echo $result = $siteobj->addSubsite($_REQUEST, $_SESSION); 


   }
    /**
    * edit a subsite
    */
   function edit_subsite($_REQUEST, $_SESSION){
    include_once("classes/subSite_class.php");
    $siteobj = new subSite_class();
    echo $result = $siteobj->editSubsite($_POST);

       
   }
    /**
    * delete a subsite
    */
   function delete_subsite($_REQUEST, $_SESSION){
        include_once("classes/subSite_class.php");
        $siteobj = new subSite_class();
        echo $result = $siteobj->deleteSubsite($_REQUEST['subsite_pid']); 
      
       
   }

    #created by sudhir pandey (sudhir@hostnsoft.com)
    #creation date 26-09-2013
    #login redirect from other domain 
    function loginRedirect($_REQUEST, $_SESSION){
        
        $userid = $_REQUEST['uname'];
        $pwd = $_REQUEST['pwd'];
        $remember_me = $_REQUEST['rememberMe'];
        $host = $_REQUEST['domain']; 
        $_SESSION['currentHost'] = $host;
        $funobj = new fun();
        $funobj->login_user($userid,$pwd,$remember_me,$host);  


    }


    #created by sudhir pandey <sudhir@hostnsoft.com>
    #creation date 07/10/2013
    #function use to add whiteLabel id's
    function addWhiteLabel($_REQUEST, $_SESSION){
    
        include_once("classes/setting_class.php");
        $settingObj=new setting_class();
        $userid=$_SESSION["userid"];
        echo $msg=$settingObj->addWhiteLabel($_REQUEST,$userid);
    }
    
    
    function deleteWhiteLabelIds($_REQUEST, $_SESSION){
        include_once("classes/setting_class.php");
        $settingObj=new setting_class();
        $userid=$_SESSION["userid"];
        echo $msg=$settingObj->deleteWhiteLabelIds($_REQUEST['userName'],$userid);
    }
    
    
}//class End 


try{
    $actionObj = new actionClass();
    if (isset($_REQUEST['action']) && $_REQUEST['action'] != "")
       $actionObj->$_REQUEST['action']($_REQUEST, $_SESSION);
}
catch (Exception $e)
{
    mail("sudhir@hostnsoft.com",__FILE__,print_R($e->getMessage(),1));
}
?>
