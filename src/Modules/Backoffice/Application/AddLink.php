<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Application;
use Core\Services\Context;
use Core\Services\Request;
use Core\Storage\MySQL;
use Core\Modules\Backoffice\Infrastructure\BackofficeRepository;
use Core\Storage\SQLite;

final class AddLink extends BackofficeRepository
{
    public static function index()
    {
        try {
            $SQLite = new SQLite('./src/Modules/Backoffice/Infrastructure/Links.db');

            $SQLite->insert('Links', [
                'name_link' => 'test',
                'link' => 'https://google.com'
            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}