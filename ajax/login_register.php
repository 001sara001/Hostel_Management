<?php

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');


    if(isset($_POST['register'] ))
    {
        $data = filteration($_POST);

        //match pass and cpass
        if($data['pass'] != $data['cpass']){
            echo 'pass_mismatch';
            exit;
        }

        //check whether user exists

        $u_exist = select("SELECT * FROM `user_cred` WHERE email = ? OR phonenum = ? LIMIT 1", [$data['email'], $data['phonenum']], "ss");

        
        if(mysqli_num_rows($u_exist)!=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email']==$data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        //upload user image to server

        $img = uploadUserImage($_FILES['profile']);

        if ($img == 'ing_img'){
            echo 'inv_img';
            exit;
        } else if ($img == 'upd_failed'){
            echo 'upd_failed';
            exit; 
        }

        //send confirmation link to users email-----no need for now

        // if (!send_mail($data['email'], $data['name'], $token )){
        //     echo 'mail_failed';
        //     exit;
        // }

        //new code gula ekhanee:
        $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

        $query = "INSERT INTO `user_cred`( `name`, `email`, `address`, `phonenum`, `pincode`, `dob`,
         `profile`, `password`) VALUES (?,?,?,?,?,?,?,?)";

        $value = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$data['pincode'],$data['dob'],
        $img,$enc_pass];

        if (insert ($query, $value, 'ssssssss')){
            echo 1;
        } 
        else {
            echo 'ins_failed';
        }
    }

?>