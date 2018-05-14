<?php
require 'Database.php';

class TodosGateway extends Database
{

    public function selectAll($order)
    {
        if (!isset($order)) {
            $order = 'work_name';
        }
        $pdo = Database::connect($order);
        $sql = $pdo->prepare("SELECT * FROM todos ORDER BY $order ASC");
        $sql->execute();
        // $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        $todos = array();
        while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
            $todos[] = $obj;
        }
        return $todos;
    }

    public function selectById($id)
    {
        $pdo = Database::connect();
        $sql = $pdo->prepare("SELECT * FROM todos WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function insert($work_name, $start_date, $end_date, $status)
    {

        $pdo = Database::connect();
        $sql = $pdo->prepare("INSERT INTO todos (work_name, start_date, end_date, status) VALUES( ?, ?, ?, ?)");
        $result = $sql->execute(array($work_name, $start_date, $end_date, $status));
    }

    public function edit($work_name, $start_date, $end_date, $id, $status)
    {
        $pdo = Database::connect();
        $sql = $pdo->prepare("UPDATE todos SET work_name = ?, start_date = ?, end_date = ?, status = ? WHERE id = ? LIMIT 1");
        $result = $sql->execute(array($work_name, $start_date, $end_date, $status, $id));
    }

    public function delete($id)
    {
        $pdo = Database::connect();
        $sql = $pdo->prepare("DELETE FROM todos WHERE id =?");
        $sql->execute(array($id));
    }

}

?>
