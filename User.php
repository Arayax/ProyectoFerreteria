<?php


class Users extends Entity
{
    
    protected $account;

    
    public function __construct($request = []) {
        parent::__construct($request);
        $this->isAnonymous();
    }

   
    protected function init(): void {
       

        $query = <<<SQL
CREATE TABLE IF NOT EXISTS users (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(225) NOT NULL,
password VARCHAR(225) NOT NULL
)
SQL;
        
        if(!$this->database->query($query)) {
            throw new \Exception($this->database->error);
        }
    }

    
    public function login(): bool {
        $password = md5($this->request['password']);
        $query = sprintf("SELECT id FROM users WHERE username = '%s' AND password = '%s'",
            $this->request['username'],
            $password
        );

        $result = $this->database->query($query);
        if(1 == $result->num_rows) {
            $account = $result->fetch_object();
            $account->username = $this->request['username'];
            $_SESSION['account'] = $account;

            return TRUE;
        }
        return FALSE;
    }

   
    public function isAnonymous(): bool {
       
        if(!is_null($this->account)) {
            return FALSE;
        }

        if(!empty($_SESSION['account'])) {
            $this->account = $_SESSION['account'];
            return FALSE;
        }
        return TRUE;
    }

   
    public function logout(): void {
        unset($_SESSION['account']);
    }

   
    public function getUsername(): string {
        return $this->account->username;
    }
}