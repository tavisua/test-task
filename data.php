<?php
    include_once('db.php');
    include_once('model.php');

    $conn = get_connect();

    $user_id = isset($_GET['user'])
        ? (int)$_GET['user']
        : null;

    if ($user_id) {
        // Get transactions balances
        $transactions = get_user_transactions_balances($user_id, $conn);
        echo json_encode($transactions);
    } else {
        echo json_encode([]);
    }
?>
