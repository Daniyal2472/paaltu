<?php
    require '../vendor/autoload.php'; // Include PHPMailer
    require '../connection.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_GET['id'])){
        $pet_id = $_GET['id'];
        $query = "SELECT * FROM `pets` WHERE id=$pet_id";
        $result = mysqli_query($con, $query);
        if ($result) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // Send email notification to the pet ad owner
            $seller_id = $rows[0]['user_id'];
            
            // Fetch seller details
            $seller_query = "SELECT * FROM `users` WHERE id = $seller_id";
            $seller_result = mysqli_query($con, $seller_query);
            $result2 = mysqli_fetch_all($seller_result, MYSQLI_ASSOC);

            if ($result2) {
                $seller_email = $result2[0]['email'];
                $seller_name = $result2[0]['name'];

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();                                           
                    $mail->Host       = 'smtp.gmail.com';                    
                    $mail->SMTPAuth   = true;                                  
                    $mail->Username   = 'pe26706@gmail.com';                
                    $mail->Password   = 'ctoobbctfmnfikii';                 
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
                    $mail->Port       = 587;                                   

                    //Recipients
                    $mail->setFrom('pe26706@gmail.com', 'Paaltoo');
                    $mail->addAddress($seller_email, $seller_name);     

                    //Content
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Someone is Interested in Your Pet Ad!';
                    $mail->Body    = 'Hello ' . htmlspecialchars($seller_name) . ',<br>Someone has viewed your pet ad for ' . htmlspecialchars($rows[0]['name']) . '. You might want to check your dashboard for more details.';
                    $mail->AltBody = 'Hello ' . $seller_name . ', Someone has viewed your pet ad for ' . $rows[0]['name'] . '.';

                    if($mail->send()){
                        $_SESSION['notification'] = "Your interest has been sent to the seller";
                        header("Location: pets_detail.php?id=$pet_id");
                        exit(); 
                    }
                } catch (Exception $e) {
                    // Handle error
                    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
                
        } 
    }
?>
