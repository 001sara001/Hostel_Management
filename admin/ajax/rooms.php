<?php
require('../inc/db_config.php');
require('../inc/essentials.php');

if (isset($_POST['add_room'])) {
    $features = filteration(json_decode($_POST['features']));
    $facilities = filteration(json_decode($_POST['facilities']));
    
    $frm_data = filteration($_POST);
    $flag = 0;
    
    // Insert room data into the 'rooms' table
    $q1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `description`) VALUES (?,?,?,?,?,?)";
    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['desc']];
    
    // Ensure the room is inserted
    if (insert($q1, $values, 'siiiis')) {
        $room_id = mysqli_insert_id($con);  // Get the ID of the newly inserted room
        $flag = 1;
    } else {
        echo "Room insertion failed";
        exit;
    }

    // Insert facilities into 'room_facilities' table
    $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {
        foreach ($facilities as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query cannot be executed for facilities insert');
    }

    // Insert features into 'room_features' table
    $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";  // Correct the table name here
    if ($stmt = mysqli_prepare($con, $q3)) {
        foreach ($features as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query cannot be executed for features insert');
    }

    // Check if all queries were successful
    if ($flag) {
        echo 1;  // Success
    } else {
        echo 0;  // Failure
    }
}


if(isset($_POST['get_all_rooms'])) {
  $res=selectAll('rooms');
  $i=0;

  $data= "";
  while($row=mysqli_fetch_assoc($res)){


    if($row['status']==1){
        $status="<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
    }
    else{
        $status="<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
    }
    $data.="
     <tr class='align-middle'>
        <td>$i</td>
        <td>$row[name]</td>
        <td>$row[area] sq. ft</td>
        <td>
            <span class='badge rounded-pill bg-light text-dark'>
               Adult:$row[adult]
            </span><br> 
        </td>
        <td>Tk $row[price]</td>
        <td>$row[quantity]</td>
        <td>$status</td>
        <td>
            <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i>
             </button>
        </td>
     </tr>
     ";
     $i++;
  }

  echo $data;
}

if(isset($_POST['get_room'])) {
    $frm_data=filteration($_POST);
    $res1=select("SELECT * FROM `rooms` where `id`=?",[$frm_data['get_room']],'i');
    $res2=select("SELECT * FROM `room_features` where `room_id`=?",[$frm_data['get_room']],'i');
    $res3=select("SELECT * FROM `room_facilities` where `room_id`=?",[$frm_data['get_room']],'i');

    $roomdata=mysqli_fetch_assoc($res1);
    $features=[];
     $facilities=[];
    if(mysqli_num_rows($res2)>0){
       while($row=mysqli_fetch_assoc($res2)){
        array_push($features,$row['features']);
       }
    }

    if(mysqli_num_rows($res3)>0){
        while($row=mysqli_fetch_assoc($res3)){
         array_push($facilities,$row['facilities']);
        }
     }

     $data=["roomdata"=>$roomdata,"features"=>$features,"facilities"=>$facilities];
     $data=json_encode($data);

     echo $data;
 }


 if (isset($_POST['edit_room'])){
    $features = filteration(json_decode($_POST['features']));
    $facilities = filteration(json_decode($_POST['facilities']));
    
    $frm_data = filteration($_POST);
    $flag = 0;

    $q1="UPDATE `rooms` SET `name`=?,`area`=?,`price`=?,`quantity`=?,`adult`=?,`description`=? WHERE `id`=?";
    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['desc'],$frm_data['room_id']];
    if(update($q1,$values,'siiiisi')){
        $flag=1;

    }
    $del_features=delete("DELETE FROM `room_features` where `room_id`=?",[$frm_data['room_id']],'i');
    $del_facilities=delete("DELETE FROM `room_facilities` where `room_id`=?",[$frm_data['room_id']],'i'); 

    if(!($del_facilities && $del_features)){
        $flag=0;
    }
    $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {
        foreach ($facilities as $f) {
            mysqli_stmt_bind_param($stmt, 'ii',  $frm_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag=1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query cannot be executed for facilities insert');
    }

    // Insert features into 'room_features' table
    $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";  // Correct the table name here
    if ($stmt = mysqli_prepare($con, $q3)) {
        foreach ($features as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag=1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query cannot be executed for features insert');
    }

    // Check if all queries were successful
    if ($flag) {
        echo 1;  // Success
    } else {
        echo 0;  // Failure
    }

} 

if (isset($_POST['toggle_status'])) {
   $frm_data=filteration($_POST);
   $q="UPDATE `rooms` SET `status`=? WHERE `id`=?";
   $v=[$frm_data['value'],$frm_data['toggle_status']];
   if(update($q,$v,'ii')){
    echo 1;
   }else{
    echo 0;
   }
  }
?>


