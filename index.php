<?php
// Autoloader for controllers if needed, but we'll just require them for simplicity.
require_once 'controllers/PageController.php';
require_once 'controllers/BookingController.php';
require_once 'controllers/EducationController.php';
require_once 'controllers/AdminController.php';

// Simple Router
$url = isset($_GET['url']) ? $_GET['url'] : '';

$pageController = new PageController();
$bookingController = new BookingController();
$educationController = new EducationController();
$adminController = new AdminController();

switch ($url) {
    case '':
    case 'home':
        $pageController->index();
        break;
    case 'about':
        $pageController->about();
        break;
    case 'services':
        $pageController->services();
        break;
    case 'booking':
        $pageController->booking();
        break;
    case 'education':
        $pageController->education();
        break;
    case 'contact':
        $pageController->contact();
        break;

    // Form Submission Endpoints
    case 'submit_booking':
        $bookingController->submit();
        break;
    case 'submit_education_booking':
        $educationController->submit_booking();
        break;
    case 'subscribe':
        $educationController->subscribe();
        break;

    // Admin Dashboard Hidden URL
    case 'admin_secret_hub_123':
        $adminController->dashboard();
        break;
    case 'admin_action':
        $adminController->action();
        break;
    case 'admin_education_action':
        $adminController->educationAction();
        break;

    default:
        // 404 handled simply by redirecting to home
        $pageController->index();
        break;
}
?>
