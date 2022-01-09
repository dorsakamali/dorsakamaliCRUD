<?php

namespace CRUD\Helper;

class DBConnector
{

    /** @var mixed $db */
    
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $db;
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;
        $this->dbname=$dbname;
        
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {

        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        // Create connection
        $this->db = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQueryForInsert(string $query) : bool
    {
        if ($this->db->query($query) === TRUE) {
            echo "New record Inserted successfully";

            return true;
        } else{
        echo "Error: " . $query . "<br>" . $this->db->error;
        $this->db->close();

        return false;
    }
}
public function execQueryForFecth(string $query)
{

    return $this->db->query($query);

}

public function execQueryForUpdate(string $query)
{

    if ($this->db->query($query) === TRUE) {
        echo "Record Updated successfully";

        return true;
    } else{
    echo "Error updating record: " . $query . "<br>" . $this->db->error;
    $this->db->close();

    return false;
    }
}

public function execQueryForDelete(string $query)
{

    if ($this->db->query($query) === TRUE) {
        echo "Record deleted successfully";

        return true;
    } else{
    echo "Error deleting record: " . $query . "<br>" . $this->db->error;
    $this->db->close();

    return false;
    }
}


    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
        echo "Error" . $message;
    }
}