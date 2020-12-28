<?php

    class Student {
        public function __construct() {
            //Call the databaseconnection
			$this->connection = database::dbConnect();
			//print_r($this->connection);
        }

        public function getListAll() {
            $sql = "SELECT * FROM tb_students";
            return database::getData($sql);
        }
        
        public function getStudentById($uuid) {
            $sql = "SELECT * FROM tb_students WHERE uuid = ?";
            $data = array($uuid);
            return database::getData($sql, $data);
        }
        
        public function getStudentByStudentNumber($studentnumber) {
            $sql = "SELECT * FROM tb_students WHERE studentnumber = ?";
            $data = array($studentnumber);
            return database::getData($sql, $data);
		}

    }