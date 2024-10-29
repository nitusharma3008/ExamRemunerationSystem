<?php
class DepartmentTable
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

    // Create a new department record
    public function create($dept_name)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO department (dept_name, createdAt, updatedAt) VALUES (?, NOW(), NOW())");
        $stmt->bind_param("s", $dept_name);
        return $stmt->execute();
    }

    // Read a department record by ID
    public function read($dept_id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM department WHERE dept_id = ?");
        $stmt->bind_param("i", $dept_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a department record by ID
    public function update($dept_id, $dept_name)
    {
        $stmt = $this->mysqli->prepare("UPDATE department SET dept_name = ?, updatedAt = NOW() WHERE dept_id = ?");
        $stmt->bind_param("si", $dept_name, $dept_id);
        return $stmt->execute();
    }

    // Delete a department record by ID
    public function delete($dept_id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM department WHERE dept_id = ?");
        $stmt->bind_param("i", $dept_id);
        return $stmt->execute();
    }

    // Read all department records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM department");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
