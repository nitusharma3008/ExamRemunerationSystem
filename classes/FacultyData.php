<?php
// session_start();
//$createdBy = $_SESSION['userId'];

class FacultyDataTable
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

    // Create a new faculty_data record
    public function create($createdBy, $class_id, $duration_id, $exam_type_id, $exam_pattern_id, $department_id, $time_id)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO faculty_data (createdAt, updatedAt, createdBy, class_id, duration_id, exam_type_id, exam_pattern_id, department_id, time_id) VALUES (NOW(), NOW(), ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("iiiiiii", $createdBy, $class_id, $duration_id, $exam_type_id, $exam_pattern_id, $department_id, $time_id);
        return $stmt->execute();
    }


    // Read a faculty_data record by ID
    public function read($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM faculty_data WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a faculty_data record by ID
    public function update($id, $createdBy, $class_id, $duration_id, $exam_type_id, $exam_pattern_id, $department_id, $time_id)
    {
        $stmt = $this->mysqli->prepare("UPDATE faculty_data SET createdBy = ?, class_id = ?, duration_id = ?, exam_type_id = ?, exam_pattern_id = ?, department_id = ?, time_id = ? , updatedAt = NOW() WHERE id = ?");
        $stmt->bind_param("iiiiiiii", $createdBy, $class_id, $duration_id, $exam_type_id, $exam_pattern_id, $department_id, $time_id, $id);
        return $stmt->execute();
    }

    // Delete a faculty_data record by ID
    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM faculty_data WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Read all faculty_data records
    public function readAll()
    {
        $result = $this->mysqli->query("SELECT * FROM faculty_data");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function readAllWithJoins()
    {

        $query = "
            SELECT 
                fd.id,
                fd.createdAt,
                fd.updatedAt,
                fd.createdBy,
                c.class_name AS class_name,
                d.duration AS duration_name,
                et.type AS exam_type_name,
                et.rate_per_hour AS rate,
                ep.pattern AS exam_pattern_name,
                dp.dept_name AS department_name,
                t.timing AS time_name,
                (et.rate_per_hour * d.duration) AS remun
                      
            FROM 
                faculty_data fd
            JOIN 
                classes c ON fd.class_id = c.class_id
            JOIN 
                duration d ON fd.duration_id = d.id
            JOIN 
                exam_type et ON fd.exam_type_id = et.id
            JOIN 
                exam_pattern ep ON fd.exam_pattern_id = ep.id
            JOIN 
                department dp ON fd.department_id = dp.dept_id
            JOIN 
                time t ON fd.time_id = t.id
            where 
                fd.createdBy = $_SESSION[userId]
            
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
