<?php

/**
 * Return list of users.
 */
function get_users($conn)
{
    $sql = "SELECT DISTINCT u.id, u.name 
        FROM users u 
        JOIN user_accounts ua ON u.id = ua.user_id 
        JOIN transactions t ON ua.id = t.account_from OR ua.id = t.account_to
        ORDER BY u.name"
    ;
    $stmt = $conn->query($sql);

    return $stmt->fetchAll();
}

/**
 * Return transactions balances of given user.
 */
function get_user_transactions_balances($userId, $conn)
{
    $sql = "
        SELECT
            strftime('%m', trdate) AS month,
            SUM(
                    CASE
                        WHEN ua.id = t.account_to THEN t.amount
                        WHEN ua.id = t.account_from THEN -t.amount
                        ELSE 0
                        END
            ) AS balance
        FROM transactions t
                 JOIN user_accounts ua ON ua.id = t.account_from OR ua.id = t.account_to
        WHERE ua.user_id = :user_id
        GROUP BY month
        ORDER BY month ASC
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $userId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
