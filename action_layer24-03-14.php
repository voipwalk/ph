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
    
    function generateZipFile($request, $session)
    {
        include_once 'function_layer.php';
         $funObj = new fun();
         
       echo  $funObj->generateZipFile($request);
        
    }
    
    function unblocUserIp($request, $session)
    {
        include_once 'function_layer.php';
         $funObj = new fun();
         
       echo  $funObj->unblocUserIp($request);
        
    }
    
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (15/07/2013)
   #function use to delete contact number
   function deleteContact($request, $session){
       
        #create object of phonebook class
        $pbookobj = new phonebook_class();
        $userid = $session['userid'];
        echo $result = $pbookobj->deleteContact($request,$userid);
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (15/07/2013)
   #function use to show Edit contact number
   function showEditContact($request, $session){
       
    $pbookobj = new phonebook_class();
    $userid = $session['userid'];
    echo $result = $pbookobj->showEditContact($request,$userid); 
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (15/07/2013)
   #function use to update contact number
   function updateContact($request, $session){
       
    $pbookobj = new phonebook_class();
    $userid = $session['userid'];
    echo $result = $pbookobj->updateContact($request,$userid); 
      
       
   }
   
   #created by sudhir pandey ( sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #codition for add new emailid of login user 
   function update_newEmail($request, $session){
       
        # get new email id 
        $new_emailid=$request['newEmail'];
        # get confirm email id 
        $confirm_emailid=$request['confirmEmail'];

        #check both email id is same or not 
        if($new_emailid == $confirm_emailid){
          include_once("classes/contact_class.php");
          $cont_obj = new contact_class();
          $userid=$session["id"];	
          echo $cont_obj->addnew_emailid($new_emailid,$userid);
        }else
          echo json_encode(array('msgtype' => 'error', 'msg' => 'Email id not matched !'));


   }
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (23/07/2013)
   #function use to add new contact of login user 
   function update_newcontact($request, $session){

         include_once("classes/contact_class.php");
         $cont_obj = new contact_class();
         $userid=$session["id"];	
         #variable country_code use to country code     
         $country_code = $request['country_code'] ;
         //$code = substr($code, 1, strlen($code) - 1);
         $phone = $request['contact_no'];
         echo $msg=$cont_obj->update_newcontact($country_code,$phone,$userid);
        //        echo $msg1=$cont_obj->resellercheck($phone,$userid);

       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (25/07/2013)
   #function use to verify email id  
   function verifyEmailid($request, $session){
       
    include_once("classes/contact_class.php");
    $cont_obj = new contact_class();
    $userid=$session["id"];	
    echo $msg=$cont_obj->verifyEmailid($request,$userid);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25-07-2013
   #function use use to make default email  
   function makeDefaultemail($request, $session){
       
     include_once("classes/contact_class.php");
     $cont_obj = new contact_class();
     $userid=$session["id"];	
     echo $msg=$cont_obj->makeDefaultemail($request,$userid);

   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (23/07/2013)
   #function use to verify mobile number 
   function verifyNumber($request, $session){
       
    include_once("classes/contact_class.php");
    $cont_obj = new contact_class();
    $userid=$session["id"];	
    echo $msg=$cont_obj->verifyNumber($request,$userid); 

       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 24-07-2013
   #function use use to make default number 
   function makeDefaultNumber($request, $session){
       
    include_once("classes/contact_class.php");
    $cont_obj = new contact_class();
    $userid=$session["id"];	
    echo $msg=$cont_obj->makeDefaultNumber($request,$userid); 
      
       
   }
   
   # modified by sudhir pandey <sudhir@hostnsoft.com>
   # date :  02/09/2013
   # function use to recharge user balance by pin 
   function rechargeByPin($request, $session){
       
    include_once("classes/pin_class.php");
    $pin_obj=new pin_class();
    echo $msg=$pin_obj->rechargeByPin($request,$session["userid"],$session['id_tariff']);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (18/07/2013)
   #function use to add pin batch
   function createPinBatch($request, $session){
       
    error_reporting(-1);
    include_once("classes/pin_class.php");
    error_reporting(-1);
    $pin_obj=new pin_class();
    $userId=$session["id"];	
    echo $pin_obj->generateBatch($request,$userId);

       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (19/07/2013)
   #function use to add pin batch
   function editPinBatch($request, $session){
       
    error_reporting(-1);
    include_once("classes/pin_class.php");
    error_reporting(-1);
    $pin_obj=new pin_class();
    $userId=$session["id"];	
    echo $msg=$pin_obj->editPinBatch($request,$userId);

   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (19/07/2013)
   #function use to add pin batch
   function searchBatch($request, $session){
       
    error_reporting(-1);
    include_once("classes/pin_class.php");
    error_reporting(-1);
    $pin_obj=new pin_class();
    $userId=$session["id"];
    if(isset($request['value']) && $request['value'] == 1){
    echo $msg=$pin_obj->searchBatch($request,$userId,1);
    }else
    echo $msg=$pin_obj->searchBatch($request,$userId);
    
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (07-08-2013)
   #function use to change pin batch status (enable / disable)
   function changeBatchAction($request, $session){
       
        error_reporting(-1);
	include_once("classes/pin_class.php");
	error_reporting(-1);
	$pin_obj=new pin_class();
	$userId=$session["id"];	
	echo $msg=$pin_obj->changeBatchAction($request,$userId);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date (12-08-2013)
   #function use to change batch amount status (paid / unpaid).
   function pinBatchAmountStatus($request, $session){
       
        error_reporting(-1);
	include_once("classes/pin_class.php");
	error_reporting(-1);
	$pin_obj=new pin_class();
	$userId=$session["id"];	
	echo $msg=$pin_obj->pinBatchAmountStatus($request,$userId);
       
   }
   
   # created by Balachandra Hegde<balachandra@hostnsoft.com>
   # date 02/08/2013
   # deletion of user Email Id
   function deletephone($request, $session){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting id of the contact number through the POST method
        $contactid=$request['id'];
        #creating the new object of class contact_class   
        $contact_obj = new contact_class();

        #getting the userid by session. 
        $userId=$session["id"];

        #get the message after the action from deletephone function
        $msg= $contact_obj->deletephone($contactid,$userId);
        #display the message
        echo $msg;


       
   }

   #created by Balachandra Hegde<balachandra@hostnsoft.com>
   #date 31/07/2013
   # deletion of user Email Id
   function deleteEmailId($request, $session){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting the id of email address by POST method
        $emailid=$request['emailId'];
        #creating the class object of contact_class    
        $email_obj = new contact_class();
        #getting the userid by SESSION
        $userId=$session["id"];

        #store the result in $msg for the action to be taken in deleteEmailId()
        $msg= $email_obj->deleteEmailId($emailid,$userId);
        echo $msg;
       
   }

   #created by Balachandra Hegde<balachandra@hostnsoft.com>
   #date 07/08/2013
   # deletion of user unverifiedEmail Id
   function deleteunverifyemail($request, $session){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting the id of email address by POST method
        $unverifyemail=$request['unverifyid'];
        #creating the class object of contact_class    
        $unverifyemail_obj = new contact_class();
        #getting the userid by SESSION
        $userId=$session["id"];

        #store the result in $msg for the action to be taken in deleteEmailId()
        $msg= $unverifyemail_obj->deleteunverifyemail($unverifyemail,$userId);
        echo $msg;  

   }
   
   #created by Balachandra Hegde<balachandra@hostnsoft.com>
   #date 07/08/2013
   # deletion of user unverified number
   function deleteunverifyphone($request, $session){
       
        #include the pin class for function
        include_once("classes/contact_class.php");

        #getting the id of email address by POST method
        $tempid=$request['tempid'];

        #creating the class object of contact_class    
        $temp_obj = new contact_class();
        #getting the userid by SESSION
        $userId=$session["id"];

        #store the result in $msg for the action to be taken in deleteEmailId()
        $msg= $temp_obj->deleteunverifyphone($tempid,$userId);
        echo $msg;
       
   }

    #created by Balachandra Hegde<balachandra@hostnsoft.com>
    #date 02/008/2013
    # deletion for the unused pinBatch
   function deleteBatchPin($request, $session){
     
        #include the pin class for function
        include_once("classes/pin_class.php");

        #get the batchid by POST method
        $batchid=$request['batchid'];

        #create a function object to access data
        $pin_obj = new pin_class();

        #userid 
        $userId=$session["id"];

        #connecting to function deleteBatchPin
        echo $msg= $pin_obj->deleteBatchPin($batchid,$userId);  
      
       
   }
   
    #created by sudhir pandey (sudhir@hostnsoft.com)
    #creation date 25/07/2013
    #function use to resend confirmation code for contact no verification
   function resendConfirm_code($request, $session){
       
        include_once("classes/contact_class.php");
        $cont_obj = new contact_class();
        $userid=$session["id"];	
        echo $msg=$cont_obj->resendConfirm_code($request,$userid);
	
       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #function use to resend confirmation code by call for contact no verification
   function callmeConfirm_code($request, $session){
       
        include_once("classes/contact_class.php");
        $cont_obj = new contact_class();
        $userid=$session["id"];	
        echo $msg=$cont_obj->callmeConfirm_code($request,$userid);

       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #function use to resend confirmation code by email for email verification
   function resendEmailConfirm_code($request, $session){

        include_once("classes/contact_class.php");
        $cont_obj = new contact_class();
        $userid=$session["id"];	
        echo $msg=$cont_obj->resendEmailConfirm_code($request,$userid);

   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 25/07/2013
   #function use to add new client 
   function addNewClient($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];	
	echo $msg=$client_obj->addNewClient($request,$userid);
       
   }
   
   #created by Rahul Chordiya (rahul@hostnsoft.com)
   #creation date 06/08/2013
   #code for bulk user generate
   function addNewClientBatch($request, $session){
       
        include_once("classes/signup_class.php");
        $client_obj = new signup_class();
        $userid=$session["id"];	
	echo $msg=$client_obj->addNewClientBatch($request,$userid);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 05/09/2013
   #code for change bulk client status used or unused username and password . 
   function changeBulkClientStatus($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];
        echo $msg=$client_obj->changeBulkClientStatus($request,$userId);
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 08/01/2014
   #code for enabel bulk client sip 
   function batchSipEnabel($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];
        echo $msg=$client_obj->batchSipEnabel($request,$userId);
       
   }
   
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 05/09/2013
   #code for search bulk client username and password . 
   function searchBulkClient($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        echo $msg=$client_obj->searchBulkClient($request); 
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 05/08/2013
   #function use to see call rate 
   function seeCallRate($request, $session){
       
        include_once("classes/call_class.php");
        $call_obj = new call_class();
        $userid=$session["id"];
        $tariff_id = $session["id_tariff"];
	echo $msg=$call_obj->seeCallRate($request,$tariff_id);  
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 06-08-2013
   #function use to add reduce transaction log into manageclient
   function addReduceTransaction($request, $session){

        include_once("classes/transaction_class.php");
        $trans_obj = new transaction_class();
        $userid=$session["id"];
        $tariff_id = $session["id_tariff"];
        $type = $session['client_type']; // check reseller or admin
        
	echo $msg=$trans_obj->addReduceTransaction($request,$userid,$type);
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 06-08-2013
   #function use to get transaction log detail.
   function getTransactionLog($request, $session){

        include_once("classes/transaction_class.php");
        $trans_obj = new transaction_class();
        echo $msg=$trans_obj->getTransactionLogDetail($request['fromuser'],$request['touser']);
      
       
   }
   
   #created by sudhir pandey <sudhir@hostnsoft.com>
   #creation date 25/10/2013
   #function use to get user transaction log for admin panel
   function adminGetTransaction($request,$session){
        include_once("classes/transaction_class.php");
        $trans_obj = new transaction_class();
        echo $msg = $trans_obj->getPersonalTransaction($request['touser']);
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 06-08-2013
   #function use to edit fund  add reduce uesr balance and amount 
   function editFund($request, $session){
   
   
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];	
	echo $msg=$client_obj->editFund($request,$userid);
      
       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 07-08-2013
   #function use to edit client info  
   function editClientInfo($request, $session){
       
       include_once("classes/reseller_class.php");
       $client_obj = new reseller_class();
       $userid=$session["id"];	
       $type = $session['client_type']; // check reseller or admin
       echo $msg=$client_obj->editClientInfo($request,$userid,$type); 
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 16-09-2013
   #function use use to set user status (block or unblock) with all chain users 
   function changeUserStatus($request, $session){
       
      include_once("classes/reseller_class.php");
      $client_obj = new reseller_class();
      $userid=$session["id"];	
      echo $msg=$client_obj->changeUserStatus($request,$userid,"isBlocked");
      
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 19-09-2013
   #function use use to set user Delete flage with all chain users 
   function setUserDeleteFlag($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];	
        echo $msg=$client_obj->changeUserStatus($request,$userid,"deleteFlag");
       
   }
   
   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 16-09-2013
   #function use use to set batch user status (block or unblock) 
   function BatchBlockOrUnblock($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];	
        echo $msg=$client_obj->BatchBlockOrUnblock($request,$userid,"isBlocked");
       
   }

   #created by sudhir pandey (sudhir@hostnsoft.com)
   #creation date 16-09-2013
   #function use use to set batch user Delete flag
   function setBatchDeleteFlag($request, $session){
       
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        $userid=$session["id"];	
        echo $msg=$client_obj->BatchBlockOrUnblock($request,$userid,"deleteFlag");  
       
   }

    function feedbackform($request, $session){
        $funobj = new fun(); 
        $message = "Name:".$request['mailid']."</br>
            Username/Number : ".$request["number"]."</br>
            Message:".$request['msg'];
        
        $to = "support@phone91.com";//support@phone91.com
        $funobj->sendErrorMail($to,$message,$request['mailid'],"Feedback");
              
        $randomCaptcha = rand('100', '990');
        $session['captcha'] = $randomCaptcha;
        echo "Success"; 

       
   }
   
   
   function sendSms($request, $session){
       
    $funobj = new fun();   
    $nmbrs=$funobj->sql_safe_injection($request['nmbrs']);
    $msg=$funobj->sql_safe_injection($request['msg']);
    $dataSms['mobiles']=$nmbrs;
    $dataSms['message']=$msg;
    $dataSms['sender']=$funobj->user_contact();
    $curl_scraped_page='';
    $tariff=$funobj->get_currency($session['id_tariff']);
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
                                      id_client='".$session['userid']."'";
            $resultServer=mysql_query($sqlUpd,$con) or die('Query error');
            //echo '<br />';

            //mysql_close($con);

            //$con = mysql_connect("localhost","root",'') or die(" Couldnot connect to the server ");
            //mysql_select_db("voipswitch",$con) or die(" Database Not Found ");
            $qry2="insert into voipswitch.smsreport set
                            UserId='".$session['userid']."',
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
   function addContact($request, $session){
       
    $userid = $session['userid'];
    $pbookobj = new phonebook_class();
    echo $result = $pbookobj->addContact($request,$userid);
      
   }
   
   function searchContact($request, $session){
       
    $pbookobj = new phonebook_class();
    echo $result = $pbookobj->searchContact($request); 
      
       
   }
   
   function login_user($request, $session){

    $funobj = new fun();  

    $userid = $request['uname'];
    $pwd = $request['pwd'];
    $urlArr = explode("?", $_SERVER['HTTP_REFERER']);
    $host = $urlArr[0];
    
    $funobj->login_user($userid,$pwd,0,$host);

   }
   
   function feedback($request, $session){
    $funobj = new fun();   
    $sub=$funobj->sql_safe_injection($request['subject']);
    $dis=$funobj->sql_safe_injection($request['discription']);
    if(strlen($sub)>5 && strlen($dis)>20)
            echo $funobj->user_feedback($sub,$dis);
    else
    echo "Please Provide Proper Information";

       
   }
   
   function get_country($request, $session){
    $funobj = new fun();   
    $country=$request['q'];
    if(strlen($country)>5)
    echo $funobj->get_country_frm_num($country);
    else
    echo "";   

   }
   
   function logout($request, $session){
    $funobj = new fun();
    $funobj->logout();   
       
   }
   function check_avail($request, $session){
     
    include_once("classes/signup_class.php");
    $signup_obj = new signup_class();
    $a =$signup_obj->check_user_avail($request['username']);
    if(isset($_GET["callback"])){
     echo $_GET["callback"]."(".$a.")"; 
    }else
     echo $a;   
       
   }
   
   function check_email_avail($request, $session){
        
    include_once("classes/signup_class.php");
    $a =$signup_obj->check_email_avail($request["email"]);
    if(isset($_GET["callback"])){
     echo $_GET["callback"]."(".$a.")"; 
    }else
     echo $a;   
      
       
   }
   
    function verifyConfirmation($request, $session){
        $funobj = new fun();
        if(isset($request['type']) && $request['type'] == 'EMAIL')
        {
           
         $code =$funobj->verifyCode($request["code"],$request["number"],trim($request['type']));
        }
        else {
        $code =$funobj->verifyCode($request["code"],$request["number"]);    
        }
        
       // echo $code;
        $userName = $funobj->getuserName($code);
        
        if($code != 0)
        {
            $errorMessage = json_encode(array("key" => base64_encode($code),"userName"=>$userName , "type" => 4 , "status" => "success"));
            $response =  json_encode(array("key" => base64_encode($code),"userName"=>$userName, "type" => 4 , "status" => "success"));
        }
        else
        {
            $errorMessage = json_encode(array("type" => 5 , "code" => $code , "status" => "error"));
            $response =  $code;
        }
      
        if(isset($_REQUEST['domain']) && $_REQUEST['domain'] == 'phone91.com')
        {
         
            header('Location: http://'.$_REQUEST['domain'].'/forget-password.php?error='.$errorMessage);
        }
        echo $response;
    }
    
    function reset_pwd($request, $session)
    {
        $funobj = new fun();

        if(isset($request['type']) && $request['type'] == 'EMAIL')
        {
            $userId=$funobj->verifyCode($request["code"],$request["mobNum"],$request['type']);
        }
        else 
        {
            $userId=$funobj->verifyCode($request["code"],$request["mobNum"]);    
        }
        
        if($userId == base64_decode($request["key"]))
        {
         echo $funobj->changePassword("", $request["new_pwd"],$userId,1);
         
        }

    }
    
    function forget_pass($request, $session){
     
        $funobj = new fun();
        $username=trim($request['uname']);
        
        if(!isset($request['multiFlag']) || $request['multiFlag'] == "")
            $flag = 0;
        else
            $flag = $request['multiFlag'];
        
//     echo $a = $funobj->forgotPassword($username,$request["smsCall"],$flag); 
//        die();
        echo $a = $funobj->forget_password($username,$request["smsCall"]); 


    }
    function delete_smpp($request, $session){
        
         $smsc_id=$request['smsc_id'];
         $con=$fun->smpp_connect();														
         $search_qry="DELETE FROM smpp_setup_request where smsc_id like '$smsc_id' limit 1";
         $exe_qry=mysql_query($search_qry) or die(mysql_error());
         mysql_close($con);


    }
    
    /*
    * modified by:Balachandra<balachandra@hostnsoft.com>
    *  date: 29/07/2013
    */
   function change_pwd($request, $session){
       
      #store the posted current password  in $curr_pwd
      $curr_pwd = $request['curr_pwd'];

      #store the posted new password in $new_pwd
      $new_pwd = $request['new_pwd'];

      #getting the session userid
      $userid = $session['userid'];

      #confirm password also stored in $confirm_pwd
      $confirm_pwd = $request['confirm_pwd'];

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
   
   function change_emailid($request, $session){
        $funobj = new fun();
        $new_emailid=$request['new_emailid'];
        $confirm_emailid=$request['confirm_emailid'];
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
   
   function delete_emailid($request, $session){
       $funobj = new fun();
        $result = $funobj->delete_emailid();
        if($result){
                  echo 1;
        } 

       
   }
   
   function resend_ecode($request, $session){
       
       $funobj = new fun();
        $result = $funobj->resend_ecode();
        if($result){
                echo 1;
        }
        
   }
   function search_rate($request, $session){
       
       $funobj = new fun();
       $a = $funobj->check_rate($request['code']);
       echo $a;
      
       
   }
   function signup($request, $session){
    
       
     include_once("classes/signup_class.php");
     $signup_obj = new signup_class();
//     $msg=$signup_obj->sign_up($request);
     
        #default currency 
     $request['currency'] = 8;
     $request['firstName'] = "We miss your Name";
        $msg=$signup_obj->signUp($request);
      $msg = json_decode($msg);
//     if(isset($_GET["callback"])){
//     echo $_GET["callback"]."(".$msg.")"; 
//    }else
//     echo $msg;  
     
     if($msg->status == "success")
         header("Location: userhome.php#!contact.php");
     else {
         header("Location: /index.php?error=".$msg->msg);
     }
     exit();
   }
   function signupP91($request, $session){
       /* phone91 signup */
       
     include_once("classes/signup_class.php");
     $signup_obj = new signup_class();
//     die("check");
     #set 1 for currency flage
     $msg=$signup_obj->signUp($request,1);
     $msg = json_decode($msg);
     
     if($msg->status == "success")
         header("Location: userhome.php#!contact.php");
     else {
         
         $value = base64_encode(json_encode(array("request"=>$request,"msg"=>$msg->msg,"status"=>$msg->status)));
         $domain = $request['domain'];
         header("Location: "."https://".$domain."/signup.php?value=".$value);
     }
     exit();
   }
   function update_profile($request, $session){
       
    include_once("classes/profile_class.php");
    $check_parrent=$pro_obj->check_parent_reseller($request['id']);
    if($pro_obj->check_admin() || $check_parrent)
    {
    echo $msg=$pro_obj->update_client_details();
    }
       
   }
   
   function resetClientPassword($request, $session){
       
    include_once("classes/reseller_class.php");
    $res_obj=new reseller_class();
    echo $msg=$res_obj->resetClientPassword($request,$session);
        
   }
   
   function updateStatus($request, $session){
       
      include_once("classes/profile_class.php");
      $check_parrent=$pro_obj->check_parent_reseller($request['cid']);
      if($pro_obj->check_admin() || $check_parrent)
      {
               $pro_obj->updateSta($request['cid'], $request['cstatus']);//update user status recursively
               echo "Client status updated.";
      }
       
   }
   function update_dialplan($request, $session){
       
      include_once("classes/profile_class.php");
      echo $msg=$pro_obj->edit_default_route();
       
   }
   function edit_details($request, $session){
       
    include_once("classes/setting_class.php");
    $editobj=new setting_class();
    $userid=$session["userid"];
    echo $msg=$editobj->update_newdetails($request,$userid);
       
   }
   
   
   
   function searchClient($request, $session){
        
	include_once("classes/reseller_class.php");
	$reseller_obj=new reseller_class();
	$userId=$session["id"];	
	if(isset($request["term"]))
		$q=$request["term"];
	else
		$q="";
	//echo $msg=$pin_obj->generateBatch($request,$userId);
	echo $reseller_obj->searchChiildList($userId,$q);
      
       
   }
   
   function changeResellerSettings($request, $session){
        
	include_once("classes/reseller_class.php");
	$reseller_obj=new reseller_class();
	$userId=$session["id"];
        
	echo $reseller_obj->changeResellerSettings($request,$userId);
      
       
   }
   function updateProfile($request, $session){
        $con = dbConnect();
        if($con){
        $update_sql = "UPDATE `user_profile` SET `name`='".$request['name']."',
            `dob`='".$request['dob']."',`city`='".$request['city']."',
            `zip`='".$request['zip']."',`country`='".$request['country']."', 
            `address`='".$request['address']."',`sex`=".$request['sex'].",
            `ocupation`='".$request['ocupation']."' WHERE userid=".$session['userid'];
        echo mysql_query($update_sql,$con);
        mysql_close($con);
        }


   }
   
   function changeSettings($request, $session){
       
        $con = dbConnect();
	$value = ($request['value'] == 0)?1:0;
	$update_sql = "UPDATE profile_settings SET ".$request['key']."=".$value." WHERE user_id =".$session['userid'];
	mysql_query($update_sql,$con);
	mysql_close($con);
       
   }
   
    /**
    * Add a new plan using
    * Imported File
    * Old existing Plans
    * New Plans
    */
   function add($request, $session){
       
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->addPlan($request, $session, $_FILES);
      
       
   }
    /**
    * Editing a plan single detail
    */

   function edit_plan($request, $session){
       
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->editPlan($request, $session);
       
   }
    /**
    * Deleting a plan single detail
    */

   function delete_plan($request, $session){
       
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->deletePlan($request, $session);  
       
   }
    /**
    * Multiple deletion of plans and plan details 
    * Kept details in backup before deletion
    */

   function delete_plans($request, $session){
    include_once("classes/plan_class.php");
    $plan_obj = new plan_class();
    echo $msg = $plan_obj->deletePlans($request, $session);

       
   }
    //change batch status
    function batch_status($request, $session){
       include_once("classes/pin_class.php");
     $pin_obj = new pin_class();
     echo $msg = $pin_obj->batchStatus($request); 


    }
    /**
    * Update user fund
    */


   function edit_funds($request, $session){
       
        $con = dbConnect();
          $insert_sql = "INSERT INTO `reseller_transaction`
                        ( `trans_fuserid`, `trans_tuserid`, `trans_amt`, `trans_crnt_amt`, `trans_type`) 
                 VALUES (".$session['userid'].",".$request['to_id'].",".$request['amount_transfer'].",".$request['balance'].",'".$request['type']."')";
          echo mysql_query($insert_sql, $con);
       
   }
   /**
 * Update user contact detail
 */
   function update_contactno($request, $session){
       
        include_once("classes/updateContact_class.php");
	$contobj = new updateContact_class();
	echo $update_contact = $contobj->changeContact($request, $session);
       
   }
    /**
    * delete phone no
    */
   function delete_phoneno($request, $session){
    include_once("classes/updateContact_class.php");
    $contobj = new updateContact_class();
    echo $update_contact = $contobj->deleteContact($request['phone_no'], $session['userid']);
      
       
   }
    /**
    * add a new subsite
    */
   function add_subsite($request, $session){
        include_once("classes/subSite_class.php");
        $siteobj = new subSite_class();
        echo $result = $siteobj->addSubsite($request, $session); 


   }
    /**
    * edit a subsite
    */
   function edit_subsite($request, $session){
    include_once("classes/subSite_class.php");
    $siteobj = new subSite_class();
    echo $result = $siteobj->editSubsite($_POST);

       
   }
    /**
    * delete a subsite
    */
   function delete_subsite($request, $session){
        include_once("classes/subSite_class.php");
        $siteobj = new subSite_class();
        echo $result = $siteobj->deleteSubsite($request['subsite_pid']); 
      
       
   }

    #created by sudhir pandey (sudhir@hostnsoft.com)
    #creation date 26-09-2013
    #login redirect from other domain 
    function loginRedirect($request, $session){
        
        $userid = $request['uname'];
        $pwd = $request['pwd'];
        $remember_me = $request['rememberMe'];
        $host = $request['domain']; 
      
        $session['currentHost'] = $host;
        $funobj = new fun();
        $funobj->login_user($userid,$pwd,$remember_me,$host);  


    }


    #created by sudhir pandey <sudhir@hostnsoft.com>
    #creation date 07/10/2013
    #function use to add whiteLabel id's
    function addWhiteLabel($request, $session){
    
        include_once("classes/setting_class.php");
        $settingObj=new setting_class();
        $userid=$session["userid"];
        echo $msg=$settingObj->addWhiteLabel($request,$userid);
    }
    
    
    function deleteWhiteLabelIds($request, $session){
        include_once("classes/setting_class.php");
        $settingObj=new setting_class();
        $userid=$session["userid"];
        echo $msg=$settingObj->deleteWhiteLabelIds($request['userName'],$userid);
    }
    
   function loadMoreClientByPage($request,$session)
   {
      include_once( "classes/reseller_class.php");
      $res_obj = new reseller_class();
      $result = $res_obj->manageClients($request,$session);
      echo $result;
      //print_r(json_decode($result,TRUE));
   }

    function loadMoreBatchClientByPage($request,$session)
   {
      include_once( "classes/reseller_class.php");
      $res_obj = new reseller_class();
      $result = $res_obj->bulkUserBatch($request['resId'],$request['q'],$request['pageNo']);
      echo $result;
      //print_r(json_decode($result,TRUE));
   }

    function loadMorePinByPage($request,$session)
   {
      include_once( "classes/pin_class.php");
      $pinObj = new pin_class();
      $result = $pinObj->getMyPin($request['userId'],$request['pageNo']);
      echo $result;
      //print_r(json_decode($result,TRUE));
   }
   
   function exportPinList($request,$session)
   {
      include_once( "classes/pin_class.php");
      $pinObj = new pin_class();
      $result = $pinObj->exportPinList($request['batchId'],$session['userid']);
      echo $result;
   }

   function loadMoreAcmByPage($request,$session)
   {
       include_once("classes/account_manager_class.php");
        $acmObj = new Account_manager_class();
      $result = $acmObj->allManagerList($request,$session);
      echo $result;
      //print_r(json_decode($result,TRUE));
   }
   
    function contactForm($request,$session)
    {
        
        //validate fields
        if (!preg_match("/^[0-9]+$/", $request['number'])) 
        {
            return json_encode(array("status" => "error","msg" => "please enter valid number!"));
        }
        
        if (!preg_match("/^[a-zA-Z]+$/", $request['name'])) 
        {
            return json_encode(array("status" => "error","msg" => "please enter valid name!"));
        }
        
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request['email'])) 
        {
            return json_encode(array("status" => "error","msg" => "please please enter valid email address!"));
        }
          
        //set param to mail
        $from = $request['email'];
        $fromname=$request['name'];
        $number = $request['number'];
        
        $msg = '<pre>'.$request['message'].'
            Regards:
            '.$fromname.'
            '.$number.'</pre>';
        
        $funObj = new fun();
        
        $result = $funObj->getDomainResellerId($_SERVER['HTTP_HOST'],2);
        
        //include required files
        include_once(dirname(__FILE__).'/classes/websiteClass.php');
        
        $webObj = new websiteClass();

        //get reseller id
        $resellerId = $result['resellerId'];

        //get website details
        $getGenData = json_decode($webObj->getGeneralData($_SERVER['HTTP_HOST'],$resellerId),TRUE);
        
        //set contact email
        $contactEmail = (isset($getGenData['contact']['email'] ) and $getGenData['contact']['email'] != '' )? $getGenData['contact']['email'] : '' ;
        
        if($contactEmail != '')
        {
            $funObj->sendErrorMail($contactEmail,$msg,$from,'Regarding Contact Form');
            return json_encode(array('status' => 'success','msg' => 'Your comment successfully sent!!!'));
        }
        else 
        {
            return json_encode(array('status' => 'error','msg' => 'Email for This reseller not set,contact to Your reseller'));
        }
        //call mail function 
       
    }
    
    
    function addFeedBackAndRequirements($request,$session){
        include_once("classes/reseller_class.php");
        $client_obj = new reseller_class();
        echo $msg=$client_obj->addFeedBackAndRequirements($request);
    }
    
    function addAcm($request,$session){
        include_once("classes/account_manager_class.php");
        $acmObj = new Account_manager_class();
        echo $msg=$acmObj->addAccountManager($request,$session);
    }
    
     function checkAcmExists($request,$session){
        include_once("classes/account_manager_class.php");
        $acmObj = new Account_manager_class();
        echo $msg=$acmObj->checkAcmExists($request,$session);
    }
    
    function deleteAcm($request,$session)
    {
        include_once("classes/account_manager_class.php");
        $acmObj = new Account_manager_class();
        echo $msg=$acmObj->deleteAcm($request,$session);
    }
    
    function addUpdateDepartment($request,$session)
    {
        include_once("classes/clickToCall_plugin_class.php");
        $ctcObj = new clickToCall_plugin_class();
        echo $msg=$ctcObj->addUpdateDepartment($request,$session);
    }
    
    function getDeptNumberList($request,$session)
    {
        include_once("classes/clickToCall_plugin_class.php");
        $ctcObj = new clickToCall_plugin_class();
        echo $msg=$ctcObj->getDeptNumberList($request,$session);
    }
    
    function addNumberToDept($request,$session)
    {
        include_once("classes/clickToCall_plugin_class.php");
        $ctcObj = new clickToCall_plugin_class();
        echo $msg=$ctcObj->addNumberToDept($request,$session);
    }
    
    function deleteNumberFromDept($request,$session)
    {
        include_once("classes/clickToCall_plugin_class.php");
        $ctcObj = new clickToCall_plugin_class();
        echo $msg=$ctcObj->deleteNumberFromDept($request,$session);
    }
    
    function deleteDept($request,$session)
    {
        include_once("classes/clickToCall_plugin_class.php");
        $ctcObj = new clickToCall_plugin_class();
        echo $msg=$ctcObj->deleteDept($request,$session);
    }
    
    function addBlockUserInfo($request,$session)
    {
        include_once 'function_layer.php';
        $funObj = new fun();
        
        echo  $funObj->addBlockUserInfo($request);  
    }
    
    function changeAcmPwd($request,$session)
    {
      #store the posted current password  in $curr_pwd
      $currPwd = $request['curr_pwd'];

      #store the posted new password in $new_pwd
      $newPwd = $request['new_pwd'];

      #getting the session userid
      $acmId = $session['acmId'];

      #confirm password also stored in $confirm_pwd
      $confirmPwd = $request['confirm_pwd'];

      #required field validator 
      if($currPwd == "" || $newPwd == "" || $acmId== "" || $confirmPwd =="")
      {
          echo json_encode(array('msgtype'=>'error','msg'=>'All fields are required please provide proper input'));		
          exit();
      }


      #comapre entered two new passwords
      if( $confirmPwd === $newPwd )
      { 
          #not needed any more 
              #remove new lines and slashes in the variable;
    //		$new_pwd = $funobj->sql_safe_injection($new_pwd);

              #$a is the variable to return a value from the function layer
            include_once("classes/account_manager_class.php");
            $acmObj = new Account_manager_class();
            $a = $acmObj->changeAcmPwd($currPwd,$newPwd);	
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
    
//    function acmLogin($request,$session)
//    {
//        include_once("classes/account_manager_class.php");
//        $acmObj = new Account_manager_class();
//        echo $msg = $acmObj->acmLogin($request,$session);
//    }
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