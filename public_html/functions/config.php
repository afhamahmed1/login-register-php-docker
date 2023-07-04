<?php
class Database {
    private $pdo;

    public function __construct($host,  $user, $pass, $dbname) {
        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function executeQuery($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($query, $params = []) {
        $stmt = $this->executeQuery($query, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($query, $params = []) {
        $stmt = $this->executeQuery($query, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $this->executeQuery($query, $data);
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data, $where, $params = []) {
        $set = '';
        foreach ($data as $column => $value) {
            $set .= "$column = :$column, ";
        }
        $set = rtrim($set, ', ');
        $query = "UPDATE $table SET $set WHERE $where";
        $params = array_merge($data, $params);
        return $this->executeQuery($query, $params)->rowCount();
    }

    public function delete($table, $where, $params = []) {
        $query = "DELETE FROM $table WHERE $where";
        return $this->executeQuery($query, $params)->rowCount();
    }
}


$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$dbname = "dbtest";

$db = new Database($host, $user, $pass, $dbname);
