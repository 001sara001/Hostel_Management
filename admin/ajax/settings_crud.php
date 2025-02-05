<?php
   
   require('../inc/db_config.php');
   require('../inc/essentials.php');
   adminLogin(); //if not login,redirect to login page


   if(isset($_POST['get_general'])){ //checks if get_general has post data,if yes then retrieve the data
    $q="select * from `settings` where `sr_no`=?";
    $values=[1];
    $res=select($q,$values,"i");  //matcher the value with select
    $data=mysqli_fetch_assoc($res); //retrieves the result as an associative array.
    $json_data=json_encode($data);
    echo $json_data;
   }

   if(isset($_POST['upd_general'])){
      $frm_data=filteration($_POST);
      $q="UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?";
      $values=[$frm_data['site_title'],$frm_data['site_about'],1];
      $res=update($q,$values,"ssi");
   }

   if(isset($_POST['upd_shutdown'])){
      $frm_data=($_POST['upd_shutdown']==0)?1:0;//if 0 then 1,if else type
      $q="UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
      $values=[$frm_data,1];
      $res=update($q,$values,"ii");
   }

?>