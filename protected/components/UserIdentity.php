<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    
    private $_id;
    
        
    /**
     * Extracted from Larry Ullman; The Yii Book 2013
     * 
     * Checks the username and password to match database for user_email and user_password
     * @return type
     */
        public function authenticate()
        {            
            //understand that user_email === username
            $user = User::model()->findByAttributes(array('user_email'=>$this->username));
            if($user === null) {
                //No user found in cvgen_user!
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            } else if(!$user->validatePassword($this->password)) {
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
            } else { //okay!
                $this->errorCode=self::ERROR_NONE;
                $this->_id = $user->user_id;
            }
            return $this->errorCode==self::ERROR_NONE;
        }
        
        public function getId()
        {
            return $this->_id;
        }
}