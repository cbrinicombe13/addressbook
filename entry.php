<?php
    class Entry {
        public $first_name;
        public $last_name;
        public $phone;
        public $email;

        function __construct($first_name, $last_name, $phone, $email) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->phone = $phone;
            $this->email = $email;
        }
    }
?>