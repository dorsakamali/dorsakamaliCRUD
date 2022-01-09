<?php

namespace CRUD\Helper;
use CRUD\Helper\DBConnector;
class PersonHelper
{
    public function insert()
    {
        $db = new DBConnector("localhost", "username", "", "myDB");
        $db->connect();


        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "INSERT INTO person (firstName, lastName, username)
         VALUES ('$firstName','$lastName', '$username')";
        $this->db->execQueryForInsert($sql);

        // if ($this->db->execQuery("INSERT INTO Persons (id, firstName, lastName,username) VALUES ($person->getId(), $person->getFirstName(), $person->getLastName(), $person->getUsername())")) {
        //     return true;
        // }
        // return false;
    }

    public function fetch(int $id)
    {

        $sql = "SELECT id, firstName, lastName, username 
        FROM person
        WHERE id ='$id'";


        $result = $this->db->execQueryForFecth($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 results";
        }  
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM person";


        $result = $this->db->execQueryForFecth($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 results";
        }  

    }

    public function update()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "UPDATE person SET firstName ='$firstName', lastName ='$lastName' WHERE username ='$username'";
        $this->db->execQueryForUpdate($sql);

    }

    public function delete()
    {
        $id = $_POST['id'];
        $sql = "DELETE person WHERE id ='$id'";
        $this->db->execQueryForDelete($sql);
    }
}