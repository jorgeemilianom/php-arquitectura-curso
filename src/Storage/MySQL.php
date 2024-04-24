<?php
declare(strict_types=1);

namespace Core\Storage;
use Exception;
use mysqli;

abstract class MySQL
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
}