<?php
class Forum {
    private $name;
    private $message;
    private $order;
    private $timestamps;

    public function __construct($name, $message, $order) {
        $this->setName($name);
        $this->setMessage($message);
        $this->setOrder($order);
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

    public function setOrder($order) {
        if (is_int($order) && $order > 0) {
            $this->order = $order;
        } else {
            throw new Exception("Order must be a positive integer.");
        }
    }

    public function getOrder() {
        return $this->order;
    }

    public function getTimestamps() {
        return $this->timestamps;
    }

    public function updateTimestamps() {
        $this->timestamps['updated_at'] = date('Y-m-d H:i:s');
    }
}
?>
