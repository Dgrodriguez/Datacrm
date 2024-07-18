<?php

class Cliente {
    public $id;
    public $contact_no;
    public $lastname;
    public $createdtime;

    public function __construct(array $data) {
        $this->id = isset($data['id']) ? $data['id'] : '';
        $this->contact_no = isset($data['contact_no']) ? $data['contact_no'] : '';
        $this->lastname = isset($data['lastname']) ? $data['lastname'] : '';
        $this->createdtime = isset($data['createdtime']) ? $data['createdtime'] : '';
    }
}

?>
