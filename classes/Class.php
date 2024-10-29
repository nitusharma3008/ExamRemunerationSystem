<?php
class ClassTable
{
    private $mysqli;

    public function connect($conn)
    {
        $this . $mysqli = $conn;
    }
    // Constructor with optional parameters
    public function __construct($host = null, $dbname = null, $username = null, $password = null)
    {
        if ($host && $dbname && $username && $password) {
            // Use provided parameters
            $this->mysqli = new mysqli($host, $username, $password, $dbname);
        } else {
            // Use default values
            $this->mysqli = new mysqli('localhost', 'root', '', 'enumration_db');
        }

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    // Create a new record
    public function create($class_name)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO classes (class_name) VALUES (?)");
        $stmt->bind_param("s", $class_name);
        return $stmt->execute();
    }

    // Read a record by ID
    public function read($class_id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM classes WHERE class_id = ?");
        $stmt->bind_param("i", $class_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function readAll_()
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM classes");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a record by ID

    public function update($class_id, $class_name)
    {
        // Prepare the SQL statement with placeholders
        $stmt = $this->mysqli->prepare("UPDATE classes SET class_name = ?, updatedAt = NOW() WHERE class_id = ?");

        // Bind the parameters to the placeholders
        $stmt->bind_param("si", $class_name, $class_id);

        // Execute the query and return the result
        return $stmt->execute();
    }


    // Delete a record by ID
    public function delete($class_id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM classes WHERE class_id = ?");
        $stmt->bind_param("i", $class_id);
        return $stmt->execute();
    }

    // Read all records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM classes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}