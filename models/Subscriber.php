<?php
class Subscriber {
    private $conn;
    private $table_name = "education_subscribers";

    public $id;
    public $email;
    public $full_name;
    public $phone;
    public $service_requested;
    public $preferred_date;
    public $special_requests;
    public $status;
    public $assigned_date;
    public $assigned_time;
    public $subscribed_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // For simple newsletter subscription
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET email = :email";

        $stmt = $this->conn->prepare($query);
        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(":email", $this->email);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // For education reservations
    public function createReservation() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET
                  full_name = :full_name,
                  email = :email,
                  phone = :phone,
                  service_requested = :service_requested,
                  preferred_date = :preferred_date,
                  special_requests = :special_requests";

        $stmt = $this->conn->prepare($query);

        $this->full_name = htmlspecialchars(strip_tags($this->full_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->service_requested = htmlspecialchars(strip_tags($this->service_requested));
        $this->preferred_date = htmlspecialchars(strip_tags($this->preferred_date));
        $this->special_requests = htmlspecialchars(strip_tags($this->special_requests));

        $stmt->bindParam(":full_name", $this->full_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":service_requested", $this->service_requested);
        $stmt->bindParam(":preferred_date", $this->preferred_date);
        $stmt->bindParam(":special_requests", $this->special_requests);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY subscribed_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->full_name = $row['full_name'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->service_requested = $row['service_requested'];
            $this->preferred_date = $row['preferred_date'];
            $this->special_requests = $row['special_requests'];
            $this->status = $row['status'] ?? 'pending';
            $this->assigned_date = $row['assigned_date'] ?? null;
            $this->assigned_time = $row['assigned_time'] ?? null;
            $this->subscribed_at = $row['subscribed_at'];
            return true;
        }
        return false;
    }

    public function updateStatus() {
        $query = "UPDATE " . $this->table_name . "
                  SET status = :status, assigned_date = :assigned_date, assigned_time = :assigned_time
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        if ($this->assigned_date) $this->assigned_date = htmlspecialchars(strip_tags($this->assigned_date));
        if ($this->assigned_time) $this->assigned_time = htmlspecialchars(strip_tags($this->assigned_time));

        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':assigned_date', $this->assigned_date);
        $stmt->bindParam(':assigned_time', $this->assigned_time);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
