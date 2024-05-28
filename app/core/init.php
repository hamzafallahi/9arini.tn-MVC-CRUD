<?php
// Autoload Models
spl_autoload_register(function ($class_name) {
	// Split the namespace and class name
	$parts = explode("\\", $class_name);
	$class_name = array_pop($parts);
	// Get the class name without the namespace
	require_once "../app/models/" . $class_name . ".php";     // Include the corresponding model file based on the class name
});

// Include Configuration
require "config.php";

// Include Helper Functions
require "functions.php";

// Include Database Configuration and Connection
require "database.php";

// Include Base Model Class
require "model.php";

// Include Base Controller Class
require "controller.php";

// Include Application Initialization
require "app.php";
/* detailed explanation:
		Autoload Models (spl_autoload_register):
		This block of code registers an autoloader function using spl_autoload_register. It automatically includes PHP files containing class definitions when those classes are instantiated but not yet defined.
		The function takes the class name as input, splits it into parts based on the namespace separator "\" using explode("\\", $class_name).
		It extracts the class name without the namespace by using array_pop($parts) and stores it in $class_name.
		Finally, it includes the corresponding model file from the "../app/models/" directory based on the extracted class name.
		Include Configuration (require "config.php"):
		This line includes the "config.php" file, which typically contains constants, settings, and environment configurations used throughout the application.
		Include Helper Functions (require "functions.php"):
		This line includes the "functions.php" file, which contains reusable helper functions used across different parts of the application.
		Include Database Configuration and Connection (require "database.php"):
		This line includes the "database.php" file, which sets up the database configuration (such as DB host, name, user, password, and driver) and establishes a connection to the database using PDO or a similar database abstraction layer.
		Include Base Model Class (require "model.php"):
		This line includes the "model.php" file, which defines a base Model class containing methods and properties commonly used for database operations (e.g., CRUD operations).
		Include Base Controller Class (require "controller.php"):
		This line includes the "controller.php" file, which defines a base Controller class providing basic functionality for handling HTTP requests, rendering views, and managing application logic.
		Include Application Initialization (require "app.php"):
		This line includes the "app.php" file, which initializes the application by handling URL routing, instantiating controllers, and calling controller methods based on the requested URLs. It acts as the entry point for the MVC architecture, orchestrating the flow of requests and responses within the application.*/