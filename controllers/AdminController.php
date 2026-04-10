<?php
require_once 'config/database.php';
require_once 'models/Booking.php';
require_once 'models/Subscriber.php';

class AdminController {
    public function dashboard() {
        $database = new Database();
        $db = $database->getConnection();

        $booking = new Booking($db);
        $subscriber = new Subscriber($db);

        $bookings_stmt = $booking->readAll();
        $bookings = $bookings_stmt->fetchAll(PDO::FETCH_ASSOC);

        $subscribers_stmt = $subscriber->readAll();
        $subscribers = $subscribers_stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once 'views/admin.php';
    }

    public function action() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $database = new Database();
            $db = $database->getConnection();
            $booking = new Booking($db);

            $action = $_POST['action'] ?? '';
            $booking->id = $_POST['id'] ?? '';
            
            if ($booking->readOne()) {
                if ($action === 'confirm' || $action === 'reject') {
                    $booking->status = $action;
                    $booking->assigned_date = $_POST['assigned_date'] ?? null;
                    $booking->assigned_time = $_POST['assigned_time'] ?? null;

                    if ($booking->updateStatus()) {
                        // Send email if confirmed
                        if ($action === 'confirm') {
                            $to = $booking->email;
                            $subject = "Reservation Confirmed - Arby Hair Design";
                            $message = "Hello {$booking->full_name},\n\nYour reservation request for '{$booking->service_requested}' has been confirmed.\n\nPlease arrive on {$booking->assigned_date} at {$booking->assigned_time}.\n\nThank you,\nArby Hair Design";
                            $headers = "From: noreply@arbyhairdesign.com";
                            
                            // mail($to, $subject, $message, $headers); // Commented to prevent actual sending on local unless configured
                            // Attempt to send email
                            @mail($to, $subject, $message, $headers);
                        }
                        header("Location: index.php?url=admin_secret_hub_123&status=success");
                        exit();
                    }
                }
            }
            header("Location: index.php?url=admin_secret_hub_123&status=error");
            exit();
        }
    }
    public function educationAction() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $database = new Database();
            $db = $database->getConnection();
            $subscriber = new Subscriber($db);

            $action = $_POST['action'] ?? '';
            $subscriber->id = $_POST['id'] ?? '';
            
            if ($subscriber->readOne()) {
                if ($action === 'confirm' || $action === 'reject') {
                    $subscriber->status = $action;
                    $subscriber->assigned_date = $_POST['assigned_date'] ?? null;
                    $subscriber->assigned_time = $_POST['assigned_time'] ?? null;

                    if ($subscriber->updateStatus()) {
                        if ($action === 'confirm') {
                            $to = $subscriber->email;
                            $subject = "Education Reservation Confirmed - Arby Hair Design";
                            $message = "Hello {$subscriber->full_name},\n\nYour education reservation request for '{$subscriber->service_requested}' has been confirmed.\n\nPlease arrive on {$subscriber->assigned_date} at {$subscriber->assigned_time}.\n\nThank you,\nArby Hair Design";
                            $headers = "From: noreply@arbyhairdesign.com";
                            
                            @mail($to, $subject, $message, $headers);
                        }
                        header("Location: index.php?url=admin_secret_hub_123&status=success");
                        exit();
                    }
                }
            }
            header("Location: index.php?url=admin_secret_hub_123&status=error");
            exit();
        }
    }
}
?>
