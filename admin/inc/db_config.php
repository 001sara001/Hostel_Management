<?php

  $hname='localhost';
  $uname='root';
  $pass='';
  $db='hbwebsite';

  $con=mysqli_connect($hname,$uname,$pass,$db);
 
  if(!$con){
     die("Cannot Connect to Database".mysqli_connect_error());  
  }

  //for filtering like removing extra spaces and convertion
  function filteration($data){
    foreach($data as $key=>$value){
      $value=trim($value);
      $value=stripslashes($value);
      $value=htmlspecialchars($value);
      $value=strip_tags($value);

      $data[$key] = $value;
    }

    return $data;
  }

  function selectAll($table){
    $con= $GLOBALS['con'];
    $res = mysqli_query($con, "SELECT * FROM $table");
    return $res;
  }

  function select($sql,$values,$datatypes){
    $con=$GLOBALS['con']; //for accessing the data outside the function
    if($stmt=mysqli_prepare($con,$sql)){
        //...->splat operator,for dynamically passing the data
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
          $res=mysqli_stmt_get_result($stmt);    
          mysqli_stmt_close($stmt); //for closing 
          return $res;
        }
        else{
          mysqli_stmt_close($stmt); //for closing 
          die("Query cannot be executed-Select"); 
        }
       
    }else{
      die("Query cannot be prepared-Select"); //to understand that error has come from select function
    }
  }

  function update($sql,$values,$datatypes){
    $con=$GLOBALS['con']; //for accessing the data outside the function
    if($stmt=mysqli_prepare($con,$sql)){
        //...->splat operator,for dynamically passing the data
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
          //$res=mysqli_stmt_affected_rows($stmt);  //for affected rows
          $res=mysqli_stmt_affected_rows($stmt);   
          mysqli_stmt_close($stmt); //for closing 
          return $res;
        }
        else{
          mysqli_stmt_close($stmt); //for closing 
          die("Query cannot be executed-Update"); 
        }     
    }else{
      die("Query cannot be prepared-Update"); //to understand that error has come from select function
    }
  }

  function insert ($sql,$values,$datatypes){
    $con=$GLOBALS['con']; //for accessing the data outside the function
    if($stmt=mysqli_prepare($con,$sql)){
        //...->splat operator,for dynamically passing the data
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
          //$res=mysqli_stmt_affected_rows($stmt);  //for affected rows
          $res=mysqli_stmt_affected_rows($stmt);   
          mysqli_stmt_close($stmt); //for closing 
          return $res;
        }
        else{
          mysqli_stmt_close($stmt); //for closing 
          die("Query cannot be executed-Insert"); 
        }     
    }else{
      die("Query cannot be prepared-Insert"); //to understand that error has come from select function
    }
  }

  function delete($sql,$values,$datatypes){
    $con=$GLOBALS['con']; //for accessing the data outside the function
    if($stmt=mysqli_prepare($con,$sql)){
        //...->splat operator,for dynamically passing the data
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
          //$res=mysqli_stmt_affected_rows($stmt);  //for affected rows
          $res=mysqli_stmt_affected_rows($stmt);   
          mysqli_stmt_close($stmt); //for closing 
          return $res;
        }
        else{
          mysqli_stmt_close($stmt); //for closing 
          die("Query cannot be executed-Delete"); 
        }     
    }else{
      die("Query cannot be prepared-Delete"); //to understand that error has come from select function
    }
  }
?>