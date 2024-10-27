<?php
#db connection file
class Database
{
	// Connection function
	private function connection()
	{
		try {
			// Create a PDO connection string
			$string = DB_DRIVE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
			// Create a new PDO connection
			$conn = new PDO($string, DB_USER, DB_PASS);
			// Set the PDO error mode to exception

		} catch (PDOException $e) {
			// Log the error message
			logError("Error connecting to the database: " . $e->getMessage());
			// Return null or handle the error appropriately
			return null;
		}
		return $conn;
	}


	// Run a query with optional data and data type
	public function query($query, $data = array(), $data_type = "object")
	{

		// Get the database connection
		$conn = $this->connection();
		// Prepare the query
		$stmt = $conn->prepare($query);
		if ($stmt) {
			// Execute the query with the given data
			$check = $stmt->execute($data);
			if ($check) {
				// Fetch the results
				if ($data_type == "object") {
					// Fetch as objects
					$data = $stmt->fetchAll(PDO::FETCH_OBJ);
				} else {
					// Fetch as associative arrays
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				// Check if the results are an array with at least one element
				if (is_array($data) && count($data) > 0) {
					// Return the results
					return $data;
				}
			}
		}
		// Return false if the query failed
		return false;
	}
}
