<?php
class UserRoleMappingTable
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

    // Create a new user_role_mapping record
    public function create($u_id, $r_id, $active)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO user_role_mapping (u_id, r_id, active, createdAt, updatedAt) VALUES (?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("iii", $u_id, $r_id, $active);
        return $stmt->execute();
    }

    // Read a user_role_mapping record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM user_role_mapping WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a user_role_mapping record by ID
    public function update($id, $u_id, $r_id, $active)
    {
        $stmt = $this->mysqli->prepare("UPDATE user_role_mapping SET u_id = ?, r_id = ?, active = ?, updatedAt = NOW() WHERE id = ?");
        $stmt->bind_param("iiii", $u_id, $r_id, $active, $id);
        return $stmt->execute();
    }

    // Delete a user_role_mapping record by ID
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM user_role_mapping WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function deleteByUserId($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM user_role_mapping WHERE u_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Read all user_role_mapping records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM user_role_mapping");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchUserRoleMappings()
    {
        $query = "
            SELECT ur.id, u.username, role_id, r.role_name, ur.active
            FROM user_role_mapping ur
            JOIN users u ON ur.u_id = u.id
            JOIN role r ON ur.r_id = r.role_id
        ";
        $result = $this->mysqli->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
