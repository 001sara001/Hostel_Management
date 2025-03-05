<?php 
    require('inc/essentials.php');
    //adminLogin();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-DashBorad</title>
    <?php
       require('inc/links.php');
    ?>
</head>
<body class="bg-white"> 
<?php
       require('inc/header.php');
    ?>
   <div class="container-fluid" id="main-content">
   <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
         <h2>Hello Admin!</h2>
         Welcome to the ResiManage website admin panel. Here you can manage all the bookings and users.
         
         <div class="row">
            <!-- Card for Total Bookings -->
            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Manage Bookings</h5>
                     <p class="card-text">Manage all the bookings.</p>
                  </div>
               </div>
            </div>

            <!-- Card for All Users -->
            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">All Users</h5>
                     <p class="card-text">Manage all User accounts.</p>
                  </div>
               </div>
            </div>
         </div>

         <!-- Second Row of Cards -->
         <div class="row">
            <!-- Card for Total Rooms -->
            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Manage Rooms</h5>
                     <p class="card-text">Add rooms using appropriate facilities and features.</p>
                  </div>
               </div>
            </div>

            <!-- Card for Recent Bookings -->
            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Manage website</h5>
                     <p class="card-text">Shut down website when necessary.</p>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>

    <?php
       require('inc/scripts.php');
    ?>
</body>
</html>