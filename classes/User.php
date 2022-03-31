<?php
class User
{
        private $id; //wat is id ????
        private $username;
        private $email;
        private $password;

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        /**
         * Get the value of username
         */
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */
        public function setUsername($username)
        {
                /*if (empty($username)) {
                        throw new Exception("Firstname cannot be empty.");
                }*/
                $this->username = $username;
                return $this;
        }



        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */
        public function setEmail($email)
        {
                /* if (empty($email)) {
                        throw new Exception("Email cannot be empty.");
                }*/
                $this->email = $email;
                return $this;
        }


        /**
         * Get the value of password
         */
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */
        public function setPassword($password)
        {
                /* if (empty($password)) {
                        throw new Exception("Password cannot be empty.");
                }*/
                $this->password = $password;
                return $this;
        }
}



function canLogin($email, $password)
{
        //db connectie
        $conn = Db::getConnection();

        //email zoeken in db
        $statement = $conn->prepare('select * from users where email = :email');
        $statement->bindParam(':email', $email); // wat is bindParam???
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        //passwoorden komen overeen?
        if (password_verify($password, $user['password'])) {
                //ja -> naar index
                //echo "joepie de poepie!!!!";
                return $user;
        } else {
                //nee -> error
                //echo "jammer joh";
                return false;
        }
}

function doLogin($user)
{
        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        // var_dump($user);
        header('location: homepage.php');
}
