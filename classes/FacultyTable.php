<?php
class FacultyTable
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

    // Create a new faculty record
    public function create($name, $email, $password, $contact, $active)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO faculty (name, email, password, contact, active, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("ssssi", $name, $email, $password, $contact, $active);
        return $stmt->execute();
    }

    // Read a faculty record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM faculty WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a faculty record by ID
    public function update($id, $name, $email, $password, $contact, $active)
    {
        $stmt = $this->mysqli->prepare("UPDATE faculty SET name = ?, email = ?, password = ?, contact = ?, active = ?, updatedAt = NOW() WHERE id = ?");
        $stmt->bind_param("ssssii", $name, $email, $password, $contact, $active, $id);
        return $stmt->execute();
    }

    // Delete a faculty record by ID
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM faculty WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Read all faculty records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM faculty");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
