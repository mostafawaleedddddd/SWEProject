<?php
require_once 'Person.php';

class HealthCare extends Person {
    public function __construct($name, $phoneNum, $gender, $dateOfBirth, $username, $password) {
        parent::__construct($name, $phoneNum, $gender, $dateOfBirth, $username, $password);
    }
    public function respondToQuestion( $response) {
        $responseDate = date("Y-m-d H:i:s");
        $query = "
            INSERT INTO Forum ( responder_id, response, response_date)
            VALUES ( '{$this->username}', '$response', '$responseDate')
        ";

        // Simulated execution of the query
        echo "Executing query: $query\n";

        // Assume the query runs successfully
        return "Response saved successfully!";
    }
}
?>
