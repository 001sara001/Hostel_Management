<?php
   
   require('../inc/db_config.php');
   require('../inc/essentials.php');
   //adminLogin(); //if not login,redirect to login page


   if(isset($_POST['get_general'])){ //checks if get_general has post data,if yes then retrieve the data
    $q="SELECT * from `settings` where `sr_no`=?";
    $values=[1];
    $res=select($q,$values,"i");  //matches the value with select
    $data=mysqli_fetch_assoc($res); //retrieves the result as an associative array.
    $json_data=json_encode($data);
    echo $json_data;
   }

   if(isset($_POST['upd_general'])){
      $frm_data=filteration($_POST);
      $q="UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?";
      $values=[$frm_data['site_title'],$frm_data['site_about'],1];
      $res=update($q,$values,"ssi");
      echo $res;
   }

   if(isset($_POST['upd_shutdown'])){
      $frm_data=($_POST['upd_shutdown']==0)?1:0;//if 0 then 1,if else type
      $q="UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
      $values=[$frm_data,1];
      $res=update($q,$values,"ii");
      echo $res;
   }

   if(isset($_POST['get_contacts'])){
      $q="SELECT * from `contact_details` where `sr_no`=?";
      $values=[1];
      $res=select($q,$values,"i");
      $data=mysqli_fetch_assoc($res);
      $json_data=json_encode($data);
      echo $json_data;
     }

     if(isset($_POST['upd_contacts'])){
      $frm_data=filteration($_POST);
      $q="UPDATE `contact_details` SET `address`=?,`gmap`=?,`pn1`=?,`email`=?,`fb`=?,`insta`=?,`tw`=?,`iframe`=? where `sr_no`=?";
      $values=[$frm_data['address'],$frm_data['gmap'],$frm_data['pn1'],$frm_data['email'],$frm_data['fb'],$frm_data['insta'],$frm_data['tw'],$frm_data['iframe'],1];
      $res=update($q,$values,"ssssssssi");
      echo $res;
   }

   if(isset($_POST['add_member'])){
      $frm_data=filteration($_POST);
      $img_r = uploadImage($_FILES['picture'],ABOUT_FOLDER);

      if($img_r=='inv_img'){
         echo $img_r;
      }
      else if($img_r=='inv_size'){
         echo $img_r;

     }
     else if($img_r=='upd_failed'){
         echo $img_r;
      

  }
  else{}
   }




?>