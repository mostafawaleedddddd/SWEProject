<?php
class Medical {
    private $organ;
    private $urgency;
    private $specialist;
    private $advice;
    private $symptoms;
    private $timestamps;

    public function __construct($organ, $urgency, $specialist, $advice, $symptoms = []) {
        $this->setOrgan($organ);
        $this->setUrgency($urgency);
        $this->setSpecialist($specialist);
        $this->setAdvice($advice);
        $this->setSymptoms($symptoms);
        $this->timestamps = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }

    public function setOrgan($organ) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $organ)) {
            $this->organ = $organ;
        } else {
            throw new Exception("Invalid organ format.");
        }
    }

    public function getOrgan() {
        return $this->organ;
    }

    public function setUrgency($urgency) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $urgency)) {
            $this->urgency = $urgency;
        } else {
            throw new Exception("Invalid urgency format.");
        }
    }

    public function getUrgency() {
        return $this->urgency;
    }

    public function setSpecialist($specialist) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $specialist)) {
            $this->specialist = $specialist;
        } else {
            throw new Exception("Invalid specialist format.");
        }
    }

    public function getSpecialist() {
        return $this->specialist;
    }

    public function setAdvice($advice) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $advice)) {
            $this->advice = $advice;
        } else {
            throw new Exception("Invalid advice format.");
        }
    }

    public function getAdvice() {
        return $this->advice;
    }

    public function setSymptoms($symptoms) {
        if (is_array($symptoms)) {
            $this->symptoms = $symptoms;
        } else {
            throw new Exception("Symptoms must be an array.");
        }
    }

    public function getSymptoms() {
        return $this->symptoms;
    }

    public function getTimestamps() {
        return $this->timestamps;
    }

    public function updateTimestamps() {
        $this->timestamps['updated_at'] = date('Y-m-d H:i:s');
    }
}
?>
