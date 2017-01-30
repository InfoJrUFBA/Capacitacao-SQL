<?php
    require_once('../helpers/connect.php');
    class ActivePrinciple extends Connect {

        public $id;
        public $name;
        function __construct($attributes = array()) {
            if (!empty($attributes)) {
                $this->id = array_key_exists('id', $attributes) ? $attributes['id'] : '';
                $this->name = array_key_exists('name', $attributes) ? $attributes['name'] : '';
            }
        }

        public function create() {
            $connect = self::start();
            $stm = $connect->prepare('INSERT INTO `active_principle`(`name`)VALUES(:name)');
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            return $stm->execute();
        }

        public function update() {
            $connect = self::start();
            $stm = $connect->prepare('UPDATE `active_principle` SET name=:name WHERE id=:id');
            $stm->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            return $stm->execute();
        }

        public function delete() {
            $connect = self::start();
            $stm = $connect->prepare('DELETE FROM active_principle WHERE id = :id');
            $stm->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $stm->execute();
        }

        public static function readActivePrinciple($id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT name FROM active_principle WHERE id=:id');
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public static function getActivePrinciple($id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT * FROM active_principle WHERE id=:id');
            $stm->bindValue(':id', $id, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public static function readAllActivePrinciples() {
            $connect = self::start();
            $stm = $connect->prepare('SELECT id, name FROM active_principle');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>