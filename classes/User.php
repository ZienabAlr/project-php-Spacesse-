<?php

class User
{

        protected $username;
        protected $email;
        protected $password;
        protected $expire;
        protected $token; 
        protected $newPassword; 
        protected $confirmPassword;


        public function setUsername($username)
        {
                if (empty($username)) {
                        throw new Exception("username cannot be empty.");
                        // in de klasse mocht er nooit een echo geschreven
                }
                $this->$username = $username;
                return $this; //??
        }

        public function getUsername()
        {
                return $this->username;
        }


        /**
         * Get the value of lastname
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of lastname
         *
         * @return  self //???
         */
        public function setEmail($email)
        {
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

        public function setExpire($expire) {

                $this->expire = $expire;
                return $this;
        }
    
        public function getExpire(){
                return $this->expire;
        }

        public function setToken($token) {

                $this->token = $token;
                return $this;
        }

        public function getToken(){
                return $this->token;
        }

        public function setNewPassword($newPassword) {

                $this->newPassword = $newPassword;
                return $this;
        }

        public function getNewPassword(){
                return $this->newPassword;
        }

        public function setConfPassword($confirmPassword) {

                $this->confirmPassword = $confirmPassword;
                return $this;
        }

        public function getConfPassword(){
                return $this->confirmPassword;
        }
}
