<?php
require_once 'config/database.php';
require_once 'models/Subscriber.php';

class EducationController {
    public function subscribe() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $database = new Database();
            $db = $database->getConnection();
            $subscriber = new Subscriber($db);

            $subscriber->email = $_POST['email'] ?? '';

            if ($subscriber->create()) {
                // Redirect back with success message
                header("Location: index.php?url=education&status=subscribe_success#newsletter");
                exit();
            } else {
                // Redirect back with error message
                header("Location: index.php?url=education&status=subscribe_error#newsletter");
                exit();
            }
        } else {
            // Not a POST request
            header("Location: index.php?url=education");
            exit();
        }
    }

    public function submit_booking() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $database = new Database();
            $db = $database->getConnection();
            $subscriber = new Subscriber($db);

            $subscriber->full_name = $_POST['full_name'] ?? '';
            $subscriber->email = $_POST['email'] ?? '';
            $subscriber->phone = $_POST['phone'] ?? '';
            $subscriber->service_requested = $_POST['service_requested'] ?? '';
            $subscriber->preferred_date = $_POST['preferred_date'] ?? '';
            $subscriber->special_requests = $_POST['special_requests'] ?? '';

            if ($subscriber->createReservation()) {
                // Send automated receipt email to the client
                $to = $subscriber->email;
                $subject = "We received your education request! - Arby Hair Design";
                $message = "Hello {$subscriber->full_name},\n\n"
                         . "Thank you for requesting '{$subscriber->service_requested}'.\n"
                         . "We have successfully received your request and are currently reviewing our schedule.\n\n"
                         . "Once we review your request, we will send you another email with your official reservation date and time.\n\n"
                         . "We can't wait to see you!\n"
                         . "Best regards,\n"
                         . "Arby Hair Design";
                         
                $headers = "From: noreply@arbyhairdesign.com\r\n";
                $headers .= "Reply-To: contact@arbyhairdesign.com\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();

                @mail($to, $subject, $message, $headers);

                header("Location: index.php?url=education&status=booking_success");
                exit();
            } else {
                echo "<div style='color:red; background:#fee; padding:20px;'>";
                echo "<h3>Database Insert Failed!</h3>";
                echo "<pre>";
                print_r($db->errorInfo());
                echo "</pre>";
                exit();
            }
        } else {
            header("Location: index.php?url=education");
            exit();
        }
    }
}
?>
