<?php
class ExamPatternClass
{
    private $mysqli;

    public function connect($conn)
    {
        $this . $mysqli = $conn;
    }

    //Constructor with optional parameters
    public function __construct($host = null, $dbname = null, $username = null, $password = null)
    {
        if ($host && $dbname && $username && $password) {
            $this->mysqli = new mysqli($host, $username, $password, $dbname);
        } else {
            $this->mysqli = new mysqli('localhost', 'root', '', 'enumration_db');
        }

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    //create a new record
    public function create($exam_pattern, $description)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO exam_pattern (pattern,description , createdAt, updatedAt) VALUES(?,?, NOW(), NOW())");
        $stmt->bind_param("ss", $exam_pattern, $description);
        return $stmt->execute();
    }

    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM exam_pattern WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    //update a record by Id

    public function update($id, $pattern, $description)
    {
        $stmt = $this->mysqli->prepare("UPDATE exam_pattern SET pattern = ? ,description = ?  , updatedAt = NOW() WHERE id = ?");
        $stmt->bind_param("ssi", $pattern, $description, $id);
        return $stmt->execute();
    }

    //delete a record by ID 
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM exam_pattern WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    //Read all records 

    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM exam_pattern");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //Close the database connection
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
