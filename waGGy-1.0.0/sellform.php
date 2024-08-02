<?php
include("header.php");
?>
<body>
<div class="pt-4">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex flex-column justify-content-center align-items-center text-center pb-3 mt-4">
          <h3 data-aos-easing="ease-in-sine" class="fw-bold text-bg font-f">Sell your Pets With 3 Easy & Simple Steps!</h3>
          <h5 class="mt-2">It's free and takes less than a minute</h5>
          
          <div class="container my-3 py-3">
            <div class="row my-3">
              <div class="col text-center">
                <a href="" class="categories-item">
                  <img src="images/a1.png" alt="Foodies" class="iconss mb-1">
                  <h5>Enter Your Pet Information</h5>
                </a>
              </div>
              <div class="col text-center">
                <a href="" class="categories-item">
                  <img src="images/a2.png" alt="Fish Shop" class="iconss mb-1">
                  <h5>Upload Photos</h5>
                </a>
              </div>
              <div class="col text-center">
                <a href="" class="categories-item">
                  <img src="images/a3.png" alt="Cat Shop" class="iconss mb-1">
                  <h5>Enter Your Selling Price</h5>
                </a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="formbold-mainn-wrapper pt-5 pb-5 ">
  <div class="formbold-form-wrapper">
  <form method="post" action="" enctype="multipart/form-data">
      <div class="formbold-mb-5">
        <h1>Pet Information</h1>
        <label for="seller_name" class="formbold-form-label">Seller's Name</label>
        <input type="text" name="seller_name" id="seller_name" placeholder="Full Name" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="phone" class="formbold-form-label">Phone Number</label>
        <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="email" class="formbold-form-label">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="pet_type" class="formbold-form-label">Pet's Type</label>
        <input type="text" name="pet_type" id="pet_type" placeholder="Enter pet's type (e.g., Dog, Cat)" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="pet_breed" class="formbold-form-label">Pet's Breed</label>
        <input type="text" name="pet_breed" id="pet_breed" placeholder="Enter pet's breed" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="pet_age" class="formbold-form-label">Pet's Age</label>
        <input type="text" name="pet_age" id="pet_age" placeholder="Enter pet's age" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="pet_price" class="formbold-form-label">Pet's Price</label>
        <input type="text" name="pet_price" id="pet_price" placeholder="Enter pet's price" class="formbold-form-input" />
      </div>
      <div class="formbold-mb-5">
        <label for="pet_description" class="formbold-form-label">Pet's Description</label>
        <textarea name="pet_description" id="pet_description" placeholder="Enter a brief description of the pet" class="formbold-form-input"></textarea>
      </div>
      <div class="formbold-mb-5">
        <label for="pet_image" class="formbold-form-label">Upload Pet's Image</label>
        <input type="file" name="picture" id="pet_image" class="formbold-form-input" />
      </div>
      <div>
        <input name="sell" type="submit" class="formbold-btn" value="SELL">
      </div>
    </form>
  </div>
</div>

<?php
include("footer.php");
$update = mysqli_query($con, "SELECT `role` FROM `users` WHERE id = '$user_id'");
$u_role = mysqli_fetch_assoc($update);
$role = $u_role['role'];

if (isset($_POST['sell'])) {
  $seller_name = $_POST['seller_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pet_type = $_POST['pet_type'];
  $pet_breed = $_POST['pet_breed'];
  $pet_age = $_POST['pet_age'];
  $pet_price = $_POST['pet_price'];
  $pet_description = $_POST['pet_description'];
     

  // Handle file uploads
  $pictureFileName = $_FILES['picture']['name'];
  $pictureTmpName = $_FILES['picture']['tmp_name'];

  // Specify the destination directories for uploaded files
  $pictureDestination = "../accessories/" . $pictureFileName;

  // Check file extensions
  $pictureExtension = strtolower(pathinfo($pictureFileName, PATHINFO_EXTENSION));

  

  if (in_array($pictureExtension, ['jpg', 'jpeg', 'png'])) {
      // Move uploaded files to specific directories
      move_uploaded_file($pictureTmpName, $pictureDestination);
      // move_uploaded_file($trailerTmpName, $trailerDestination);

      // Insert data into the database
      $query = "INSERT INTO `pets`(`id`, `user_id`, `name`, `category_id`, `breed`, `price`, `age`, `description`, `image`, `role`) VALUES ('','2','$seller_name','1','$pet_breed','$pet_price','$pet_age','$pet_description','$pictureDestination','$role')";
      $result = mysqli_query($con, $query);

      if ($result) {
        session_start();
        $_SESSION['status'] = "Data inserted successfully";
          echo "<script>location.assign('index.php')</script>";
      } else {
          echo "<script>alert('Error adding pet.');</script>";
      }
  } else {
      echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for pictures and mp4, avi, mkv for trailers.')</script>";
  }
}
?>
</body>
