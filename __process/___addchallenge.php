<?php
    class Process extends Core {
        public function __construct() {
            $this->connection = database::dbConnect();
        }

        public function insert() {
            foreach($_POST as $key => $value) {
                $$key = $value;
            }
            $uuid = $this->createUuid();
            $sql = "INSERT INTO tb_challenges 
                (uuid, challengenumber, serialnumber, grade, title, description) 
                VALUES (?,?,?,?,?,?)";
            $data = array($uuid, $challengenumber, $serialnumber, $grade, $title, $description);
            database::getData($sql, $data);
            return;
        }
    }