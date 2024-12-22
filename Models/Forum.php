<?php

require_once '../db/dp.php';  // Assuming DBh.php is the database connection class

class Forum {
    private $db;
    private $id;
    private $parent_comment;
    private $patient;
    private $post;

    // Constructor for Forum class
    public function __construct($parent_comment, $patient, $post)
    {
        $this->db = new DBh(); // Create a new DB connection

        // Set the parent_comment to NULL if it's 0 (indicating it's a new discussion)
        if ($parent_comment == 0) {
            $parent_comment = NULL; // Set to NULL for main discussions
        }

        // Set the instance variables
        $this->parent_comment = $parent_comment;
        $this->patient = $patient;
        $this->post = $post;

        // Insert discussion or reply based on parent_comment
        if ($this->parent_comment === NULL) {
            $this->insertDiscussion(); // Main discussion (no parent comment)
        } else {
            $this->insertReply(); // Reply to an existing discussion
        }
    }

    // Insert a new discussion (main post)
    private function insertDiscussion()
    {
        // SQL query to insert the main discussion
        $sql = "INSERT INTO forums (patient, post, parent_comment) VALUES (?, ?, ?)";
        $stmt = $this->db->getConn()->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error preparing SQL statement: " . $this->db->getConn()->error);
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("sss", $this->patient, $this->post, $this->parent_comment);

        if (!$stmt->execute()) {
            throw new Exception("Error inserting discussion: " . $stmt->error);
        }

        $stmt->close();
    }

    // Insert a reply to an existing discussion
    private function insertReply()
    {
        // SQL query to insert a reply
        $sql = "INSERT INTO forums (patient, post, parent_comment) VALUES (?, ?, ?)";
        $stmt = $this->db->getConn()->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error preparing SQL statement: " . $this->db->getConn()->error);
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssi", $this->patient, $this->post, $this->parent_comment);

        if (!$stmt->execute()) {
            throw new Exception("Error inserting reply: " . $stmt->error);
        }

        $stmt->close();
    }

    // Get all discussions and replies from the database
    public static function getAllInstances()
    {
        $db = new DBh();
        $sql = "SELECT * FROM forums ORDER BY id DESC"; // Retrieve discussions and replies
        $result = $db->getConn()->query($sql);

        if (!$result) {
            throw new Exception("Error fetching discussions: " . $db->getConn()->error);
        }

        $discussions = [];
        while ($row = $result->fetch_assoc()) {
            $discussions[] = $row;
        }

        return $discussions;
    }
}
?>
