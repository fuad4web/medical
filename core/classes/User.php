<?php 
    class User {
        protected $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function checkInput($var) {
            $var = htmlspecialchars($var);
            $var = trim($var);
            $var = stripcslashes($var);
            return $var;
        }

        public function login($email, $password) {
            $stmt = $this->pdo->prepare("SELECT `id` FROM `users` WHERE `email` = :email AND `password` = :passwords AND `paid` = 1");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", $password, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();

           if($count > 0) {
                $_SESSION['id'] = $user->id;
                header('Location: dashboard/dashboard.php');
            } else {
                return false;
            }
        }
        
        public function selectMessagesSession($user_id, $padi_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `messages` WHERE (`fromuser` = :id AND `touser` = :p_id OR `touser` = :p_id AND `fromuser = :id`)");
            $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
            $stmt->bindParam(":p_id", $_SESSION[$padi_id], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function logout() {
            $_SESSION = array();
            session_destroy();
            header('Location: '.BASE_URL.'dashboard/login');
        }

        public function checkMail($email) {
            $stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }

        
        public function uploadImage($file) {
            $filename = basename($file['name']);
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $folderName = 'profileImage/';
            $newName = mt_rand(1111, 9999).mt_rand(1111, 9999).".png";
            $joinFile = $folderName.$newName;
            $myTime = date("D j F, Y; h:i a");
            $array_allow = array('jpg', 'png', 'jpeg', 'bmp');
            $file_ext = strtolower(pathinfo($filename)['extension']);

            if($fileSize > 3485760) {
                return false;
            } elseif(!in_array($file_ext, $array_allow)) {
                return false;
            } else {
                if(move_uploaded_file($fileTmp, $joinFile)) {
                    return $newName;
                }
            }
        }

        public function query($stmt) {
            $stmt = $this->pdo->prepare ($stmt);
            $stmt->execute();
            return $stmt;
        }

        public function userData($user_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `id` = :id");
            $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function myPadi($padi_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `id` = :id");
            $stmt->bindParam(":id", $padi_id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function koyemi() {
            $stmt = $this->pdo->prepare("SELECT * FROM `users`");
            $jude = $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['userId'] = $jude["id"];
        }
        
        public function selectMessages($user_id, $padi_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `messages` WHERE (`fromuser` = :id AND `touser` = :p_id) OR (`fromuser` = :p_id AND `touser` = :id) order by id desc");
            $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
            $stmt->bindParam(":p_id", $padi_id, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function listDoctor() {
            $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `account_type` = 'doctor'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function listPatient() {
            $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `account_type` = 'patient'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function patientComplaints($user_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM complaints AS a INNER JOIN users AS b ON a.user_id = b.id WHERE `account_type` = 'patient' AND `user_id` = :user_ids ORDER BY a.c_id DESC");
            $stmt->bindParam(":user_ids", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function patientComplaintsDoc() {
            $stmt = $this->pdo->prepare("SELECT * FROM `complaints` AS a INNER JOIN users AS b ON a.user_id = b.id WHERE `account_type` = 'patient' AND `replied` = 0 ORDER BY a.c_id DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function deleteIllness($illness_id) {
            $stmt = $this->pdo->prepare("DELETE FROM `illnesses` WHERE `id` = :ill_id");
            $stmt->bindParam(":ill_id", $illness_id, PDO::PARAM_STR);
            $stmt->execute();
        }
        
        public function deletespeccialty($specialid) {
            $stmt = $this->pdo->prepare("DELETE FROM `specialties` WHERE `id` = :ill_id");
            $stmt->bindParam(":ill_id", $specialid, PDO::PARAM_STR);
            $stmt->execute();
        }
        
        public function deleteSomeone($id) {
            $stmt = $this->pdo->prepare("DELETE FROM `users` WHERE `id` = :ill_id");
            $stmt->bindParam(":ill_id", $id, PDO::PARAM_STR);
            $stmt->execute();
        }
        
        public function listIllness() {
            $stmt = $this->pdo->prepare("SELECT * FROM `illnesses`");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function listSpecialty() {
            $stmt = $this->pdo->prepare("SELECT * FROM `specialties`");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function treatment() {
            $stmt = $this->pdo->prepare("SELECT * FROM `treatment`");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectTreatment($illness) {
            $stmt = $this->pdo->prepare("SELECT treatment FROM `illnesses` WHERE `id` = :illness");
            $stmt->bindParam(":illness", $illness, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function sendMessage($fromUser, $toUser, $message) {
            if($this->create('messages', [
                'fromuser' =>   $fromUser,
                'touser' =>   $toUser,
                'message' =>   $message,
            ])) return true;

            return false;
        }

        public function create($table, $fields = array()) {
            // remove the , from the key values in the fields(i.e the values input into databse)
            $columns = implode(',', array_keys($fields));
            $values = ':'.implode(', :', array_keys($fields));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $data) {
                    $stmt->bindValue(`:`.$key, $data);
                }
                $stmt->execute();
                return $this->pdo->lastInsertId();
            }
        }

        public function updateIllness($table, $ill, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `illness_name` = {$ill}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                $stmt -> execute();
            }
        }

        public function update($table, $id, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `id` = {$id}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        public function updateEmailTrans($table, $email, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `email` = {$email}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        public function checkNumber($contact) {
            $stmt = $this->pdo->prepare("SELECT `contact` FROM `users` WHERE `contact` = :contact");
            $stmt->bindParam(":contact", $contact, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function checkIllness($illness) {
            $stmt = $this->pdo->prepare("SELECT `illness_name` FROM `illnesses` WHERE `illness_name` = :illness");
            $stmt->bindParam(":illness", $illness, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }
        
        public function checkspecial($special) {
            $stmt = $this->pdo->prepare("SELECT `specialty` FROM `specialties` WHERE `specialty` = :illness");
            $stmt->bindParam(":illness", $special, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function loggedIn() {
            return (isset($_SESSION['id'])) ? true : false;
        }
    }
?>
