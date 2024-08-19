    <?php // Ensure the session is started to access session variables
    ob_start();

    include("header.php");
    $type = isset($_GET['type']) ? mysqli_real_escape_string($con, $_GET['type']) : '';


    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $ed = $_GET['id'];
        $user_id = $_SESSION['user_id'];
        $type = $_GET['type'];
       
        $ed = mysqli_real_escape_string($con, $ed); // Prevent SQL Injection
        if($type == 'pets') {
            $query = "INSERT INTO `pet_orders`(`user_id`, `product_id`) VALUES ('$user_id', '$ed')";
            $result = mysqli_query($con, $query);
        
        } else if($type == "foods") {
            $query = "INSERT INTO `food_orders`(`user_id`, `product_id`) VALUES ('$user_id', '$ed')";
        $result = mysqli_query($con, $query);
        } else if($type == "accessory") {
            $query = "INSERT INTO `accessory_orders`(`user_id`, `product_id`) VALUES ('$user_id', '$ed')";
        $result = mysqli_query($con, $query);
        }
      if ($result) {
            // Redirect to confirmation.html on successful query
              header("Location: confirmation.html");
            exit(); // Ensure no further code is executed after redirection
            
            
        } else {
            die("Query failed: " . mysqli_error($con) . "<br>SQL Query: " . $query); // Display SQL error and query
        }

    } else {
        echo "Invalid ID or ID not set";
    }
    
    ob_end_flush();

    ?>
