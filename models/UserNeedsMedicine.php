<?php
    require_once('../helpers/connect.php');
    class UserNeedsMedicine extends Connect {

        public $users_id;
        public $medicines_id;
        function __construct($attributes = array()) {
            if (!empty($attributes)) {
                $this->users_id = array_key_exists('users_id', $attributes) ? $attributes['users_id'] : '';
                $this->medicines_id = array_key_exists('medicines_id', $attributes) ? $attributes['medicines_id'] : '';
            }
        }

        public function create() {
            $connect = self::start();
            $stm = $connect->prepare('INSERT INTO `user_needs_medicine`(`users_id`, `medicines_id`)VALUES(:users_id, :medicines_id)');
            $stm->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
            $stm->bindValue(':medicines_id', $this->medicines_id, PDO::PARAM_INT);
            return $stm->execute();
        }

        public function delete() {
            $connect = self::start();
            $stm = $connect->prepare('DELETE FROM user_needs_medicine WHERE users_id = :users_id AND medicines_id = :medicines_id');
            $stm->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
            $stm->bindValue(':medicines_id', $this->medicines_id, PDO::PARAM_INT);
            return $stm->execute();
        }

        public static function readUserMedicines($users_id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT * FROM user_needs_medicine WHERE users_id=:users_id');
            $stm->bindValue(':users_id', $users_id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public static function getUserMedicines($users_id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT * FROM user_needs_medicine WHERE users_id=:users_id');
            $stm->bindValue(':users_id', $users_id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function fetchUserMedicines($users_id) {
            $connect = self::start();
            $stm = $connect->prepare('SELECT medicines.id, medicines.name, medicines.generic, medicines.active_principle_id FROM medicines INNER JOIN user_needs_medicine ON user_needs_medicine.medicines_id = medicines.id AND user_needs_medicine.users_id = :users_id');
            $stm->bindValue(':users_id', $users_id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>