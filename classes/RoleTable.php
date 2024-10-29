<?php
class RoleTable
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

    // Create a new role record
    public function create($role_name, $role_description)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO role (role_name, role_description, createdAt, updatedAt) VALUES (?, ?, NOW(), NOW())");
        $stmt->bind_param("ss", $role_name, $role_description);
        return $stmt->execute();
    }

    // Read a role record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM role WHERE role_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a role record by ID
    public function update($id, $role_name, $role_description)
    {
        $stmt = $this->mysqli->prepare("UPDATE role SET role_name = ?, role_description = ?, createdAt = NOW() , updatedAt = NOW() WHERE role_id = ?");
        $stmt->bind_param("ssi", $role_name, $role_description, $id);
        return $stmt->execute();
    }

    // Delete a role record by ID
    public function delete($role_id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM role WHERE role_id = ?");
        $stmt->bind_param("i", $role_id);
        return $stmt->execute();
    }

    // Read all role records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM role");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
