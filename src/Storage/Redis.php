<?php
declare(strict_types=1);
namespace Core\Storage;
use Predis\Client;
use Predis\Connection\ConnectionException;

# Redis
define('CUSTOM_REDIS_ENDPOINT', 'jorge_redis');
define('CUSTOM_REDIS_TTL', '5');
define('CUSTOM_REDIS_ENABLE', true);
define('CUSTOM_REDIS_USEFS', 1);

final class Redis
{
    private static $endpoint = CUSTOM_REDIS_ENDPOINT;
    private $ttl = CUSTOM_REDIS_TTL; 
    private static $clientRedis;
    public static $connected = CUSTOM_REDIS_ENABLE;
    public static $useFS = CUSTOM_REDIS_USEFS;

    public static function getInstance()
    {
    	
        if (empty(self::$clientRedis)){
            if (self::$connected){
                try {
                    $tclientRedis = new Client(['host'=>self::$endpoint,'database'=>'1']);
                    $tclientRedis->connect();
                    self::$clientRedis = $tclientRedis;
                }
                catch (ConnectionException $e) {
                    self::$connected = false;
                }
            }
        }
        return new static();
    }

    public function get($name)
    {
        if (self::$connected){
            return self::$clientRedis->get($name);
        }
        else{
            if (self::$useFS == true){
                $file = 'cache/'.$name;
                if (file_exists($file)){
                    if (filectime($file) + $this->ttl < time()){
                        unlink($file);
                    }
                    else{
                        $aux = file_get_contents($file);
                        return $aux;
                    }
                }
            }
            return null;
        }
    }

    public function set($name,$value,$ttl=null,$encode=true)
    {
        if (self::$connected){
            $ttl = $ttl == null ? $this->ttl:$ttl;
            if ($encode)
                $value =  json_encode($value);
            self::$clientRedis->setex($name,$ttl ,$value);
        }
        else{
            if (self::$useFS == true){
                $file = 'cache/'.$name;
                if ($encode)
                    $value =  json_encode($value);
                file_put_contents($file,$value);
            }
        }
    }

}