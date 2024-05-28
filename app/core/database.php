<?php

/**
 * database class
 */
/**
 * Database class for handling database connections and queries.
 */
class Database
{
	/**
	 * Establishes a database connection using PDO .
	 * 
	 *
	 * @return PDO|false A PDO object if successful, false otherwise.
	 */
	/* The connect() method is responsible for establishing a connection to the database using PDO (PHP Data Objects), a PHP extension for accessing databases.
Code Explanation:

		$str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;: This line constructs a string ($str) that specifies the database driver, hostname, and database name. 
		The values for DBDRIVER, DBHOST, and DBNAME are assumed to be defined constants or variables that hold the necessary connection information. For example, DBDRIVER might be 'mysql', DBHOST could be 'localhost', and DBNAME could be the name of the database.

		return new PDO($str, DBUSER, DBPASS);: This line creates a new PDO object, which represents a connection to the database. It uses the $str string created earlier to specify the database type, host, and name. 
		DBUSER and DBPASS are assumed to be the database username and password, respectively, needed to authenticate and establish the connection.
		When you call $this->connect() in the code, it executes this connect() method.

		The method uses the information provided (such as database type, host, name, username, and password) to create a PDO object, which represents the connection to database.
		If the connection is successful, the method returns the PDO object, 
		allowing you to perform database operations using this connection.*/
	private function connect()
	{
		$str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
		return new PDO($str, DBUSER, DBPASS);
	}
	/**
	 * Executes a prepared query with optional data bindings and fetches results.
	 *
	 * @param string $query The SQL query to execute.
	 * @param array $data An associative array of data to bind to the query.
	 * @param string $type The fetch type ('object' for objects, 'array' for associative arrays).
	 * @return array|false An array of fetched results if successful, false otherwise.
	 */
	/* The query() method is designed to execute SQL queries against the database using PDO. It provides flexibility in specifying the query, binding data parameters, and retrieving results in different formats (object or assoc array).
Code Explanation:
		$con = $this->connect();: This line calls the connect() method from Database class to establish a database connection using PDO. The resulting PDO object is stored in the $con variable for further use in executing the query.

		$stm = $con->prepare($query);: This line prepares the SQL query specified in the $query parameter for execution. The prepared statement ($stm) is a security measure that helps prevent SQL injection attacks by separating SQL code from data.

		if ($stm) { ... }: This condition checks if the prepared statement was successfully created. If $stm is not false, it means the preparation was successful, and the code proceeds to execute the query.

		$check = $stm->execute($data);: Here, the method executes the prepared statement with optional data bindings provided in the $data parameter. If execution is successful, $check is set to true.

		if ($check) { ... }: This condition checks if the query execution was successful. If so, it continues processing the result.

		$type = PDO::FETCH_OBJ; or $type = PDO::FETCH_ASSOC;: These lines determine the fetch mode based on the $type parameter. If $type is 'object', it sets the fetch mode to fetch objects (PDO::FETCH_OBJ), and if it's anything else, it defaults to fetching associative arrays (PDO::FETCH_ASSOC).

		$result = $stm->fetchAll($type);: This line fetches all rows from the result set according to the fetch mode ($type) and stores them in the $result variable.

		if (is_array($result) && count($result) > 0) { ... }: This condition checks if the $result array is not empty and contains data. If true, it proceeds to additional processing.

		foreach ($this->afterSelect as $func) { ... }: This loop iterates over any functions defined in the $afterSelect property of the Database class. These functions are intended to be executed after fetching data from a SELECT query, allowing for custom data processing or manipulation.

		return $result;: If everything is successful and data is retrieved, the method returns the result set ($result).

		return false; // Query execution failed: If any step in the process fails (e.g., query preparation, execution, or fetching data), the method returns false to indicate a failed query execution. */
	public function query($query, $data = [], $type = 'object')
	{
		$con = $this->connect();

		$stm = $con->prepare($query);
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				if ($type == 'object') {
					$type = PDO::FETCH_OBJ;
				} else {
					$type = PDO::FETCH_ASSOC;
				}

				$result = $stm->fetchAll($type);

				if (is_array($result) && count($result) > 0) {
					// Directly call get_role function
					$result = $this->get_role($result);

					return $result;
				}
			}
		}

		return false; // Query execution failed
	}
	/**
	 * Creates necessary tables in the database if they do not exist.
	 */
	public function create_tables()
	{
		//users table
		$query = "

			CREATE TABLE IF NOT EXISTS `users` (
			 `id` int(11) NOT NULL AUTO_INCREMENT,
			 `email` varchar(100) NOT NULL,
			 `firstname` varchar(30) NOT NULL,
			 `lastname` varchar(30) NOT NULL,
			 `password` varchar(255) NOT NULL,
			 `role` varchar(20) NOT NULL,
			 `date` date DEFAULT NULL,
			 PRIMARY KEY (`id`),
			 KEY `email` (`email`),
			 KEY `firstname` (`email`),
			 KEY `lastname` (`email`),
			 KEY `date` (`date`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

		";
		// Execute the create table query
		$this->query($query);
	}
}
