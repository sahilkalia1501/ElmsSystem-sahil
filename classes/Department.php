<?php

namespace Azhar\ELMS;

class Department
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function update($name, $encoded)
    {
        $id = base64_decode($encoded);

        $sql = "UPDATE departments SET name = '$name' WHERE id = '$id'";
    
        $this->conn->query($sql);
    }

    public function delete($encoded)
    {
        $id = base64_decode($encoded);

        $sql = "DELETE FROM departments WHERE id = '$id'";

        $this->conn->query($sql);
    }

    public function showList()
    {
        $sql = "SELECT * FROM departments";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function isExists($dept_name)
    {
        $existsql = "SELECT * FROM departments WHERE name = '$dept_name'";

        $result = mysqli_query($this->conn, $existsql);

        return mysqli_num_rows($result);
    }

    public function create($dept_name)
    {
        $query = "INSERT INTO  departments (name) VALUES (?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('s', $dept_name);

        $stmt->execute();

        $stmt->close();
    }
}

?>