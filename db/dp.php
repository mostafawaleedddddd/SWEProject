<?php

require_once("config.php");

class DBh {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {
        $this->servername = DB_SERVER;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->dbname = DB_DATABASE;
        $this->initializeDatabase(); // Ensure the database is set up
        $this->connect();           // Connect to the database
    }

    // Connect to the database
    private function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Create database if it doesn't exist
    private function initializeDatabase() {
        $tempConn = new mysqli($this->servername, $this->username, $this->password);
        if ($tempConn->connect_error) {
            die("Connection failed: " . $tempConn->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
        if ($tempConn->query($sql) === TRUE) {
            echo "Database initialized successfully.<br>";
        } else {
            die("Error initializing database: " . $tempConn->error);
        }
        $tempConn->close();
    }

    // Get the connection
    public function getConn() {
        return $this->conn;
    }

    // Execute a query
    public function query($sql) {
        if (!empty($sql)) {
            return $this->conn->query($sql);
        }
        return false;
    }

    // Fetch a single row
    public function fetchRow($result = "") {
        if (empty($result)) { 
            $result = $this->result; 
        }
        return $result->fetch_assoc();
    }

    // Close connection
    public function __destruct() {
        $this->conn->close();
    }
}
?>
