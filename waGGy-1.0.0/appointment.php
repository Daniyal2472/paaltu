<?php
include("header.php");
?>

<body>
    <div class="formbold-main-wrapper pt-5 pb-5">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
          <form method="post" action="" enctype="multipart/form-data">
            <div class="formbold-mb-5">
                <h1>Doctor's Appointment</h1>
              <label for="name" class="formbold-form-label"></label>
              <input
                type="text"
                name="name"
                id="name"
                placeholder="Full Name"
                class="formbold-form-input"
                required
              />
            </div>
            <div class="formbold-mb-5">
              <label for="phone" class="formbold-form-label"></label>
              <input
                type="tel"
                name="phone"
                id="phone"
                placeholder="Enter your phone number"
                class="formbold-form-input"
                pattern="[0-9]{10}"  
                required
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
                required
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
                    required
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
                    required
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
                      required
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
                      required
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
                      required
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
                      required
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Doctor Dropdown -->
            <div class="formbold-mb-5">
              <label for="doctor" class="formbold-form-label">Doctor</label>
              <select name="doctor" id="doctor" class="formbold-form-input" required>
                <?php
                // Fetch doctors from the database
                $doctor_query = mysqli_query($con, "SELECT id, name FROM doctors");
                while ($doctor = mysqli_fetch_assoc($doctor_query)) {
                    echo "<option value='{$doctor['id']}'>{$doctor['name']}</option>";
                }
                ?>
              </select>
            </div>

            <!-- Image Upload -->
            <div class="formbold-mb-5">
              <label for="image" class="formbold-form-label">Upload Image</label>
              <input
                type="file"
                name="image"
                id="image"
                class="formbold-form-input"
                accept="image/*" 
              />
            </div>
      
            <div>
              <input name="book" type="submit" class="formbold-btn" value="Book">
            </div>
          </form>
        </div>
    </div>

    <?php
    include("footer.php");

    if (isset($_POST['book'])) {
        // Server-side validation
        $errors = [];
        if (empty($_POST['name'])) $errors[] = 'Name is required.';
        if (empty($_POST['phone']) || !preg_match('/^[0-9]{10}$/', $_POST['phone'])) $errors[] = 'Valid phone number is required.';
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
        if (empty($_POST['date'])) $errors[] = 'Date is required.';
        if (empty($_POST['time'])) $errors[] = 'Time is required.';
        if (empty($_POST['area'])) $errors[] = 'Area is required.';
        if (empty($_POST['city'])) $errors[] = 'City is required.';
        if (empty($_POST['state'])) $errors[] = 'State is required.';
        if (empty($_POST['post-code'])) $errors[] = 'Post Code is required.';
        if (empty($_POST['doctor'])) $errors[] = 'Doctor is required.';

        // Image upload validation
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name = basename($_FILES['image']['name']);
            $image_size = $_FILES['image']['size'];
            $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            // Define allowed file extensions and size limit (e.g., 2MB)
            $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
            $max_size = 2 * 1024 * 1024; // 2MB

            if (!in_array($image_ext, $allowed_exts)) $errors[] = 'Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.';
            if ($image_size > $max_size) $errors[] = 'Image size exceeds 2MB.';
        } else {
            $errors[] = 'Image upload failed or no image provided.';
        }

        if (empty($errors)) {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $date = mysqli_real_escape_string($con, $_POST['date']);
            $time = mysqli_real_escape_string($con, $_POST['time']);
            $area = mysqli_real_escape_string($con, $_POST['area']);
            $city = mysqli_real_escape_string($con, $_POST['city']);
            $state = mysqli_real_escape_string($con, $_POST['state']);
            $post_code = mysqli_real_escape_string($con, $_POST['post-code']);
            $doctor_id = mysqli_real_escape_string($con, $_POST['doctor']);

            // Handle file upload
            $upload_dir = 'uploads/';
            $image_path = $upload_dir . $image_name;

            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $query = mysqli_query($con, "INSERT INTO `appointments`(`id`, `name`, `email`, `phone number`, `doctor_id`, `date`, `time`, `city`, `area`, `postal_code`, `image_path`, `user_id`) VALUES ('','$name','$email','$phone','$doctor_id','$date','$time','$city','$area','$post_code','$image_path','4')");

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
            } else {
                echo "<script>Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Image Upload Failed',
                    text: 'There was an issue uploading your image.',
                    showConfirmButton: true,
                })</script>";
            }
        } else {
            foreach ($errors as $error) {
                echo "<script>Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Validation Error',
                    text: '$error',
                    showConfirmButton: true,
                })</script>";
            }
        }
    }
    ?>
</body>
