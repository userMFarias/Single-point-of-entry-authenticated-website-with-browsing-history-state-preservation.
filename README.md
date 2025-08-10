# Single-point-of-entry-authenticated-website-with-browsing-history-state-preservation.
You are required to build a single point of entry Model View Controller website in PHP which will have a
publicly accessible home page. Users should be able to login via a web form, supplying a username and a
password, authenticated using PHP Data Objects against a MySQL database table of users (you should
re-use the MySQL ‘usersTable’ your created in Task 3 for this).
On successful login, the login form should be replaced with the username and user type of the user logged
in, plus a logout button and a PHP Session should be created. Also, after successful login, the user will be
presented with a main NAV menu allowing access to four views; “home”, “admin”, “academic” and “student”
dependent on their user type and the user can navigate between any of their accessible views or logout.
When a user logs out, the last page they were viewing when they logged out should be saved for up to five
days and if they login again, within five days, they should be shown the saved view.
PHP Cookies should be used to implement this. click here to see a working example.
You are provided with a basic website file/folder structure which contains HTML templates for the main
page, login and logout forms, plus template PHP scripts and some basic HTML user defined functions.
Your php application should conform to the following requirements:
1. The MVC controller (index.php) will need to perform the following functions:
a. Include a configuration file which defines a PHP Data Objects connection to your MySQL
database and a file containing all your user defined functions. Start a PHP Session, as
you will need to save a successfully logged in username and userType, so it can be
accessible anywhere in your application.
b. Detect if the user is attempting to login by checking for submission of the login form.
Validate username and password against the ‘usersTable’ in your MySQL database (you
should be able to re-use some of your solution to Task 3 for this). If login is valid, save the
username and userType in the PHP Session array and check for a Cookie relating to the
logged in username; if a Cookie is found, read the Cookie data and set the view to load to be
the read Cookie data (should be one of “home”, “admin”, “academic” or “student”).
c. Determine whether to display the login form or logout form. The login form should be
displayed/re-displayed on initial website load, or if a login attempt fails (relevant error
messages should be displayed on the login form populated from the validation process in
a.). The logout form should be displayed if a user successfully logs in, which will contain the
username plus the “Logout” button. You have been supplied with HTML templates of these
forms, with embedded placeholders, which you should use.
d. Detect if the logout form has been submitted. If so, create a Cookie with name =
username saved in the PHP Session array, data = current view, duration = 5 days and
available to the entire website. The current Session should then be destroyed correctly, and
the “Home” view displayed along with the login form.
e. Set the current view by checking if a view has been selected from the NAV menu, or set
from a Cookie and if so, set it as the current view; otherwise set the current view to be the
“Home” view.
f. Build a dynamic NAV menu, according to the following rules (by accessing the “userType”
data set in the Session array). You should write PHP code to apply the following rules and
build the relevant HTML NAV link elements, using URL parameters to achieve a single point
of entry:
i. “admin” has access to: “home”, “admin”, “academic” and “student” views
ii. “academic” has access to: “home”, “academic” and “student” views
iii. “student” has access to: “home and “student” views
iv. public users will only have access to “home”
g. Include PHP model view code of the selected view. N.B. the view PHP scripts in the
“views” sub folder are effectively the respective Model code that generates the HTML view
code that will be displayed in the main page template. You should report appropriate errors
if an unknown URL parameter is entered by the user, or view file not found.
h. Display the main page HTML with placeholders filled in. The respective model view
scripts included in g. should set the relevant data variables (HTML data) which should then
be used to replace the placeholders in the main page HTML template file.
2. The “home” model view should display the test users available in the usersTable to facilitate
testing of the application. N.B. example test users are given in the file home.php which you should
set up in your ‘usersTable’ in your MySQL database. You can simply display these as given as
content for the “home” view; or to get full marks for this component, you should read the users from
the usersTable database table and display them appropriately as HTML paragraphs; as shown in
the example output.
3. The other three model views “student”, “academic” and “admin” should simply display the
dummy lorem ipsum content provided as text files in the resources ‘models’ folder as HTML
paragraphs, with an appropriate <h2> heading stating either “Home/Admin/Academic/Student
View”.
4. The model view 404.php should be included in the controller (index.php) if an unknown URL
parameter is detected which is not “home”, “admin”, “academic” or “student”.
