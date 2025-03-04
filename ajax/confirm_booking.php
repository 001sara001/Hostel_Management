<?php

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');


    if(isset($_POST['check_availability'])){
        $firm_data = filteration($_POST);
        $satus = "";
        $result = "";

        

        $today_date = new DateTime(date("Y-m-d"));
        $checkin_date = new DateTime($firm_data['checkin']);
        $checkout_date = new DateTime($firm_data['checkout']);

        if($checkin_date == $checkout_date){
            $satus = 'check_in_out_equal';
        }else if( $checkout_date < $checkin_date){
            $satus = 'check_out_earlier';
            $result = json_encode(['status'=>$satus]);
        }else if( $checkout_date < $today_date){
            $satus = 'check_in_earlier';
            $result = json_encode(['status'=>$satus]);
        }

        //check booking availability


    }

 ?>