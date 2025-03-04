<?php

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');


    if(isset($_POST['check_availability'])){
        $firm_data = filteration($_POST);
        $status = "";
        $result = "";

        $today_date = new DateTime(date("Y-m-d"));
        $checkin_date = new DateTime($firm_data['checkin']);
        $checkout_date = new DateTime($firm_data['checkout']);

        if($checkin_date == $checkout_date){
            $status = 'check_in_out_equal';
        }else if( $checkout_date < $checkin_date){
            $status = 'check_out_earlier';
            $result = json_encode(['status'=>$status]);
        }else if( $checkin_date < $today_date){
            $status = 'check_in_earlier';
            $result = json_encode(['status'=>$status]);
        }

        //check booking availability

        if ($status != ''){
            echo $result;
        } else {
            session_start();
            $_SESSION['room'];     

            //run query to check room is available or not

            $count_days = date_diff($checkin_date, $checkout_date)->days;
            $payment = $_SESSION ['room']['price']  * $count_days;

            $_SESSION ['room']['payment'] = $payment;
            $_SESSION ['room']['available'] = true;

            $result = json_encode(["status"=>'available', "days"=>$count_days, "payment"=>$payment]);
            echo $result;     
        }

        

    }

 ?>