<?php
require('inc/essentials.php');
require('inc/db_config.php');
//adminLogin();


?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel- Features & Facilities</title>
   <?php
   require('inc/links.php');
   ?>
</head>

<body class="bg-white">
   <?php
   require('inc/header.php');
   ?>

   <!-- Features -->
   <div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">Features & Facilities</h3>

            <!-- Features Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Features</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#features-s">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>
                    <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="features-data"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Facilities Section (Fixed) -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Facilities</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>
                    <div class="table-responsive-md" style="height: 350px; overflow-y: auto;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" width="40%">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="facilities-data"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- Closing col-lg-10 -->
    </div> <!-- Closing row -->
</div> <!-- Closing container-fluid -->


   <!-- Features modal -->

   <div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <form id="features_s_form">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Add Features</h5>
               </div>
               <div class="modal-body">
                  <div class="mb-3">
                     <label class="form-label fw-bold">Name</label>
                     <input type="text" name="features_name" class="form-control shadow-none" required>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
               </div>
            </div>
         </form>
      </div>

   </div>
   <?php echo $_SERVER['DOCUMENT_ROOT'] ?>

   <!-- Facility modal -->

   <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <form id="facility_s_form">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Add Facility</h5>
               </div>

               <div class="modal-body">
                  <div class="mb-3">
                     <label class="form-label fw-bold">Name</label>
                     <input type="text" name="facility_name" class="form-control shadow-none" required>
                  </div>

                  <div class="mb-3">
                     <label class="form-label fw-bold">Icon</label>
                     <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none" required>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Desciption</label>
                  <textarea name="facility_desc" class="form-control shadow-none" rows="1"></textarea>
               </div>
               <div class="modal-footer">
                  <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <?php require('inc/scripts.php'); ?>
   <script src="scripts/features_facilities.js"></script>
</body>

</html>