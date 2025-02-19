
let general_data,contacts_data;

let general_s_form=document.getElementById('general_s_form');
let site_title_inp=document.getElementById('site_title_inp');
let site_about_inp=document.getElementById('site_about_inp');

let contacts_s_form=document.getElementById('contacts_s_form');
let carousel_s_form=document.getElementById('carousel_s_form');
let member_picture_inp=document.getElementById('member_picture_inp');



carousel_s_form.addEventListener
('submit',function(e){
   e.preventDefault();
   add_team();
});

function add_member(){
   let data = new FormData();
   data.append('picture',member_picture_inp.files[0]);
   data.append('add_member','');

   let xhr=new XMLHttpRequest();
   xhr.open("POST","ajax/settings_crud.php",true);

   xhr.onload=function(){

     // var myModal = document.getElementById('general-s');//just id fetching
     // var modal = bootstrap.Modal.getInstance(myModal);
     // modal.hide(); //for hiding the modal after submitting

     // if(this.responseText==1 ){
     //    alert('success','Changes Saved');
     //    get_general();
     // }else{
      //   alert('error','No changes are made');
      }
   

   xhr.send(data);

}

window.onload=function(){
}
