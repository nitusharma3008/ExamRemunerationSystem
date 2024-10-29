<?php
class TimeClass
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
            $this->mysqli = new mysqli('localhost', 'root', '', 'enumration_db');
        }

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function create($time)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO time (timing) VALUES(?)");
        $stmt->bind_param("s", $time);
        return $stmt->execute();
    }

    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM time WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function readAll_()
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM time");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $username)
    {
        $stmt = $this->mysqli->prepare("UPDATE time SET timing = ? ,  updatedAt = NOW() WHERE id = ? ");
        $stmt->bind_param("si", $username, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM time WHERE id= ? ");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM time");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
