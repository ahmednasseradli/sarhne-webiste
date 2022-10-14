<?php

    class db {
            // Connecting to databse
        public $dsn        = "mysql:host=localhost;dbname=saraha";
        public $user       = "root";
        public $pass       = "";
        public $con;
        public $options    = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);

        // Trying to connect to database
        public function __construct() {
            try {

                $this->con    = new PDO($this->dsn, $this->user, $this->pass, $this->options);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOEXCEPTION $e) {
                echo "There is an error : " . $e->getMessage();
            }
        }
    }

    
    class UNIQUE_ID extends db {
        
        public $anonymous   = "Anonymous";
        public $str         = "QWERTYUIOPLKJHGFDSAZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        public $arr;
        public $rand_arr;
        public $unique_id    = "";

        // Function to create Unique ID
        public function createUniqueID () {

            $this->arr         = str_split($this->str); // Converting the string to an array
            $this->rand_arr    = array_rand($this->arr, 8); // getting 8 random letters from the array($arr)
            foreach($this->rand_arr as $this->index) { // This loop is to combine the 8 random letters to create the Unique ID

                $this->unique_id .= $this->arr[$this->index];
            }
            return $this->unique_id;
        }

        // Function to add the Unique ID to database if it is not added before
        public function addUniqueIDtoDB() {
           
            # storing uniqueID in session['unique_id']
            if (!isset($_SESSION["unique_id"])) { 
                $_SESSION["unique_id"] = $this->unique_id;
                # Connecting to database to check if the unique id added before or not
                $stmt           = $this->con->prepare("SELECT * FROM users WHERE unique_id = '{$this->unique_id}' LIMIT 1");
                $stmt->execute();
                $row            = $stmt->fetch();
                $count          = $stmt->rowCount();
                if ($count > 0 ) { // if it is added before
                    echo "Unique ID is registered : " . $this->unique_id;
                } else { //if it is not in database [adding the unique id to database]
                    $stmt2      = $this->con->prepare("INSERT INTO users(unique_id, username, name) 
                                                            VALUES(:unique_id, :username, :zname)");
                    $stmt2->execute(array(
                        'unique_id'     => $this->unique_id,
                        'username'      => $this->unique_id,
                        'zname'         => $this->anonymous
                    ));
                }
                
            }
            
        }
    }

    // Creating instance of UniqueID Class
    $unique_ID  = new UNIQUE_ID();

    /////////////////////////
    // User Class
    ////////////////////////
    class USER extends db {

        //getting user details
        public function getUserDetails ($username) {

            $stmt           = $this->con->prepare("SELECT * FROM users WHERE username = '{$username}' LIMIT 1");
            $stmt->execute();
            $rows           = $stmt->fetch();
            return $rows;

        }

        //is user exist or no
        public function isUserExist ($username) {
            $stmt           = $this->con->prepare("SELECT * FROM users WHERE username = '{$username}' LIMIT 1");
            $stmt->execute();
            $count          = $stmt->rowCount();
            return $count;
        }

        // increase user visits 
        public function increaseVisits ($username) {
            if (!isset($_SESSION["visits"])) {
                $visits     = USER::getUserDetails($username)["visits"] + 1;
                $stmt2      = $this->con->prepare("UPDATE users SET visits = '{$visits}' WHERE username = '{$username}'");
                $stmt2->execute();
                $_SESSION["visits"] = $visits;
            }
        }

        // function to validate login inputs
        public function loginValidate ($username, $pass) {
            $username       = filter_var($username, FILTER_SANITIZE_STRING);
            $hashPass       = sha1($pass);
            if (!empty($username) && strlen($username) > 4) {
                $stmt           = $this->con->prepare("SELECT * FROM users WHERE username = '{$username}' AND password = '{$hashPass}' LIMIT 1");
                $stmt->execute();
                $count          = $stmt->rowCount();
                if ($count > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        // Add New User to database 
        public function addNewUser ($name, $email, $hashedpass, $username, $gender, $img) {

            $stmt       = $this->con->prepare("INSERT INTO users (name, email, password, username, user_gender, user_img)
                                            VALUES ('{$name}', '{$email}', '{$hashedpass}', '{$username}', '{$gender}', '{$img}')");
            $stmt->execute();

        }

        // Add Facebook User
        public function addFbUser($username, $name, $email, $img, $gender) {

            $stmt       = $this->con->prepare("INSERT INTO fb_users(username, name, email, img, gender) VALUES ('{$username}','{$name}', '{$email}', '{$img}', '{$gender}')");
            $stmt->execute();
        }

        // Function too get user gender
        public function getGender ($username, $value) {

            $gender     = USER::getUserDetails($username)["user_gender"];
            if ($gender == $value) {
                return "selected";
            }
        }

        // Function to update user profile settings
        public function updateProfile ($username, $name, $email, $gender, $about) {

            $stmt       = $this->con->prepare("UPDATE users SET name = ?, email = ?, user_gender = ?, user_about = ?  WHERE username = '{$username}'");
            $params     = array ( $name, $email, $gender, $about);
            $stmt->execute($params);
        }

        // Function to Update User Image
        public function updateImage($username) {
            $userImg   = $username. ".jpg";
            $stmt       = $this->con->prepare("UPDATE users SET user_img = '{$userImg}' WHERE username = '{$username}'");
            $stmt->execute();
        }

        // Function to Update User Password
        public function updatePass($username, $pass) {
            $hashedpass       = sha1($pass);
            $stmt       = $this->con->prepare("UPDATE users SET `password` = '{$hashedpass}' WHERE username = '{$username}'");
            $stmt->execute();
        }

        // Function to set user social links
        public function setSocialLinks($username) {

            $userID = USER::getUserDetails($username)['id'];
            $stmt   = $this->con->prepare("INSERT INTO user_links(user_id) VALUES('{$userID}')");
            $stmt->execute();
        }
        // Function to get user social links
        public function getSocialLinks($username) {

            $userID = USER::getUserDetails($username)['id'];
            $stmt   = $this->con->prepare("SELECT * FROM user_links WHERE user_id = '{$userID}' LIMIT 1");
            $stmt->execute();
            $rows   = $stmt->fetch();
            return $rows;
        }
        
        // Function to update user social links
        public function updateSocialLinks($username, $facebook, $instagram, $twitter, $snapchat, $youtube, $whatsapp, $tiktok, $gmail) {
            
            $userID = USER::getUserDetails($username)['id'];
            $stmt   = $this->con->prepare("UPDATE user_links SET facebook = ?, instagram = ?, twitter = ?, snapchat = ?, youtube = ?, whatsapp = ?, tiktok = ?, gmail = ?WHERE user_id = '{$userID}'");
            $params = array ($facebook, $instagram, $twitter, $snapchat, $youtube, $whatsapp, $tiktok, $gmail);
            $stmt->execute($params);
        }
            
    }

    // Instance of USER
    $user       = new USER();

    ///////////////////////////////////////////////////////////////
    // Class to get message from database depending on its username
    ///////////////////////////////////////////////////////////////
    class MESSAGES extends db {

        public function sendMessage($message, $sender, $receiver) {

            $user           = new USER();
            $user_id        = $user->getUserDetails($receiver)['id']; // Getting Receiver user id
            // adding the message to databse
            $stmt   = $this->con->prepare("INSERT INTO messages (message, date, sender_unique_id, receiver_username, msg_user_id)
                                            VALUES (:zmessage, :ztime, :zsender, :zreceiver, :msg_user_id)");
            $params = array(
                "zmessage"      => $message,
                "ztime"         => date("Y-m-d h:i:sa"),
                "zsender"       => $sender,
                "zreceiver"     => $receiver,
                "msg_user_id"   => $user_id
            );
            $stmt->execute($params);
        }

        // Get Messages Number
        public function countMessages ($username) {
            $stmt       = $this->con->prepare("SELECT * FROM messages WHERE receiver_username = '{$username}'");
            $stmt->execute();
            $rows       = $stmt->fetchAll();
            $count      = $stmt->rowCount();
            return $count;
        }

        // Function to get received messages
        public function getMessages ($username) {
            $stmt       = $this->con->prepare("SELECT * FROM messages WHERE receiver_username = '{$username}' ORDER BY date DESC");
            $stmt->execute();
            $rows       = $stmt->fetchAll();
            return $rows;

        }

        // Function to get public messages of the user
        public function getPublicMessages ($username) {

            $stmt   = $this->con->prepare("SELECT * FROM messages WHERE receiver_username = '{$username}' AND msg_public = 1 ORDER BY `date` DESC");
            $stmt->execute();
            $rows   = $stmt->fetchAll();
            return $rows;

        }

        // Making a message public
        public function showMsg($username, $userID, $msgID) {

            $stmt   = $this->con->prepare("UPDATE messages SET msg_public = 1 WHERE msg_id = '{$msgID}' AND receiver_username = '{$username}' AND msg_user_id = '{$userID}'");
            $stmt->execute();
        }

        // Making a message public
        public function hideMsg($username, $userID, $msgID) {

            $stmt   = $this->con->prepare("UPDATE messages SET msg_public = 0 WHERE msg_id = '{$msgID}' AND receiver_username = '{$username}' AND msg_user_id = '{$userID}'");
            $stmt->execute();
        }
        // Delete a message
        public function deleteMsg($username, $userID, $msgID) {

            $stmt   = $this->con->prepare("DELETE FROM messages WHERE msg_id = :msgID AND receiver_username = '{$username}' AND msg_user_id = '{$userID}'");
            $stmt->bindParam(":msgID", $msgID);
            $stmt->execute();
        }
    }

// Instance of getMessages Class
$messages    = new MESSAGES ();


