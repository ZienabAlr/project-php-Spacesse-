<?php
    class User{
        
        /*private $firstname;
        private $lastname;
        private $email;
        private $password;*/

        protected $firstname;
        protected $lastname;
        protected $email;
        protected $password;


        /**
         * Get the value of id
         */ 
        /*public function getId()
class User
{
        private $id; //wat is id ? 
        private $email;
        private $firstname;
        private $lastname;
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
        /*public function setId($id)
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        /**
         * Get the value of firstname
         */
        public function getFirstname()
        {
                return $this->firstname;
        }

        /**
         * Set the value of firstname
         *
         * @return  self
         */
        public function setFirstname($firstname)
        {
                if (empty($firstname)) {
                        throw new Exception("Firstname cannot be empty.");
                }
                $this->firstname = $firstname;
                return $this;
        }




        /**
         * Get the value of lastname
         */
        public function getLastname()
        {
                return $this->lastname;
        }

        /**
         * Set the value of lastname
         *
         * @return  self
         */
        public function setLastname($lastname)
        {
                if (empty($lastname)) {
                        throw new Exception("Lastname cannot be empty.");
                }
                $this->lastname = $lastname;
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
                if (empty($email)) {
                        throw new Exception("Email cannot be empty.");
                }
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
                if (empty($password)) {
                        throw new Exception("Password cannot be empty.");
                }
                $this->password = $password;
                return $this;
        }
}



    /*function canLogin($email, $password)
    {
function canLogin($email, $password)
{
        //db connectie
        $conn = Db::getConnection();

        //email zoeken in db
        $statement = $conn->prepare('select * from users where email = :email');
        $statement->bindParam(':email', $email); // wat is bindParam
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
    }*/

?>

