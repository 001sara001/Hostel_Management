<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management - Contact</title>
    
    <?php require('inc/links.php')?>
    

</head>
<body class="bg-light">

  <?php require('inc/header.php') ?>

  <div class="my-5 px-4">
    <h2 class="fw-blod h-font text-center">Contact Us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
       Obcaecati repellat maiores similique molestiae itaque unde atque laudantium neque! 
       Adipisci deleniti reprehenderit iure esse nostrum laudantium, sed ea iste voluptates cum.
    </p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 md-5 px-4">
        <div class="bg-white roundrd shadow p-4 ">
        <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12242.810535347071!2d90.3601797226947!3d23.764905874320785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c09f9ba3d447%3A0x1babce9f1c6c95a3!2sMohammadpur%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1737627021584!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <h5>Address</h5>
          <a href="https://maps.app.goo.gl/LJPcaohsQBZ6hF6F8" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <i class="bi bi-geo-alt-fill"></i> XYZ, Kollyanpur, Dhaka
          </a>
          <h5 class="mt-4">Call Us</h5>
            <a href="tel: +917778889991" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +917778889991
            </a>
            <br>
            <a href="tel: +917778889991" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +917778889991
            </a>
            <h5 class="mt-4">Email</h5>
            <a href="mailto: jannat@gmail.com" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-envelope-fill"></i> jannat@gmail.com
            </a>
            <h5 class="mt-4">Follow Us</h5>
             <a href="#" class="d-inline-block mb-3 text-dark fs-6 me-2">
              <i class="bi bi-twitter me-1"></i>
              </a>
              <a href="#" class="d-inline-block mb-3 text-dark fs-6 me-2">
              <i class="bi bi-facebook me-1"></i>
              </a>
              <a href="#" class="d-inline-block mb-3 text-dark fs-6 ">
              <i class="bi bi-instagram me-1"></i>
              </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 md-5 px-4">
        <div class="bg-white roundrd shadow p-4">
          <form action="">
            <h5>Send a Message</h5>
            <div class="mb-4">
            <label class="form-label font-weight">Name</label>
            <input type="text" class="form-control shadow-none" >
            </div>
            <div class="mb-4">
            <label class="form-label font-weight">Email</label>
            <input type="email" class="form-control shadow-none" >
            </div>
            <div class="mb-4">
            <label class="form-label font-weight">Subject</label>
            <input type="text" class="form-control shadow-none" >
            </div>
            <div class="mb-4">
            <label class="form-label font-weight :500">Meassage</label>
            <textarea class="form-control shadow-none" rows="5"></textarea>
            </div>
            <button type="submit" class="btn text-white custom-bg mt-3">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require('inc/footer.php')?>



</body>
</html>