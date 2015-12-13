<?php
namespace Model;

class QueryBuilder extends Connexion
{
    protected static $query;
    protected static $queryType;
    protected static $prepare;

    public function select($data, $table1, $joinFactor = null, $table2 = null, $where = null, $orderBy = null) {
        self::$queryType = strtoupper('select');
        // QUERY
        $query = 'SELECT ' . $data . ' FROM ' . $table1;
        $query .= !empty($joinFactor) && !empty($table2) ? ' INNER JOIN ' . $table2 . ' ON ' . $table1 . '.' . $joinFactor . ' = ' . $table2 . '.' . $joinFactor : '';
        $query .= !empty($where) ? ' WHERE ' . $where : '';
        $query .= !empty($orderBy) ? ' ORDER BY ' . $orderBy : '';
        self::$query = $query;
        // PREPARE AND EXECUTE QUERY
        $prepare = self::getConnexion()->prepare($query);
        self::$prepare = $prepare;
        $prepare->execute();
        $data = $prepare->fetchAll();

        return $data;
    }

    public function update($table, $column, $data, $whereParam, $whereValue) {
        self::$queryType = strtoupper('update');
        // QUERY
        $query = 'UPDATE ' . $table . ' SET ' . $column . ' = "' . $data . '" WHERE ' . $whereParam . ' = ' . $whereValue;
        self::$query = $query;
        // PREPARE AND EXECUTE QUERY
        $prepare = parent::getConnexion()->prepare($query);
        self::$prepare = $prepare;
        $prepare->execute();
    }

    public function delete($table, $whereParam, $whereValue) {
        self::$queryType = strtoupper('delete');
        // QUERY
        $query = 'DELETE FROM ' . $table . ' WHERE ' . $whereParam . ' = ' . $whereValue;
        self::$query = $query;
        // PREPARE AND EXECUTE QUERY
        $prepare = parent::getConnexion()->prepare($query);
        self::$prepare = $prepare;
        $prepare->execute();

    }

    public function count($table) {
        self::$queryType = strtoupper('count');
        // QUERY
        $query = 'SELECT COUNT(*) FROM ' . $table;
        self::$query = $query;
        // PREPARE AND EXECUTE QUERY
        $prepare = parent::getConnexion()->prepare($query);
        self::$prepare = $prepare;
        $prepare->execute();
        $data = $prepare->fetchAll();

        return $data;
    }

    public function exist($table, $where) {
        self::$queryType = strtoupper('exist');

        // QUERY
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $where;
        self::$query = $query;
        // PREPARE AND EXECUTE QUERY
        $prepare = parent::getConnexion()->prepare($query);
        self::$prepare = $prepare;
        $prepare->execute();
        $data = $prepare->fetchAll();

        return $data;
    }
}