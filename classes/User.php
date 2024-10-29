<?php
class UsersTable
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

    // Create a new user record
    public function create($username, $password, $email, $fullname, $contact, $active)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO users (username, password, email, fullname, contact, active, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("ssssssi", $username, $password, $email, $fullname, $contact, $datetime, $active);
        return $stmt->execute();
    }

    // Read a user record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a user record by ID
    public function update($id, $username, $email, $fullname, $password,  $contact, $active)
    {
        $stmt = $this->mysqli->prepare("UPDATE users SET username = ?, password = ?, email = ?, fullname = ?, contact = ?,active = ?, updatedAt = NOW() WHERE id = ?");
        $stmt->bind_param("sssssii", $username,  $email, $fullname, $password,  $contact, $active, $id);
        $sqlQuery = sprintf(
            "UPDATE users SET username = '%s', email = '%s', fullname = '%s', password = '%s', contact = '%s', active = %s, updatedAt = NOW() WHERE id = %d",
            $username,
            $email,
            $fullname,
            $password,
            $contact,
            $active,
            $id
        );

        // Print the query
        echo $sqlQuery;
        return $stmt->execute();
    }

    // Delete a user record by ID
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Read all user records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function validateUser($username, $password)
    {
        $query = "SELECT u.id as u_id,u.username as u_name,u.email as u_email,u.fullname as u_full_name,u.contact as u_contact,r.role_id as r_id,r.role_name as r_name FROM users u JOIN user_role_mapping urm ON urm.u_id=u.id JOIN role r ON urm.r_id=r.role_id where u.username=? and u.password=? and u.active=true";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $result = $stmt->get_result();
    }



    // Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
