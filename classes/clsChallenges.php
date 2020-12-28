<?php

    class Challenges extends Core {

        public function __construct() {
            //Call the databaseconnection
            $this->connection = database::dbConnect();
        }

        public function getListAll() {
            $sql = "SELECT * FROM tb_challenges WHERE status = ? ORDER BY serialnumber";
            $data = array(1);
            return database::getData($sql, $data);
        }
        
        public function getChallengeById($uuid) {
            $sql = "SELECT * FROM tb_students WHERE uuid = ?";
            $data = array($uuid);
            return database::getData($sql, $data);
        }
        
        public function getChallengeByStudentNumber($studentnumber) {
            $sql = "SELECT * FROM tb_students WHERE studentnumber = ?";
            $data = array($studentnumber);
            return database::getData($sql, $data);
        }
        
        public function getDetail($uuid) {
            $sql = "SELECT * FROM tb_challenges WHERE uuid = ?";
            $data = array($uuid);
            return database::getData($sql, $data);
        }

        public function getChallengeContentByChallengeUuid($uuid) {
            $sql = "SELECT c.uuid, s.title, c.assignment, c.description  FROM tb_challengecontent c, tb_schoolsubject s    
                        WHERE c.challenge_uuid = ? AND c.status = ?
                        AND c.schoolsubject_id = s.id
                        AND s.status = ?
                        ORDER BY c.serialnumber";
            $data = array($uuid, 1, 1);
            return database::getData($sql, $data);
        }

        public function delete($uuid) {
            $sql = "UPDATE tb_challenges 
                    SET status = ?
                    WHERE uuid = ?";
            $data = array(9, $uuid);
            database::getData($sql, $data);
        }

        public function update($uuid) {
            foreach($_POST as $key => $value) {
                $$key = $value;
            }

            $sql = "UPDATE tb_challenges 
                    SET 
                    challengenumber = ?,
                    serialnumber = ?,
                    grade = ?,
                    title = ?,
                    description = ?
                    WHERE uuid = ?";
            $data = array($challengenumber, $serialnumber, $grade, $title, $description, $uuid);
            database::getData($sql, $data);
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