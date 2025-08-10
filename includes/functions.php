<?php
function validateUser($pdo, $username, $password) {
    $stmt = $pdo->prepare("SELECT * FROM usersTable WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    return $stmt->fetch();
}

function getUserType($pdo, $username) {
    $stmt = $pdo->prepare("SELECT userType FROM usersTable WHERE username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();
    return $row['userType'] ?? '';
}

function buildNav($userType) {
    $nav = '<nav><ul>';
    $nav .= '<li><a href="?view=home">Home Page</a></li>';

    if ($userType === 'admin') {
        $nav .= '<li><a href="?view=admin">Admin View</a></li>';
        $nav .= '<li><a href="?view=academic">Academic View</a></li>';
        $nav .= '<li><a href="?view=student">Student View</a></li>';
    } elseif ($userType === 'academic') {
        $nav .= '<li><a href="?view=academic">Academic View</a></li>';
        $nav .= '<li><a href="?view=student">Student View</a></li>';
    } elseif ($userType === 'student') {
        $nav .= '<li><a href="?view=student">Student View</a></li>';
    }

    $nav .= '</ul></nav>';
    return $nav;
}


function htmlHeading($text, $level) {
	$heading = trim($text);
	switch ($level) {
		case 1 :
		case 2 :
			$heading = $heading;
			break;
		case 3 :
		case 4 :
		case 5 :
		case 6 :
			$heading = ucfirst($heading);
			break;
		default: #traps unknown heading level exception
			$heading = '<FONT COLOR="#ff0000">Unknown heading level:' . $level . '</FONT>';
		}
	return '<h' . $level . '>' . htmlentities($heading) . '</h' . $level .  '>';
}


function htmlParagraph($text) {
	return '<p>' . htmlentities(trim($text)) . '</p>';
}

echo "<!-- functions.php loaded -->";	


function validateformData($post)
{
    $valid = true;
    $placeholders = [];
    $clean = [];

    // Username validation
    if (isset($post['username']) && preg_match('/^[a-zA-Z0-9]{10,}$/', $post['username'])) {
        $clean['userName'] = trim($post['username']);
    } else {
        $valid = false;
        $placeholders['[+userNameError+]'] = 'Username must be alphanumeric and at least 10 characters.';
    }

    // Password validation
    if (isset($post['password']) && strlen($post['password']) >= 8) {
        $clean['password'] = $post['password'];
    } else {
        $valid = false;
        $placeholders['[+pwdError+]'] = 'Password must be at least 8 characters.';
    }

    return [$valid, $clean, $placeholders];
}

?>