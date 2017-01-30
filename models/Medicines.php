<?php
    require_once('../helpers/connect.php');
    class Medicine extends Connect {

        public $id;
        public $name;
        public $generic;
        public $active_principle_id;
        function __construct($attributes = array()) {
            if (!empty($attributes)) {
                $this->id = array_key_exists('id', $attributes) ? $attributes['id'] : '';
                $this->name = array_key_exists('name', $attributes) ? $attributes['name'] : '';
                $this->generic = array_key_exists('generic', $attributes) ? $attributes['generic'] : '';
                $this->active_principle_id = array_key_exists('active_principle_id', $attributes) ? $attributes['active_principle_id'] : '';
            }
        }

        public function create() {
            $connect = self::start();
            $stm = $connect->prepare('INSERT INTO `medicines`(`name`, `generic`, `active_principle_id`)VALUES(:name, :generic, :active_principle_id)');
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stm->bindValue(':generic', $this->generic, PDO::PARAM_INT);
            $stm->bindValue(':active_principle_id', $this->active_principle_id, PDO::PARAM_INT);
            return $stm->execute();
        }

        public function update() {
            $connect = self::start();
            $stm = $connect->prepare('UPDATE `medicines` SET name=:name, generic=:generic, active_principle_id=:active_principle_id WHERE id=:id');
            $stm->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stm->bindValue(':generic', $this->generic, PDO::PARAM_INT);
            $stm->bindValue(':active_principle_id', $this->active_principle_id, PDO::PARAM_INT);
            return $stm->execute();
        }

        public function delete() {
            $connect = self::start();
            $stm = $connect->prepare('DELETE FROM medicines WHERE id = :id');
            $stm->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $stm->execute();
        }

        public static function readMedicine($id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT name, generic, active_principle_id FROM medicines WHERE id=:id');
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public static function getMedicine($name) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT * FROM medicines WHERE name=:name');
            $stm->bindValue(':name', $name, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public static function readAllMedicines() {
            $connect = self::start();
            $stm = $connect->prepare('SELECT id, name, generic, active_principle_id FROM medicines');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>