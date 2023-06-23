<?php 
namespace Model;

use PDO;

class ActiveRecord {
    protected static $db;
    protected static $table = '';
    protected static $columnsdb = [];
    protected static $alerts = [];
    
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlert($tipeOf, $msg) {
        static::$alerts[$tipeOf][] = $msg;
    }

    public static function getAlerts() {
        return static::$alerts;
    }

    //Validate
    public function validate() {
        static::$alerts = [];
        return static::$alerts;
    }

    //Sql query to create a memory object
    public static function querySQL($query) {
        $result = self::$db->query($query);
        //iter
        $array = [];
        while($record = $result->fetch_assoc()) {
            $array[] = static::createObject($record);
        }
        //free mem
        $result->free();
        return $array;
    }

    //Create the mem obj
    protected static function createObject($record) {
        $object = new static;
        foreach($record as $key => $value) {
            if(property_exists($object, $key)) {
                $object->$key = $value;
            }
        }
        return $object;
    }

    //unify atribbs from db
    public function attribs() {
        $attribs = [];
        foreach (static::$columnsdb as $column) {
            if($column === 'id') continue;
            $attribs[$column] = $this->$column;
        }
        return $attribs;
    }

    //sanitize before save to db
    public function sanitizeAttr() {
        $attribs = $this->attribs();
        $sanitized = [];
        foreach($attribs as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value ?? '');
        }
        return $sanitized;
    }

    //sinc db with mem obj
    public function sinc($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    //regs - CRUD
    public function save() {
        $result = '';
        if(!is_null($this->id)) {
            $result = $this->actualize();
        }else{
            $result = $this->create();
        }
        return $result;
    }

    public function savePayment() {
        $result = '';
        if(!is_null($this->code)) {
            $result = $this->actualizePayment();
        }
        return $result;
    }

    public function create() {
        $attribs = $this->sanitizeAttr();
        $query = "INSERT INTO " . static::$table . " (";
        $query .= join(', ', array_keys($attribs));
        $query .= ") VALUES (";
        $query .= join(', ', array_fill(0, count($attribs), '?'));
        $query .= ")";
    
        $stmt = self::$db->prepare($query);
        $types = str_repeat('s', count($attribs));
        $values = array_values($attribs);
        $stmt->bind_param($types, ...$values);
        $result = $stmt->execute();
        
        return [
            'result' => $result,
            'id' => self::$db->insert_id
        ];
    }
    

    public function actualize() {
        $attribs = $this->sanitizeAttr();
    
        $set_clause = "";
        $params = array();
        foreach ($attribs as $key => $value) {
            $set_clause .= "{$key}=?, ";
            $params[] = $value;
        }
        $set_clause = rtrim($set_clause, ", ");
    
        $query = "UPDATE " . static::$table ." SET " . $set_clause . " WHERE id = ?";
        $params[] = $this->id;
        $stmt = self::$db->prepare($query);
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $result = $stmt->execute();
    
        return $result;
    }
    

    public function actualizePayment() {
        $attribs = $this->sanitizeAttr();
    
        $set_clause = "";
        $params = array();
        foreach ($attribs as $key => $value) {
            $set_clause .= "{$key}=?, ";
            $params[] = $value;
        }
        $set_clause = rtrim($set_clause, ", ");
    
        $query = "UPDATE " . static::$table ." SET " . $set_clause . " WHERE code = ?";
        $params[] = $this->code;
        $stmt = self::$db->prepare($query);
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $result = $stmt->execute();
    
        return $result;
    }
    

    public function del() {
        $query = "DELETE FROM " . static::$table . " WHERE id = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param('i', $this->id);
        $result = $stmt->execute();
        return $result;
    }
    

    //get all regs
    public static function all() {
        $query = "SELECT * FROM " . static::$table;
        $result = self::querySQL($query);
        return $result;
    }

    //get all safe
    public static function allSafe() {
        $query = "SELECT * FROM " . static::$table . " WHERE id <> 1";
        $result = self::querySQL($query);
        return $result;
    }

    //get rows profiles
    public static function rowsPr($tkn) {
        $query = "SELECT COUNT(*) FROM " . static::$table . " WHERE fixedtoken = '$tkn'";
        $result = self::$db->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }
    

    //get Tool rows
    public static function rowsTool() {
        $query = "SELECT COUNT(*) FROM " . static::$table;
        $result = self::$db->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }

    //get linkers rows
    public static function rowsLinkers($creator) {
        $query = "SELECT COUNT(*) FROM " . static::$table . " WHERE role = 'linker' AND creator = '$creator'";
        $result = self::$db->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }

    //find some reg
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table ." WHERE id = $id";
        $result = self::querySQL($query);
        return array_shift($result);
    }
    public static function flinkers($creator) {
        $query = "SELECT * FROM " . static::$table . " WHERE role = 'linker' AND creator = '$creator'";
        $result = self::querySQL($query);
        return $result;
    }
    public static function mydata($fixedtoken, $linker = null) {
        $query = "SELECT * FROM " . static::$table . " WHERE fixedtoken = '$fixedtoken'";
        if ($linker !== null) {
            $query .= " OR linker = '$fixedtoken'";
        }
        $result = self::querySQL($query);
        return $result;
    }
    public static function apiresult($tkn, $column) {
        $query = "SELECT * FROM " . static::$table . " WHERE fixedtoken = '$tkn' AND $column = 0 LIMIT 1";
        $result = self::querySQL($query);
        return $result;
    }
    public static function where($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value'";
        $result = self::querySQL($query);
        return array_shift($result);
    }
    public static function lastId($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value' ORDER BY id DESC LIMIT 1";
        $result = self::querySQL($query);
        return $result[0] ?? null;
    }
    public static function last() {
        $query = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT 1";
        $result = self::querySQL($query);
        return array_shift($result);
    }
    public static function get($nItems) {
        $query = "SELECT * FROM " . static::$table . " LIMIT $nItems";
        $result = self::querySQL($query);
        return array_shift($result);
    }
}