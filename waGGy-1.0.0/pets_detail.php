<?php
include("header.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ed = $_GET['id'];
    $ed = mysqli_real_escape_string($con, $ed); // Prevent SQL Injection
    $query = "SELECT * FROM `pets` WHERE id=$ed";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con) . "<br>SQL Query: " . $query); // Display SQL error and query
    }

    $row = mysqli_fetch_assoc($result);

    if (isset($_SESSION['notification'])) {
      echo '<script>
          Swal.fire({
              title: "Good job!",
              text: "' . $_SESSION['notification'] . '",
              icon: "success"
          });
      </script>';
      
      unset($_SESSION['notification']);
    }
    if (!$row) {
        die("No records found for ID: $ed"); // Display message if no records are found
    }
} else {
    die("Invalid ID parameter.");
}

?>



    <style>
         .icon-hover:hover {
    border-color: #3b71ca !important;
    background-color: white !important;
    color: #3b71ca !important;
  }
  
  .icon-hover:hover i {
    color: #3b71ca !important;
  }
  .section-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
    </style>
  
  
  <!-- content -->
  <section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
              <img style="max-width: 100%; max-height: 60vh; margin: auto;" class="rounded-4 fit" src="<?php echo htmlspecialchars($row['image']); ?>" />
            </a>
          </div>
          <!-- <div class="d-flex justify-content-center mb-3">
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
            </a>
          </div> -->
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
            <?php echo htmlspecialchars($row['name']); ?>
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <span class="ms-1 text-dark">
                  4.5
                </span>
              </div>
             
              <span class="text-success ms-2 text-dark">In stock</span>
            </div>
  
            <div class="mb-3">
              <span class="h5">PKR: <?php echo htmlspecialchars($row['price']); ?></span>
              
            </div>
  
            <p>
            <?php echo htmlspecialchars($row['description']); ?>
            </p>
  
            <div class="row">
              <dt class="col-3">Type:</dt>
              <dd class="col-9"><?php echo htmlspecialchars($row['breed']); ?></dd>
  
              <dt class="col-3">Color</dt>
              <dd class="col-9"><?php echo htmlspecialchars($row['colour']); ?></dd>
  
              <dt class="col-3">Gender</dt>
              <dd class="col-9"><?php echo htmlspecialchars($row['gender']); ?></dd>
  
            </div>
  
            <hr />
  
            
             
            </div>
          
  
            <?php
$type = 'pets'; // Set based on your context; e.g., from a database or logic
?>

<a href="product_page.php?id=<?php echo $row['id']; ?>&type=<?php echo $type; ?>" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Buy Now </a>
<a href="email_notification.php?id=<?php echo $row['id']; ?>&type=<?php echo $type; ?>" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Interested </a>

            
          </div>
        </main>
      </div>
    </div>
    </section>


    <section class="mt-5">
        <div class="container">
            <div class="section-header">Details</div>
            <div class="row">
                <div class="col-md-8">
                    <div class="description-content active" id="description">
                        <p><strong>Breed:</strong> <?php echo htmlspecialchars($row['breed']); ?></p>
                        <p><strong>Color:</strong> <?php echo htmlspecialchars($row['colour']); ?></p>
                        <p><strong>Weight:</strong> <?php echo htmlspecialchars($row['weight']); ?></p>
                        <p><strong>Height:</strong> <?php echo htmlspecialchars($row['height']); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($row['age']); ?></p>
                        <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></p>
                        <p><strong>Vaccination Status:</strong> <?php echo htmlspecialchars($row['vaccination_status']); ?></p>
                        
                    </div>
                    <div class="health-care-content" id="health-care">
                        <p><strong>Health Check:</strong> Comprehensive health check included</p>
                        <p><strong>Vaccination:</strong> Fully vaccinated</p>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <?php 
    include("footer.php");
    ?>
  
  <!-- content -->
  
 

 
  