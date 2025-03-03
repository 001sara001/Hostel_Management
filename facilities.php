<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    
    <?php require('inc/links.php')?>
    
 <style>
  .pop:hover{
    border-top-color:var(--teal) !important;
    transform: scale(1.03);
    transition: all 0.3s;
  }
 </style>
</head>
<body class="bg-light">

  <?php require('inc/header.php') ?>

  <div class="my-5 px-4">
    <h2 class="fw-blod h-font text-center">Our Facilities</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
       Obcaecati repellat maiores similique molestiae itaque unde atque laudantium neque! 
       Adipisci deleniti reprehenderit iure esse nostrum laudantium, sed ea iste voluptates cum.
    </p>
  </div>

  <div class="container">
    <div class="row">
      <?php 
        $res = selectAll('facilities');
        $path = FACILITIES_IMG_PATH;

        while($row = mysqli_fetch_assoc($res)){ 
            echo<<<data
              <div class="col-lg-4 col-md-6 md-5 px-4">
                <div class="bg-white roundrd shadow p-4 border-top border-4 border-dark pop">
                  <div class="d-flex align-items-center mb-2"></div>
                  <img src="$path$row[icon]" width="40px">
                  <h5 class="m-0 ">$row[name]</h5>
                  <p>$row[description]</p>
                </div>
              </div>
            data;
        }
      ?>
    </div>
  </div>

  <?php require('inc/footer.php')?>



</body>
</html>