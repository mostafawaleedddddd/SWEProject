<?php
class Contact {
    private $name;
    private $message;
    private $username;
    private $timestamps;

    public function __construct($name, $message, $username) {
        $this->setName($name);
        $this->setMessage($message);
        $this->setUsername($username);
        $this->timestamps = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }

    public function setName($name) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $name)) {
            $this->name = $name;
        } else {
            throw new Exception("Invalid name format.");
        }
    }

    public function getName() {
        return $this->name;
    }

    public function setMessage($message) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $message)) {
            $this->message = $message;
        } else {
            throw new Exception("Invalid message format.");
        }
    }

    public function getMessage() {
        return $this->message;
    }

    public function setUsername($username) {
        if (preg_match("/^[a-zA-Z0-9]*[@]+[a-z]+[.]+[a-z]{3}$/", $username)) {
            $this->username = $username;
        } else {
            throw new Exception("Invalid username format.");
        }
    }

    public function getUsername() {
        return $this->username;
    }

    public function getTimestamps() {
        return $this->timestamps;
    }

    public function updateTimestamps() {
        $this->timestamps['updated_at'] = date('Y-m-d H:i:s');
    }
}
?>
