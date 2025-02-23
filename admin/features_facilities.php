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
                     <tbody id="features-data">
                           
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
  
                  
          </div>
       </div>
    </div>

     <!-- Facilities -->
     <div class="card border-0 shadow-sm mb-4">
         <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">Facilities</h5>
               <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
               <i class="bi bi-plus-square"></i> Add
               </button>
            </div>
            <div class="table-responsive-md" style="height: 350px; overflow-y: auto; padding-left: 260px;">
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
                  <tbody id="facilities-data">
                  </tbody>
            </table>
            </div>
         </div>
     </div> 

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
                  <input type="text" name="facility_name"  class="form-control shadow-none" required>
                  </div>

                  <div class="mb-3">
                  <label class="form-label fw-bold">Icon</label>
                  <input type="file" name="facility_icon"accept=".svg" class="form-control shadow-none" required>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Desciption</label>
                  <textarea name="facility_desc" class="form-control shadow-none" rows="1"></textarea>
               </div>
               <div class="modal-footer">
                  <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
               </div>
            </div>
         </form>
         </div>
      </div>
      
    <?php require('inc/scripts.php'); ?>

   <script>
      let features_s_form = document.getElementById('features_s_form');
      let facility_s_form = document.getElementById('facility_s_form');

      features_s_form.addEventListener('submit', function(e)
      {
         e.preventDefault();
         add_features(); 
      });


      
      function add_features() 
      {
         let data = new FormData();
         data.append('name', features_s_form.elements['features_name'].value);
         data.append('add_features', '');

         let xhr = new XMLHttpRequest();
         xhr.open("POST", "ajax/features_facilities.php", true);

         xhr.onload = function() {
            var myModal = document.getElementById('features-s'); 
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide(); //for hiding the modal after submitting

            if (this.responseText == 1) {
               alert('success', 'New features added');
               features_s_form.elements['features_name'].value= '';
              get_features();
            }else
            {
               alert('error', 'Server Down!');
            }
         }
        xhr.send(data);

      }

      function get_features ()
      {
         let xhr = new XMLHttpRequest();
         xhr.open("POST", "ajax/features_facilities.php", true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

         xhr.onload = function() 
         {
            document.getElementById ('features-data').innerHTML = this.responseText;
         }

         xhr.send('get_features');
      }



      function rem_feature(val)
      {
         let xhr = new XMLHttpRequest();
         xhr.open("POST", "ajax/features_facilities.php", true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

         xhr.onload = function() {
            if (this.responseText==1){
               alert('success','Feature removed!');
               get_features();
            }
            else if(this.responseText == 'room_added')
            {
               alert('error', 'Features is added in room');
            }
            else{
               alert('error','Server Down!');
            }
         }

         xhr.send('rem_feature='+val);
      }
      
      facility_s_form.addEventListener('submit', function(e)
      {
         e.preventDefault();
         add_facility(); 
      });
   
      function add_facility() 
      {
         let data = new FormData();
         data.append('name', facility_s_form.elements['facility_name'].value);
         data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
         data.append('desc', facility_s_form.elements['facility_desc'].value);
         data.append('add_facility', '');

         let xhr = new XMLHttpRequest();
         xhr.open("POST", "ajax/features_facilities.php", true);

         xhr.onload = function() 
         {
            var myModal = document.getElementById('facility-s'); 
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide(); //for hiding the modal after submitting

            if (this.responseText == 'inv_img') 
            {
            alert('error', 'Only SVG images are allowed');
            } else if (this.responseText == 'inv_size')
            {
               alert('error', 'Image should be less than 1MB!');
            } else if (this.responseText == 'upd_failed') 
            {
               alert('error', 'Image Upload failed!');

            } else 
            {
               alert('success', 'New facility added');
               facility_s_form.reset();
               //get_members();

            }
         }
        xhr.send(data);

      }
      
      function get_facilities ()
      {
         let xhr = new XMLHttpRequest();
         xhr.open("POST", "ajax/features_facilities.php", true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

         xhr.onload = function() 
         {
            document.getElementById ('facilities-data').innerHTML = this.responseText;
         }

         xhr.send('get_facilities');
      }

      function rem_facility(val)
      {
         let xhr = new XMLHttpRequest();
         xhr.open("POST", "ajax/features_facilities.php", true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

         xhr.onload = function() {
            if (this.responseText==1){
               alert('success','Facility removed!');
               get_facilities();
            }
            else if(this.responseText == 'room_added')
            {
               alert('error', 'Facility is added in room');
            }
            else{
               alert('error','Server Down!');
            }
         }

         xhr.send('rem_facility='+val);
      }
      window.onload = function()
      {
         get_features();
         get_facilities ();
      }
   
   </script>
    
</body>
</html>