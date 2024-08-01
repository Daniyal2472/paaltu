<?php
include("header.php");
?>
<body>
    <div class="formbold-main-wrapper pt-5 pb-5">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
          <form method="post" action="">
            <div class="formbold-mb-5">
                <h1>Doctor's Appointment</h1>
              <label for="name" class="formbold-form-label"></label>
              <input
                type="text"
                name="name"
                id="name"
                placeholder="Full Name"
                class="formbold-form-input"
              />
            </div>
            <div class="formbold-mb-5">
              <label for="phone" class="formbold-form-label"></label>
              <input
                type="text"
                name="phone"
                id="phone"
                placeholder="Enter your phone number"
                class="formbold-form-input"
              />
            </div>
            <div class="formbold-mb-5">
              <label for="email" class="formbold-form-label"></label>
              <input
                type="email"
                name="email"
                id="email"
                placeholder="Enter your email"
                class="formbold-form-input"
              />
            </div>
            <div class="flex flex-wrap formbold--mx-3">
              <div class="w-full sm:w-half formbold-px-3">
                <div class="formbold-mb-5 w-full">
                  <label for="date" class="formbold-form-label"> Date </label>
                  <input
                    type="date"
                    name="date"
                    id="date"
                    class="formbold-form-input"
                  />
                </div>
              </div>
              <div class="w-full sm:w-half formbold-px-3">
                <div class="formbold-mb-5">
                  <label for="time" class="formbold-form-label"> Time </label>
                  <input
                    type="time"
                    name="time"
                    id="time"
                    class="formbold-form-input"
                  />
                </div>
              </div>
            </div>
      
            <div class="formbold-mb-5 formbold-pt-3">
              <label class="formbold-form-label formbold-form-label-2">
                Address Details
              </label>
              <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <input
                      type="text"
                      name="area"
                      id="area"
                      placeholder="Enter area"
                      class="formbold-form-input"
                    />
                  </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <input
                      type="text"
                      name="city"
                      id="city"
                      placeholder="Enter city"
                      class="formbold-form-input"
                    />
                  </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <input
                      type="text"
                      name="state"
                      id="state"
                      placeholder="Enter state"
                      class="formbold-form-input"
                    />
                  </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <input
                      type="text"
                      name="post-code"
                      id="post-code"
                      placeholder="Post Code"
                      class="formbold-form-input"
                    />
                  </div>
                </div>
              </div>
            </div>
      
            <div>
              <input name="book" type="submit" class="formbold-btn" value="Book">
            </div>
          </form>
        </div>
      </div>
      <?php
include("footer.php");
include("connection.php");
if (isset($_POST['book'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $area = $_POST['area'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $post_code = $_POST['post-code'];
  

  
  $query = mysqli_query($con, "INSERT INTO `appointments`(`id`, `name`, `email`, `phone number`, `doctor_id`, `date`, `time`, `city`, `area`, `postal_code`, `user_id`) VALUES ('','$name','$email ','$phone','1','$date','$time','$city','$area','$post_code','4')");
  
  if ($query) {
    echo "<script>location.assign('index.php')</script>";
} else {
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Appointment failed',
        text: 'Please try again later.',
        showConfirmButton: true,
    })</script>";
}

}
?>
</body>

