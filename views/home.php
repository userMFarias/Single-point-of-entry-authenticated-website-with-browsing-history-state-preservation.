
<?php
$stmt = $pdo->query("SELECT * FROM usersTable");
$users = $stmt->fetchAll();

$headTitle = 'PHP Cwk2 Home Page';
$viewHeading = htmlHeading('Home Page View', 2);

// Test users block
$content .= "username:ubadmin001 password:Aaaa1111## userType:admin<br><br>";
$content .= "username:ubacadem01 password:Aaaa1111## userType:academic<br><br>";
$content .= "username:fflintoff01 password:Aaaa1111## userType:student<br><br>";

if (count($users) > 0) {
    $content .= "Users in the database:";
    foreach ($users as $user) {
        $content .= "username:{$user['usersTable_username']} password:{$user['usersTable_password']} userType:{$user['usersTable_userType']}<br><br>";
    }
} else {
    $content .= "<p>No users found in the database.</p>";
}

?>