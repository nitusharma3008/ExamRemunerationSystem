<?php
class DurationTable
{
    private $mysqli;

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

    // Create a new duration record
    public function create($duration)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO duration (duration, createdAt, updatedAt) VALUES (?, NOW(), NOW())");
        $stmt->bind_param("s", $duration);
        return $stmt->execute();
    }

    // Read a duration record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM duration WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a duration record by ID
    public function update($id, $duration)
    {
        $stmt = $this->mysqli->prepare("UPDATE duration SET duration = ?, updatedAt = NOW() WHERE id = ?");
        $stmt->bind_param("si", $duration, $id);
        return $stmt->execute();
    }

    // Delete a duration record by ID
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM duration WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Read all duration records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM duration");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
