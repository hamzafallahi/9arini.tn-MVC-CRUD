<?php

namespace Model;

/**
 * main model class
 */

use \Database;

class Model extends Database
{

	public $order = 'desc';
	public $limit = 10;
	public $offset = 0;

	protected $table = "";

	public function insert($data)
	{

		//remove unwanted columns
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into " . $this->table;
		$query .= " (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

		$this->query($query, $data);
	}

	public function update($id, $data)
	{

		//remove unwanted columns
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update " . $this->table . " set ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . ",";
		}

		$query = trim($query, ",");
		$query .= " where id = :id ";

		$data['id'] = $id;
		$this->query($query, $data);
	}

	public function findAll()
	{

		$query = "select * from " . $this->table . " order by id $this->order limit $this->limit offset $this->offset";

		$res = $this->query($query);

		if (is_array($res)) {
			//run afterSelect functions
			$res = $this->get_role($res);

			return $res;
		}

		return false;
	}

	public function delete(int $id): bool
	{

		$query = "delete from " . $this->table . " where id = :id limit 1";
		$this->query($query, ['id' => $id]);

		return true;
	}



	public function first($data)//finds and returns first matching record
	{

		$keys = array_keys($data);

		$query = "select * from " . $this->table . " where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by id $this->order limit 1";

		$res = $this->query($query, $data);

		if (is_array($res)) {

			$res = $this->get_role($res);

			return $res[0];
		}

		return false;
	}


	public function where($data)
	{

		$keys = array_keys($data);

		$query = "select * from " . $this->table . " where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by id $this->order limit $this->limit offset $this->offset";
		$res = $this->query($query, $data);

		if (is_array($res)) {

			//run afterSelect functions
			$res = $this->get_role($res);

			return $res;
		}

		return false;
	}
	public $errors = array();
	public function __construct()
	{
		// code...
		if (!property_exists($this, 'table')) {
			$this->table = strtolower($this::class) . "s";
		}
	}
}
/*Namespace and Inheritance:
! The Model class is defined within the Model namespace and extends the Database class, indicating that it inherits database-related functionalities.
? Constructor (__construct):
The constructor initializes properties such as $order, $limit, $offset, $table, and $errors.
If the $table property is not explicitly set in child classes, it automatically generates the table name based on the class name (assuming a plural naming convention for tables).
Database Operations:
The class contains methods for common database operations like insert, update, findAll, delete, first, and where.
These methods handle SQL queries for data manipulation and retrieval, utilizing PDO for database interactions.
Data Validation and Security:
The insert and update methods remove unwanted columns from the data array before executing queries, enhancing security and preventing SQL injection attacks.
Error Handling:
The $errors property can be used to store and manage errors encountered during model operations, facilitating error handling in applications.
Dynamic Query Building:
Methods like findAll, first, and where dynamically construct SQL queries based on specified criteria, allowing flexible data retrieval and filtering.*/