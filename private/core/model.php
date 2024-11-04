<?php

// Model class that extends Database functionality
class Model extends Database
{
    // Array to hold error messages
    public $errors = array();

    // Protected properties for table name and allowed columns
    protected $table;
    protected $allAllowedColumns = [];
    protected $runBeforeInsertIntoTable = [];
    protected $runAfterSelectingRecords = [];

    // Constructor method that initializes the model
    public function __construct()
    {

        // Always set the table name based on the child class name
        $this->setTableName();
    }

    // Private method to set the table name based on the class name
    private function setTableName()
    {
        if (empty($this->table)) {
            // Get the name of the child class
            $className = get_class($this);
            // Remove namespace if present
            $className = substr($className, strrpos($className, '\\'));
            // Convert to lowercase and add 's' for plural
            $this->table = strtolower($className) . 's';
        }
    }

    // Insert (save data) into a table 
    public function insert($data)
    {

        // Remove unwanted columns that are not in allowed columns
        if (property_exists($this, 'allAllowedColumns')) {
            foreach ($data as $key => $column) {
                if (!in_array($key, $this->allAllowedColumns)) {
                    unset($data[$key]); // Remove the column if not allowed
                }
            }
        }

        // Run functions before insert if any are defined
        if (property_exists($this, 'runBeforeInsertIntoTable')) {
            foreach ($this->runBeforeInsertIntoTable as $func) {
                $data = $this->$func($data); // Call each function with data
            }
        }

        // Prepare keys and values for the SQL query
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);

        // Construct the SQL INSERT query
        $query = "INSERT INTO $this->table ($columns) VALUES(:$values)";

        // Execute the query with the provided data
        return $this->query($query, $data);
    }

    // Update a table with new data based on ID
    public function update($id, $data)
    {
        // Prepare the SET part of the SQL query
        $str = '';
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ","; // Set each column to be updated
        }
        $str = trim($str, ","); // Remove the trailing comma
        $data['id'] = $id; // Add the ID to the data array
        // Construct the SQL UPDATE query
        $query = "UPDATE $this->table SET $str WHERE id = :id";
        // Execute the query with the provided data
        return $this->query($query, $data);
    }


    // Search for specific data in the table
    public function where($column, $value)
    {
        // Escape characters to prevent SQL injection
        $column = esc_chars($column);
        $value = esc_chars($value);
        // Construct the SQL SELECT query
        $query = "SELECT * FROM $this->table WHERE $column = :value";

        // Execute the query and return the result
        $data = $this->query(
            $query,
            [
                'value' => $value // Bind the value to the query
            ]
        );

        // Run functions after select if any are defined
        if (is_array($data)) {
            if (property_exists($this, 'runAfterSelectingRecords')) {
                foreach ($this->runAfterSelectingRecords as $func) {
                    $data = $this->$func($data); // Call each function with data
                }
            }
        }

        return  $data;
    }
    // Search for specific data in the table
    public function fetchSingleRow($column, $value)
    {
        // Escape characters to prevent SQL injection
        $column = esc_chars($column);
        $value = esc_chars($value);
        // Construct the SQL SELECT query
        $query = "SELECT * FROM $this->table WHERE $column = :value";

        // Execute the query and return the result
        $data = $this->query(
            $query,
            [
                'value' => $value // Bind the value to the query
            ]
        );

        // Run functions after select if any are defined
        if (is_array($data)) {
            if (property_exists($this, 'runAfterSelectingRecords')) {
                foreach ($this->runAfterSelectingRecords as $func) {
                    $data = $this->$func($data); // Call each function with data
                }
            }
        }
        if (is_array($data)) {
            $data = $data[0];
        }
        return  $data;
    }

    // Delete a record from the table by ID
    public function delete($id)
    {
        // Construct the SQL DELETE query
        $query = "DELETE FROM $this->table WHERE id=:id";
        $data['id'] = $id; // Prepare the data with the ID
        // Execute the query and return the result
        return $this->query($query, $data);
    }

    // Fetch all records from the table
    public function fetchAll()
    {
        // Construct the SQL SELECT query to fetch all records
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        // Execute the query and return the result
        $data = $this->query($query);

        // Run functions after select if any are defined
        if (is_array($data)) {
            if (property_exists($this, 'runAfterSelectingRecords')) {
                foreach ($this->runAfterSelectingRecords as $func) {
                    $data = $this->$func($data); // Call each function with data
                }
            }
        }
        return $data;
    }
}
