<?php
namespace Model;

class QueryBuilder extends Connexion
{
    public function select($data, $table1, $joinFactor = null, $table2 = null, $where = null, $orderBy = null) {
        $query = 'SELECT ' . $data . ' FROM ' . $table1;
        $query .= !empty($joinFactor) && !empty($table2) ? ' INNER JOIN ' . $table2 . ' ON ' . $table1 . '.' . $joinFactor . ' = ' . $table2 . '.' . $joinFactor : '';
        $query .= !empty($where) ? ' WHERE ' . $where : '';
        $query .= !empty($orderBy) ? ' ORDER BY ' . $orderBy : '';

        $response = parent::getConnexion()->prepare($query);
        $response->execute();
        $data = $response->fetchAll();

        return $data;
    }

    public function update($table, $column, $data, $whereParam, $whereValue) {
        $prepare = parent::getConnexion()->prepare('UPDATE ' . $table . ' SET ' . $column . ' = "' . $data . '" WHERE ' . $whereParam . ' = ' . $whereValue);
        $prepare->execute();
    }

    public function delete($table, $whereParam, $whereValue) {
        $prepare = parent::getConnexion()->prepare('DELETE FROM ' . $table . ' WHERE ' . $whereParam . ' = ' . $whereValue);
        $prepare->execute();

    }

    public function count($table) {
        $query = 'SELECT COUNT(*) FROM ' . $table;

        $response = parent::getConnexion()->prepare($query);
        $response->execute();
        $data = $response->fetchAll();

        return $data;
    }

    public function exist($table, $where) {
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $where;

        $response = parent::getConnexion()->prepare($query);
        $response->execute();
        $data = $response->fetchAll();

        return $data;
    }
}