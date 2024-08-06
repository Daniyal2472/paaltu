<?php
include("header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);

  // Server-side validation
  if (empty($name) || empty($email) || empty($message)) {
      echo "<script>alert('All fields are required');</script>";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Invalid email format');</script>";
  } else {
      // Insert data into the database
      $query = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
      if (mysqli_query($con, $query)) {
          echo "<script>alert('Message submitted Successfully');</script>";
      } else {
          echo "<script>alert('Failed to send message');</script>";
      }
  }
}
?>

<body>
<section class="container" id="Contactus" style="background-image: url('images/background-img.png'); ">
    <div class="row">
      <div class="col-12">
        <div class="text-center ms-lg-5 ps-lg-5 pe-lg-5 me-lg-5">
          <p class="display-4 blue-color fw-bolder mt-5 mb-0 pb-5">Contact Us</p>
          <p class="h4 text-gray">Keep In Touch with Us</p>
          <p class="text-blacks ms-lg-5 ps-lg-5 pe-lg-5 me-lg-5">We believe in getting closer than ever to our customers. So close that we tell them what they need well before they realize it themselves.</p>
        </div>
      </div>
      <!-- card customercare,contact,address__ -->
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card contact-card text-center">
          <img src="images/d1.png" class="h1 blue-color iconss" alt="Customer Care">
          <div class="card-body">
            <h4 class="card-title text-gray">Customer Care</h4>
            <p class="text-blacks">Get instant support via Customer Care
              <span class="blue-color">03363367020</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card contact-card text-center">
          <img src="images/d2.png" class="h1 blue-color iconss" alt="Contact">
          <div class="card-body">
            <h4 class="card-title text-gray">Contact</h4>
            <p class="text-blacks mb-0">Mobile: <span class="blue-color">03194085676</span> For Order</p>
            <p class="text-blacks mb-0">Mobile: <span class="blue-color">03194085676</span> For Services</p>
            <p class="text-blacks">Email: <span class="blue-color">abeerhussain922@gmail.com</span></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card contact-card text-center">
          <img src="images/d3.png" class="h1 blue-color iconss" alt="Address">
          <div class="card-body">
            <h4 class="card-title text-gray">Address</h4>
            <p class="text-blacks">Head Office: House No A-1/18, Sector I Block C220 <span class="blue-color">Township Karachi</span></p>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="text-center mt-3">
          <h2 class="blue-color display-6 fw-bolder">Send Message</h2>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="mt-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.0252121918156!2d67.07174577515207!3d24.86298847792767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ea3db108f41%3A0x42acc4507358b160!2sAptech%20Learning%2C%20Shahrah%20e%20Faisal%20Center!5e0!3m2!1sen!2s!4v1686902728496!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0; width: 100%; height: 400px;"></iframe>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="contact-form text-center pe-lg-5 ps-lg-5 w-100 mt-5 mb-5 pt-5">
            <form method="post" action="">
                <div class="d-flex flex-wrap justify-content-center">
                    <input type="text" name="name" placeholder="Name*" class="w-45 me-2 mb-2 bgg-gray rounded-0 border-0 text-blacks form-control" required>
                    <input type="email" name="email" placeholder="Email*" class="w-45 me-2 mb-2 bgg-gray rounded-0 border-0 text-blacks form-control" required>
                </div>
                <div class="d-flex flex-column align-items-center pt-5">
                    <textarea name="message" placeholder="Message" class="w-100 h-100 form-control p-12 bgg-gray rounded-0 border-0 text-blacks mb-2" required></textarea>
                    <input type="submit" value="Submit" class="fw-bolder btn btn-blue ps-5 pe-5 p-12 mt-5 rounded-0 border-0">
                </div>
            </form>
        </div>
    </div>
    </div>
  </section>
  <?php
include("footer.php");
?>
</body>
