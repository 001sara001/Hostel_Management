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

