<?php
require_once 'config/database.php';
require_once 'models/Booking.php';

class BookingController {
    public function submit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $database = new Database();
            $db = $database->getConnection();
            $booking = new Booking($db);

            $booking->full_name = $_POST['full_name'] ?? '';
            $booking->email = $_POST['email'] ?? '';
            $booking->phone = $_POST['phone'] ?? '';
            $booking->service_requested = $_POST['service_requested'] ?? '';
            $booking->preferred_date = $_POST['preferred_date'] ?? '';
            $booking->special_requests = $_POST['special_requests'] ?? '';

            if ($booking->create()) {
                // Send automated receipt email to the client
                $to = $booking->email;
                $subject = "We received your booking request! - Arby Hair Design";
                $message = "Hello {$booking->full_name},\n\n"
                         . "Thank you for requesting '{$booking->service_requested}'.\n"
                         . "We have successfully received your request and are currently reviewing our schedule.\n\n"
                         . "Once we review your request, we will send you another email with your official appointment date and time.\n\n"
                         . "We can't wait to see you!\n"
                         . "Best regards,\n"
                         . "Arby Hair Design";
                         
                $headers = "From: noreply@arbyhairdesign.com\r\n";
                $headers .= "Reply-To: contact@arbyhairdesign.com\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();

                @mail($to, $subject, $message, $headers);

                $redirectUrl = isset($_POST['source']) && $_POST['source'] === 'education' 
                    ? "index.php?url=education&status=booking_success" 
                    : "index.php?url=booking&status=success";
                    
                header("Location: " . $redirectUrl);
                exit();
            } else {
                // Return detailed database error for debugging
                echo "<div style='color:red; background:#fee; padding:20px;'>";
                echo "<h3>Database Insert Failed!</h3>";
                echo "<pre>";
                print_r($db->errorInfo());
                echo "</pre>";
                
                // If you prefer to redirect silently on error instead of dumping:
                // $redirectUrl = isset($_POST['source']) && $_POST['source'] === 'education' 
                //     ? "index.php?url=education&status=booking_error" 
                //     : "index.php?url=booking&status=error";
                // header("Location: " . $redirectUrl);
                
                exit();
            }
        } else {
            // Not a POST request
            header("Location: index.php");
            exit();
        }
    }
}
?>
