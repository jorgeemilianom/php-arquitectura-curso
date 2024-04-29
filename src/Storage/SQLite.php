<?php
declare(strict_types=1);

namespace Core\Storage;

use Core\Contracts\CoreAbstracts\CoreAbstract;
use Exception;
use SQLite3;

class SQLite extends CoreAbstract
{
    public $db;

    public function __construct($name_db) {
        $this->db = new SQLite3($name_db);
    }

    public function get(array $colums, string $table, array $where = [], string $OrderBy = ''): array
    {
        try {
            $cols = empty($colums) ? '*' : implode(", ", $colums);

            $query = "SELECT $cols FROM $table";

            if (!empty($where)) {
                $whereClauses = [];
                foreach ($where as $key => $value) {
                    $whereClauses[] = "$key = '$value'";
                }
                $query .= " WHERE " . implode(' ', $whereClauses);
            }

            if ($OrderBy) {
                $query .= " ORDER BY $OrderBy";
            }
            
            $response = $this->db->query($query);
            $dataResponse = [];
            while ($response && ($row = $response->fetchArray(SQLITE3_ASSOC))){
                $dataResponse[] = $row;
            }
            return $dataResponse;
        } catch (Exception $e) {
            return [];
        }
    }

    public function getOneBy(array $colums, string $table, array $where = [], string $OrderBy = ''): array
    {
        try {
            $cols = empty($colums) ? '*' : implode(", ", $colums);

            $query = "SELECT $cols FROM $table";

            if (!empty($where)) {
                $whereClauses = [];
                foreach ($where as $key => $value) {
                    $whereClauses[] = "$key = '$value'";
                }
                $query .= " WHERE " . implode(' ', $whereClauses);
            }

            if ($OrderBy) {
                $query .= " ORDER BY $OrderBy";
            }
            
            $response = $this->db->query("$query LIMIT 1");
            $dataResponse = [];
            while ($response && ($row = $response->fetchArray(SQLITE3_ASSOC))){
                $dataResponse[] = $row;
            }
            return $dataResponse? reset($dataResponse) : [];
        } catch (Exception $e) {
            return [];
        }
    }

    public function insert(string $table, array $insert): bool
    {
        try {
            $data_key = '';
            $data_value = '';
            foreach ($insert as $key => $value) {
                $data_key .= "$key, ";
                $data_value .= "'$value', ";
            }

            $data_key = substr($data_key, 0, -2);
            $data_value = substr($data_value, 0, -2);

            $query = "INSERT INTO $table ($data_key) VALUES ($data_value)";
            $data = (bool) $this->db->exec($query);

            return $data;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteById(string $table, int $idToDelete): bool
    {
        try {
            $query = "DELETE FROM $table WHERE id = $idToDelete";
            $data = $this->db->exec($query);

            return (bool) $data;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function update(string $table, array $set, array $where = []): bool
    {
        try {
            $query = "UPDATE $table SET ";
            foreach ($set as $key => $value) {
                $query .= "$key = '$value', ";
            }
            $query = substr($query, 0, -2);
            $wher = '';
            if (!empty($where)) {
                $wher = ' WHERE ';
                foreach ($where as $key => $value) {
                    $wher .= "$key = '$value' ";
                }
                $wher = substr($wher, 0, -1);
            }
            $query .= $wher;

            $data = $this->db->exec($query);
            return (bool) $data;
        } catch (Exception $e) {
            return false;
        }
    }

}