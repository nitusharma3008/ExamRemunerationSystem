<?php
class ExamTypeTable
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

    // Create a new exam type record
    public function create($type, $amount, $description)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO exam_type (type,rate_per_hour, description, createdAt) VALUES (?,?, ?, NOW())");
        $stmt->bind_param("sis", $type, $amount, $description);
        return $stmt->execute();
    }

    // Read an exam type record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM exam_type WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update an exam type record by ID
    public function update($id, $type, $amount, $description)
    {
        $stmt = $this->mysqli->prepare("UPDATE exam_type SET type = ?, rate_per_hour = ? ,description = ?, createdAt = NOW() WHERE id = ?");
        $stmt->bind_param("sisi", $type, $amount, $description, $id);
        return $stmt->execute();
    }

    // Delete an exam type record by ID
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM exam_type WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Read all exam type records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM exam_type");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}