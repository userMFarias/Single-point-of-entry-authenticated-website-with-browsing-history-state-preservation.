<?php
/*	Web Programming Using PHP Cwk2 Task 4 
	This script is the controller for a Single Point of Entry MVC design model

*/

// Start a new PHP session or resume the existing one.
// This must be called before any HTML output.
// The session allows storing user data (e.g., username, userType) across multiple requests.
session_start();

// Load configuration (PDO connection) and utility functions
require_once 'includes/config.php';
require_once 'includes/functions.php';







// Prepare SQL INSERT statement to insert test users
// IGNORE: if a user with same email or username exists, skip inserting
// This is for initial population/testing of the usersTable

$sql = "INSERT IGNORE INTO usersTable 
    (usersTable_email, usersTable_username, usersTable_password, usersTable_userType) 
    VALUES 
    (:email, :username, :password, :userType)";
	
	
// Array of test user data to insert into the usersTable
// These records will be used for testing login and role-based access
$users = [
    ['email' => 'admin@example.com','username' => 'ubadmin001','password' => 'Aaaa1111##','userType' => 'admin'],
    ['email' => 'academic@example.com','username' => 'ubacadem01','password' => 'Aaaa1111##','userType' => 'academic' ],
    ['email' => 'student@example.com','username' => 'fflintoff01','password' => 'Aaaa1111##', 'userType' => 'student'],
    ['email' => 'ahmed34343@example.com', 'username' => 'ahmed34343', 'password' => 'Adsdw4$2323', 'userType' => 'academic'],
    ['email' => 'larisa011111@example.com', 'username' => 'larisa011111', 'password' => 'Larisa20003!', 'userType' => 'student'],
    ['email' => 'example12345@example.com', 'username' => 'example12345', 'password' => 'Example12345!', 'userType' => 'academic'],
    ['email' => 'ubadmin002@example.com', 'username' => 'ubadmin002', 'password' => 'dnbviwbo12S!', 'userType' => 'admin'],
    ['email' => 'ococos0100000@example.com', 'username' => 'ococos0100000', 'password' => 'Craziness10!', 'userType' => 'academic'],
    ['email' => 'ubadmin0012@example.com', 'username' => 'ubadmin0012', 'password' => 'Qdssfsdf123123$', 'userType' => 'academic'],
    ['email' => 'ubadmin0011@example.com', 'username' => 'ubadmin0011', 'password' => 'Qwerty1234$', 'userType' => 'academic'],
    ['email' => 'icbeaxnj01@example.com', 'username' => 'icbeaxnj01', 'password' => 'jndjnedaDJ123!', 'userType' => 'admin'],
    ['email' => 'icbeaxnj02@example.com', 'username' => 'icbeaxnj02', 'password' => 'jndjnedaDJ123!', 'userType' => 'admin'],
    ['email' => 'snjxwsxswn01@example.com', 'username' => 'snjxwsxswn01', 'password' => 'jndjnedaDJ123!', 'userType' => 'academic'],
    ['email' => 'acghruthn123@example.com', 'username' => 'acghruthn123', 'password' => 'Abcdefg123!etau', 'userType' => 'academic'],
    ['email' => 'ubadmin034@example.com', 'username' => 'ubadmin034', 'password' => 'AAAAAAAaa123!', 'userType' => 'academic'],
    ['email' => 'omerrasheed68@example.com', 'username' => 'omerrasheed68', 'password' => 'asdasdasA12&', 'userType' => 'academic'],
    ['email' => 'werasdsad123@example.com', 'username' => 'werasdsad123', 'password' => 'werewr123&A', 'userType' => 'academic'],
    ['email' => 'fgsavyy76yg@example.com', 'username' => 'fgsavyy76yg', 'password' => 'ABCV&1246abns99', 'userType' => 'academic'],
    ['email' => 'tester1234@example.com', 'username' => 'tester1234', 'password' => 'Notallowed123!', 'userType' => 'student'],
    ['email' => 'sdfsdfasdasdasdasd@example.com', 'username' => 'sdfsdfasdasdasdasd', 'password' => 'sdfs23Pasad£#as', 'userType' => 'academic'],
    ['email' => 'ubadmin0sdfsd@example.com', 'username' => 'ubadmin0sdfsd', 'password' => 'sdfs23Pasadass#', 'userType' => 'academic'],
    ['email' => 'ubdadminfr4@example.com', 'username' => 'ubdadminfr4', 'password' => 'Password!!!1', 'userType' => 'academic'],
    ['email' => 'johnsmith01@example.com', 'username' => 'johnsmith01', 'password' => 'Johnnyboy123!', 'userType' => 'student'],
    ['email' => 'hi0100000152265@example.com', 'username' => 'hi0100000152265', 'password' => 'hi-1Ertjhgvjg**', 'userType' => 'academic'],
    ['email' => 'ubadmin006@example.com', 'username' => 'ubadmin006', 'password' => 'wsaAd123!@ss', 'userType' => 'academic'],
    ['email' => 'lovelace123@example.com', 'username' => 'lovelace123', 'password' => 'Qwerty!123', 'userType' => 'admin'],
    ['email' => 'jack131adgda@example.com', 'username' => 'jack131adgda', 'password' => 'Johnnyboy123!', 'userType' => 'academic'],
    ['email' => 'pixelcraze77@example.com', 'username' => 'PixelCraze77', 'password' => 'userTesting123#', 'userType' => 'academic'],
    ['email' => 'grate212511@example.com', 'username' => 'grate212511', 'password' => '12345678Qwert!', 'userType' => 'academic'],
    ['email' => 'adoggy21531@example.com', 'username' => 'adoggy21531', 'password' => 'Andydoggo123!', 'userType' => 'student'],
    ['email' => 'muadhblabla01@example.com', 'username' => 'Muadhblabla01', 'password' => 'Muadhhhhh@&1', 'userType' => 'admin'],
    ['email' => 'aferwewwWvjtfyftyj@example.com', 'username' => 'aferwewwWvjtfyftyj', 'password' => 'hi-1Ertjhgvjg**', 'userType' => 'academic'],
    ['email' => 'ubadmin0013@example.com', 'username' => 'ubadmin0013', 'password' => 'dfgtyhUUUUU123!', 'userType' => 'student'],
    ['email' => '013543543543@example.com', 'username' => '013543543543', 'password' => 'hi-1Ertjhgvjg**', 'userType' => 'academic'],
    ['email' => 'jimmy12345@example.com', 'username' => 'jimmy12345', 'password' => 'JimSmith123789*', 'userType' => 'admin'],
    ['email' => 'academic123@example.com', 'username' => 'Academic123', 'password' => 'Academic123*', 'userType' => 'academic']
];

// Loop through each test user defined in the $users array
foreach ($users as $user) {
	// Prepare the INSERT IGNORE SQL statement to insert the user record
    $stmt = $pdo->prepare($sql);
	// Execute the statement with the current user's data bound to the placeholders
    $stmt->execute([
        ':email' => $user['email'],
        ':username' => $user['username'],
        ':password' => $user['password'],
        ':userType' => $user['userType']
    ]);
}

// Set default variables used in the application:
// $title             - Title of the HTML page
// $content           - Will hold the main content HTML for the selected view
// $navHtml           - Holds the navigation menu HTML
// $loginOrLogoutHtml - Holds either the login or logout form HTML
// $currentView       - Tracks which view should be displayed (default is 'home')
// $errorMessage      - Stores error messages for login validation
// $usernameInput     - Stores the username input to repopulate the form if needed
// $heading           - Heading text for the selected view
// $placeholders      - Placeholder array for form error messages and values
$title = 'Web Programming Using PHP - Coursework 2 - Task 4';
$header = htmlHeading('Web Programming Using PHP - Coursework 2 - Task 4', 1);
$header .= htmlHeading('Single point of entry authenticated website with browsing history state preservation', 2);
$content = '';
$navHtml = '';
$loginOrLogoutHtml = '';
$loggedInUserData = '';
$currentView = 'home';
$errorMessage = '';
$usernameInput = '';
$heading = '';
$placeholders = [];



// Handle logout action:
// If the logout form has been submitted:
// - Check if a user is logged in (session variable set)
// - Save the current view in a cookie so it can be restored on next login
//   The cookie:
//     * Name: the username
//     * Value: the name of the current view (or 'home' if none)
//     * Expiration: 5 days from now
//     * Path: applies to the entire site (/)
// - Clear all session data
// - Remove the session cookie if applicable
// - Destroy the session completely on the server
// - Redirect back to index.php to reload the page without any session data

if (isset($_POST['logout'])) {
    if (isset($_SESSION['username'])) {
        // Save last viewed page in a cookie before logout
        setcookie(
            $_SESSION['username'],
            $_GET['view'] ?? 'home',
            time() + (5 * 24 * 60 * 60),
            "/"
        );
    }

    // ① Clear session array
    $_SESSION = [];

    // ② Remove the session cookie if set
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - (24 * 60 * 60),
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // ③ Destroy session on the server
    session_destroy();

    // Reload the page (without any URL parameters)
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


// Handle login action:
// If the login form has been submitted:
// - Validate the submitted username and password using validateformData()
//   * This returns:
//       $validData: true if validation passed, false otherwise
//       $cleanData: cleaned/validated input values
//       $placeholders: any error messages for placeholders in the form
// - Always preserve the username input so the field stays filled if there is an error
// - If validation passed:
//     * Query the database for the submitted username
//     * Check that the password matches exactly
//     * If successful:
//         - Save username and userType in the session (logs the user in)
//         - Check if a cookie exists with their last viewed page and set $currentView to that
// - If validation failed:
//     * Combine validation error messages into $errorMessage for display

if (isset($_POST['login'])) {
    // Validate the posted form data
    list($validData, $cleanData, $placeholders) = validateformData($_POST);

    // Always keep the typed username in the field
    $usernameInput = $placeholders['[+userName+]'] ?? '';

    if ($validData) {
        // Attempt to load the user from DB
        $stmt = $pdo->prepare("SELECT * FROM usersTable WHERE usersTable_username = :uname");
        $stmt->execute([':uname' => $cleanData['userName']]);
        $user = $stmt->fetch();

        if ($user && $cleanData['password'] === $user['usersTable_password']) {
            // Login successful
            $_SESSION['username'] = $user['usersTable_username'];
            $_SESSION['userType'] = $user['usersTable_userType'];

            // Restore last view if cookie exists
            if (isset($_COOKIE[$_SESSION['username']])) {
                $currentView = $_COOKIE[$_SESSION['username']];
            }
        } else {
            $errorMessage = 'Invalid username or password.';
        }
    } else {
        // There were validation errors—combine them in $errorMessage
        $errorMessage = trim(($placeholders['[+userNameError+]'] ?? '') . '' . 
           ($placeholders['[+pwdError+]'] ?? '')
		);
    }
}


// Determine the current view
if (isset($_GET['view'])) {
    $currentView = $_GET['view'];
}

// Validate view
$validViews = ['home', 'admin', 'academic', 'student'];
if (!in_array($currentView, $validViews)) {
    $currentView = '404';
}

// Determine which views the current user is allowed to access
// If no userType is set in the session, the user is not logged in
if (!isset($_SESSION['userType'])) {
    // Not logged in: only home allowed
    $allowedViews = ['home'];
} else {
    switch ($_SESSION['userType']) {
        case 'admin':
			// Admins can access all views
            $allowedViews = ['home', 'admin', 'academic', 'student'];
            break;
        case 'academic':
			 // Academics can access home, academic, and student views
            $allowedViews = ['home', 'academic', 'student'];
            break;
        case 'student':
			// Students can access home and student views
            $allowedViews = ['home', 'student'];
            break;
        default:
			// If somehow userType is invalid, restrict to home
            $allowedViews = ['home'];
    }
}

// If trying to access something disallowed, show 404
if ($currentView !== '404' && !in_array($currentView, $allowedViews)) {
    $currentView = '404';
}

//Call buit in dynamic nav function
$navHtml = buildNav($_SESSION['userType'] ?? '');




// Load login or logout form
#htmlspecialchars() converts special characters to HTML entities 
#so they display as text instead of being interpreted as HTML or JavaScript.
#It prevents HTML injection and XSS attacks.
if (isset($_SESSION['username'])) {
    $logoutTemplate = file_get_contents('html/logoutFormTemplate.html');
    $loginOrLogoutHtml = str_replace(
        '[+loggedInName+]',
        htmlspecialchars($_SESSION['username']) . '(' . htmlspecialchars($_SESSION['userType']) . ')',
        $logoutTemplate
    );
} else {
    $loginTemplate = file_get_contents('html/loginFormTemplate.html');
	$loginOrLogoutHtml = str_replace(
		['[+uName+]', '[+loginError+]', '[+userNameError+]', '[+pwdError+]'],
		[
			htmlspecialchars($usernameInput),
			$errorMessage,
			$placeholders['[+userNameError+]'] ?? '',
			$placeholders['[+pwdError+]'] ?? ''
		],
		$loginTemplate
);

}

// Decide which view file to load and what heading to show

switch ($currentView) {
    case 'home':
		// If currentView is 'home', show "Home Page" heading
        $heading = '<h2>Home Page View</h2>';
		 // Include the PHP file that generates the Home content
        include 'views/home.php';
        break;
    case 'admin':
		// For admin view
        $heading = '<h2>Admin View</h2>';
        include 'views/admin.php';
        break;
    case 'academic':
		// For academic view
        $heading = '<h2>Academic View</h2>';
        include 'views/academic.php';
        break;
    case 'student':
		 // For student view
        $heading = '<h2>Student View</h2>';
        include 'views/student.php';
        break;
    case '404':
	default:
		// For any unknown view, show 404 page
        $heading = '<h2>Page Not Found</h2>';
        include 'views/404.php';
        break;
}
// Check if both username and userType session variables are set (i.e., user is logged in)
if (isset($_SESSION['username']) && isset($_SESSION['userType'])) {
    $loggedInUserData = htmlParagraph("Logged in as " . htmlspecialchars($_SESSION['username']) . " (" . htmlspecialchars($_SESSION['userType']) . ")");
} else {
    $loggedInUserData = ''; 
}

// Load the HTML page template file into a string
$template = file_get_contents('html/pageTemplate.html');

// Replace all placeholder tags in the template with dynamic content
echo str_replace(
    [
        '[+title+]',
		'[+header+]',
        '[+nav+]',
        '[+loginOutForm+]',
        '[+content+]',
        '[+heading+]',
        '[+loggedInUserData+]'
    ],
    [
        $title,
		$header,
        $navHtml,
        $loginOrLogoutHtml,
        $content,
        $heading,
        $loggedInUserData
    ],
    $template // The template HTML to process
);




?>



