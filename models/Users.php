<?php
namespace Model;

class Users extends ActiveRecord {
    protected static $table = 'users';
    protected static $columnsdb = ['id', 'name', 'mail', 'password', 'role', 'verified'];

    public $id;
    public $name;
    public $mail;
    public $password;
    public $role;
    public $verified;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->mail = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->role = $args['role'] ?? '';
        $this->verified = $args['verified'] ?? '0';
    }

    public function validateNewAcc() {
        if(!$this->name) {
            self::$alerts['error'][] = 'The name cannot be empty';
        }
        if(!$this->mail) {
            self::$alerts['error'][] = 'The E-Mail cannot be empty';
        }
        if(!$this->password) {
            self::$alerts['error'][] = 'We need a password';
        }
        if(strlen($this->password) < 6) {
            self::$alerts['error'][] = 'Sure? Password must be 6 or more characters long';
        }
        return self::$alerts;
    }

    public function validateLogin() {
        if(!$this->mail) {
            self::$alerts['error'][] = 'Login wothout E-Mail?';
        }
        if(!$this->password) {
            self::$alerts['error'][] = 'Why we need a password, right?';
        }
        return self::$alerts;
    }

    public function validateMail() {
        if(!$this->mail) {
            self::$alerts['error'][] = 'You need to enter a mail';
        }
        return self::$alerts;
    }

    public function validatePass() {
        if(!$this->password) {
            self::$alerts['error'][] = 'We need a password';
        }
        if(strlen($this->password) < 6) {
            self::$alerts['error'][] = 'Sure? Password must be 6 or more characters long';
        }
        return self::$alerts;
    }

    public function userExist() {
        $query = "SELECT * FROM " . self::$table . " WHERE mail = '" . $this->mail . "' LIMIT 1";
        $result = self::$db->query($query);
        if($result->num_rows) {
            self::$alerts['error'][] = 'This user is already registered';
        }
        return $result;
    }

    public function hashPass() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function valPassAndVerf($password) {
        $result = password_verify($password, $this->password);
        if(!$result || !$this->verified) {
            self::$alerts['error'][] = 'Your account may not been verifyed yet or your password is not correct';
        }else{
            return true;
        }
    }
}