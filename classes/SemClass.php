<?php
class SemClass
{
    private $mysqli;
    public function connect($conn)
    {
        $this . $mysqli = $conn;
    }

    public function __construct($host = null, $dbname = null, $username = null, $password = null)
    {
        if ($host && $dbname && $username && $password) {
            $this->mysqli = new mysqli($host, $username, $password, $dbname);
        } else {
            $this->mysqli  = new mysqli('localhost', 'root', '', 'enumration_db');
        }

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function create($semname)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO semester (sem) VALUES(?)");
        $stmt->bind_param("s", $semname);
        return $stmt->execute();
    }

    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM semester WHERE id= ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function readAll_()
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM semester");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $semname)
    {
        $stmt = $this->mysqli->prepare("UPDATE semester SET sem = ? , updatedAt = NOW() WHERE id = ? ");
        $stmt->bind_param("si", $semname, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM semester WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM semester");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}