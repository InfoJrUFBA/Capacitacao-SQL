<?php
    require_once('../helpers/connect.php');
    class User extends Connect {

        public $id;
        public $name;
        public $email;
        public $age;
        public $insurance;
        function __construct($attributes = array()) {
            if (!empty($attributes)) {
                $this->id = array_key_exists('id', $attributes) ? $attributes['id'] : '';
                $this->name = array_key_exists('name', $attributes) ? $attributes['name'] : '';
                $this->email = array_key_exists('email', $attributes) ? $attributes['email'] : '';
                $this->age = array_key_exists('age', $attributes) ? $attributes['age'] : '';
                $this->insurance = array_key_exists('insurance', $attributes) ? $attributes['insurance'] : '';
            }
        }

        public function create() {
            $connect = self::start();
            $stm = $connect->prepare('');
            return $stm->execute();
        }

        public function update() {
            $connect = self::start();
            $stm = $connect->prepare('');
            return $stm->execute();
        }

        public function delete() {
            $connect = self::start();
            $stm = $connect->prepare('');
            return $stm->execute();
        }

        public static function readUser($id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT id, name, email, age, insurance FROM users WHERE id=:id');
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public static function getUser($email) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT * FROM users WHERE email=:email');
            $stm->bindValue(':email', $email, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public static function readAllUsers() {
            $connect = self::start();
            $stm = $connect->prepare('');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public static function countMedicinesUsedBy($users_id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT COUNT(users_id) AS medicinesFromID FROM user_needs_medicine WHERE users_id=:users_id');
            $stm->bindValue(':users_id', $users_id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }
    }
?>