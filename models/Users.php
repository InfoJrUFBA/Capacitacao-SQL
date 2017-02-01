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
            $stm = $connect->prepare('INSERT INTO `users`(`name`, `email`, `age`, `insurance`)VALUES(:name, :email, :age, :insurance)');
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':age', $this->age, PDO::PARAM_INT);
            $stm->bindValue(':insurance', $this->insurance, PDO::PARAM_INT);
            return $stm->execute();
        }

        public function update() {
            $connect = self::start();
            $stm = $connect->prepare('UPDATE `users` SET name=:name, email=:email, age=:age, insurance=:insurance WHERE id=:id');
            $stm->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':age', $this->age, PDO::PARAM_INT);
            $stm->bindValue(':insurance', $this->insurance, PDO::PARAM_INT);
            return $stm->execute();
        }

        public function delete() {
            $connect = self::start();
            $stm = $connect->prepare('DELETE FROM users WHERE id = :id');
            $stm->bindValue(':id', $this->id, PDO::PARAM_INT);
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
            $stm = $connect->prepare('SELECT id, name, email, age, insurance FROM users');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>