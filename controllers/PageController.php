<?php
class PageController {
    public function index() {
        require_once 'views/index.php';
    }

    public function about() {
        require_once 'views/about.php';
    }

    public function services() {
        require_once 'views/services.php';
    }

    public function booking() {
        require_once 'views/booking.php';
    }

    public function education() {
        require_once 'views/education.php';
    }

    public function contact() {
        require_once 'views/contact.php';
    }
}
?>
