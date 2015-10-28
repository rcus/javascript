<?php
// Create the session
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
$_SESSION['cart'] = (isset($_SESSION['cart']) ? $_SESSION['cart'] : []);

// Get incoming on what to do
$do = isset($_GET['do']) ? $_GET['do'] : null;

// Get incoming data
$data = $_POST;

// Add product
if($do == 'add' && !empty($data)) {
    $key = array_search($data['pid'], array_column($_SESSION['cart'], 'pid'));
    if ($key === false) {
        $key = count($_SESSION['cart']);
        $_SESSION['cart'][$key] = $data;
        $_SESSION['cart'][$key]['qty'] = 0;
        $_SESSION['cart'][$key]['sum'] = 0;
    }
    $_SESSION['cart'][$key]['qty']++;
    $_SESSION['cart'][$key]['sum'] += intval($data['price']);
}

// Remove product
if($do == 'remove' && !empty($data)) {
    $key = array_search($data['pid'], array_column($_SESSION['cart'], 'pid'));
    if ($key !== false) {
        if ($_SESSION['cart'][$key]['qty'] > 1) {
            $_SESSION['cart'][$key]['qty']--;
            $_SESSION['cart'][$key]['sum'] -= intval($data['price']);
        }
        else {
            array_splice($_SESSION['cart'], $key, 1);
        }
    }
}

// Empty the cart
if($do == 'empty') {
    $_SESSION['cart'] = [];
}

// Return cart as json
header('Content-type: application/json');
echo json_encode($_SESSION['cart']);