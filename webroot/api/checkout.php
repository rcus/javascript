<?php
// Create the session
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
$_SESSION['cart'] = (isset($_SESSION['cart']) ? $_SESSION['cart'] : []);
$json = false;

// Get incoming on what to do
$do = isset($_GET['do']) ? $_GET['do'] : null;

// Get incoming data
$data = $_POST;

// Return sum of cart
if ($do === 'sum') {
    $sum = 0;
    foreach (array_column($_SESSION['cart'], 'sum') as $value) {
        $sum += $value;
    }
    $json = ['sum' => $sum];
}

// Check payment
if ($do === 'pay') {
    sleep(1);
    $json = ['status' => 'error', 'output' => 'Något har blivit fel. Försök igen senare.'];

    // Validate input
    foreach ($data as $name => $val) {
        if ($val === '') {
            $json = ['status' => 'validate', 'output' => $name];
            break;
        }
    }    

    // Input ok
    if ($json['status'] !== 'validate') {
        $json = ['status' => 'ok', 'output' => 'Kanon, '.$data['name'].'! Beställningen är skickad.'];
        $_SESSION['cart'] = [];
    }
}


// Return as json
if ($json) {
    header('Content-type: application/json');
    echo json_encode($json);
}
else {
    echo 'No valid value to return.';
}