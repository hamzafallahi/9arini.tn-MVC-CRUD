<?php


/****
 * app info
 */
define('APP_NAME', '9arini Academy');
define('APP_DESC', 'Tunisian E-learning Platform');

/****
 * database config
 */
if ($_SERVER['SERVER_NAME'] == 'localhost') {
	//database config for local server
	define('DBHOST', 'localhost');
	define('DBNAME', 'securit');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');

	//root path e.g localhost/
	define('ROOT', 'http://localhost/security/public');
} else {
	//database config for live server
	define('DBHOST', 'localhost');
	define('DBNAME', 'securit');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');

	//root path e.g https://www.yourwebsite.com
	define('ROOT', 'http://');
}

/*App Information:
APP_NAME and APP_DESC: These constants define the name and description of application, respectively. In this case, the app is named "9arini Academy," described as a "Tunisian E-learning Platform."




Database Configuration:
The configuration is based on the server environment (local or live).
If the server's name is 'localhost' (indicating a local development environment):
Database Host (DBHOST): Set to 'localhost'.
Database Name (DBNAME): Set to 'security'.
Database User (DBUSER): Set to 'root'.
Database Password (DBPASS): Set to an empty string (assuming no password for local development).
Database Driver (DBDRIVER): Set to 'mysql' for MySQL databases.
Root Path (ROOT): Set to 'http://localhost/security/public' for local development.
If the server is not 'localhost' (presumably indicating a live production environment):
The database configuration is the same as for the local server.
Root Path (ROOT): This part is left empty ('http://') in code, which should be completed with the actual root path of the live server, such as 'https://www.yourwebsite.com'.


Explanation:
The config.php file is a central place to define important constants used throughout application, such as application name, database settings, and root paths.
By checking the server name ($_SERVER['SERVER_NAME']), the file determines whether the application is running in a local or live environment and configures database and root path accordingly.
This setup allows for easy configuration management when transitioning between development and production environments, ensuring that database credentials and paths are appropriately set for each environment.*/