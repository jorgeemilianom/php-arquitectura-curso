<?php
declare(strict_types=1);

namespace Core\Storage;
use Core\Contracts\CoreAbstracts\CoreAbstract;
use Exception;
use mysqli;

abstract class MySQL extends CoreAbstract
{
    private static function Connection(): ?mysqli
    {
        $connection = new mysqli($_ENV['DDBB_HOST'], $_ENV['DDBB_USER'], $_ENV['DDBB_PASSWORD'], $_ENV['DDBB_DBNAME']);
        if($connection->connect_error) throw new Exception("DB error");
        return $connection;
    }

    public static function Query(string $query): array
    {
        try {
            $connection = self::Connection();
            $result = $connection->query($query);
            if(!$result) [];
    
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return [];
        }
    }

    public static function getAll(string $table): array
    {
        $query = "SELECT * FROM $table";
        return self::Query($query);
    }

    protected static function findBy(string $table, array $find): array
    {
        try {
            $wher = ' WHERE ';
            $i = 0;
            foreach ($find as $key => $value) {
                if ($i > 0) {
                    $wher .= "AND $key = '$value' ";
                } else {
                    $wher .= "$key = '$value' ";
                }
                $i++;
            }
            $query = "SELECT * FROM $table" . $wher;
            $data = self::query($query);
            if ($data) {
                return $data;
            }
            return [];
        } catch (\Throwable $th) {
            return [];
        }
    }

    protected static function findOneBy(string $table, array $find): array
    {
        try {
            $wher = ' WHERE ';
            $i = 0;
            foreach ($find as $key => $value) {
                if ($i > 0) {
                    $wher .= "AND $key = '$value' ";
                } else {
                    $wher .= "$key = '$value' ";
                }
                $i++;
            }
            $query = "SELECT * FROM $table" . "$wher LIMIT 1";
            $data = self::query($query);
            if ($data) {
                return reset($data);
            }
            return [];
        } catch (\Throwable $th) {
            return [];
        }
    }

    protected static function findById(string $table, int $findId): array
    {
        try {
            $query = "SELECT * FROM $table WHERE id = $findId";
            $data = self::query($query);

            return $data ? $data : [];
        } catch (\Throwable $th) {
            return [];
        }
    }

    protected static function insert(string $table, array $insert): bool
    {
        try {
            $data_key = '';
            $data_value = '';
            foreach ($insert as $key => $value) {
                $data_key .= "$key, ";
                
                if (empty($value) && strlen($value) == 0) {
                    $data_value .= "'', ";
                } elseif (is_bool($value) || is_null($value)) {
                    $data_value .= (bool)$value . ", ";
                } else {
                    $data_value .= "'$value', ";
                }
            }

            $data_key = substr($data_key, 0, -2);
            $data_value = substr($data_value, 0, -2);

            $query = "INSERT INTO $table ($data_key) VALUES ($data_value)";
            $data = (bool) self::query($query);

            return $data;
        } catch (Exception $e) {
            return false;
        }
    }

    protected static function update(string $table, array $set, array $where = []): bool
    {
        try {
            $query = "UPDATE $table SET ";
            foreach ($set as $key => $value) {
                if (is_bool($value)) {
                    $query .= "$key = " . (int)$value . ", ";
                } else if($value == 'NULL') {
                    $query .= "$key = NULL, ";
                }else {
                    $query .= "$key = '$value', ";
                }
            }

            $query = substr($query, 0, -2);
            $wher = '';
            if (!empty($where)) {
                $wher = ' WHERE ';
                foreach ($where as $key => $value) {
                    if (is_bool($value)) {
                        $wher .= "$key = " . (int)$value;
                    } else {
                        $wher .= "$key = '$value' ";
                    }
                }
                $wher = substr($wher, 0, -1);
            }
            $query .= $wher;

            return (bool) self::query($query);
        } catch (Exception $e) {
            return false;
        }
    }

    protected static function deleteById(string $table, int $idToDelete): bool
    {
        try {
            $query = "DELETE FROM $table WHERE id = $idToDelete";
            $data = self::query($query);

            return (bool) $data;
        } catch (\Throwable $th) {
            return false;
        }
    }
}