<?php
require('../inc/db_config.php');
require('../inc/essentials.php');



if(isset($_POST['get_users'])) {
  $res=selectAll('user_cred');
  $i=1;
  $path= USERS_IMG_PATH;

  $data= "";

  while($row=mysqli_fetch_assoc($res)){
    $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
                 <i class='bi bi-trash'></i>
             </button>";
    $verfied = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";
    
    $status="<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
    
    if (!$row['status']) {
        $status = "<button onclick='toggle_status($row[id], 0)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
    } else {
        $status = "<button onclick='toggle_status($row[id], 1)' class='btn btn-success btn-sm shadow-none'>Active</button>";
    }

    $date= date("d-m-Y",strtotime($row['datentime']));
    
    $data.="
    <tr>
        <td>$i</td>
        <td>
            <img src='$path$row[profile]' width='50px'>
            <br>
            $row[name]
        </td>
        <td>$row[email]</td>
        <td>$row[phonenum]</td>
        <td>$row[address]</td>

        <td>$row[dob]</td>
        <td>$status</td>
        <td>$date</td>
        <td>$del_btn</td>

        <td></td>
    </tr>
      ";
     $i++;
  }

  echo $data;
}


if (isset($_POST['toggle_status'])) {
   $frm_data=filteration($_POST);
   $q="UPDATE `user_cred` SET `status`=? WHERE `id`=?";
   $v=[$frm_data['value'],$frm_data['toggle_status']];
   if(update($q,$v,'ii')){
    echo 1;
   }else{
    echo 0;
   }
  }


  if(isset($_POST['add_image'])){
    $frm_data = filteration($_POST);
    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

    if($img_r == 'inv_img'){
        echo $img_r;
    }
    else if($img_r == 'inv_size'){
        echo $img_r;
    }
    else if($img_r == 'upd_failed'){
        echo $img_r;
    }
    else {
        // Ensure $q is always set
        $q = "INSERT INTO `room_images`(`room_id`, `image`) VALUES (?,?)";
        $values = [$frm_data['room_id'], $img_r];
        $res = insert($q, $values, 'is');
        echo $res;
    }
}


if (isset($_POST['remove_user'])) {

    $frm_data = filteration($_POST);

    $res = delete("DELETE FROM `user_cred` WHERE `id` = ? AND `is_verified` = ?", [$frm_data['user_id'], 0], 'ii');
    
    if ($res) {
        echo 1;
    } else {
        echo "Error: " . mysqli_error($conn); // Log the error message
    }
    
}

if(isset($_POST['search_users'])) {
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ? OR `email` LIKE ?";

    // Use the parameters correctly in the select query
    $search = "%{$frm_data['search']}%"; // Add wildcards for LIKE
    $res = select($query, [$search, $search], 'ss');
    
    $i=1;
    $path= USERS_IMG_PATH;
  
    $data= "";
  
    while($row=mysqli_fetch_assoc($res)){
      $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
                   <i class='bi bi-trash'></i>
               </button>";
      $verfied = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";
      
      $status="<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
      
      if (!$row['status']) {
          $status = "<button onclick='toggle_status($row[id], 0)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
      } else {
          $status = "<button onclick='toggle_status($row[id], 1)' class='btn btn-success btn-sm shadow-none'>Active</button>";
      }
  
      $date= date("d-m-Y",strtotime($row['datentime']));
      
      $data.="
      <tr>
          <td>$i</td>
          <td>
              <img src='$path$row[profile]' width='50px'>
              <br>
              $row[name]
          </td>
          <td>$row[email]</td>
          <td>$row[phonenum]</td>
          <td>$row[address]</td>
  
          <td>$row[dob]</td>
          <td>$status</td>
          <td>$date</td>
          <td>$del_btn</td>
  
          <td></td>
      </tr>
        ";
       $i++;
    }
  
    echo $data;
  }



?>


