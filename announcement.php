<?php
    require_once './includes/dashboard-inc.php';
    $AdminDash = new Dashboard();
    require_once './includes/dashboard-inc.php';
    $AdminDash = new Dashboard();

    if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
        // If it isn't, send back a 405 Method Not Allowed header.
        header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
        exit;
    }
    $postData = trim(file_get_contents('php://input'));
    $decodedData = json_decode($postData);
    if($AdminDash->setAnnouncement($decodedData->text)) {
        echo json_encode(['success' => true, 'msg' => 'Finished']);
    } else {
        echo json_encode(['success' => false, 'msg' => 'Not Finished']);
    }
?>