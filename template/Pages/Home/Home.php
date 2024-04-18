<?php  include './template/Layout/Nav.php'; ?>

<h1>Hola como estas</h1>
<h2>Esta es la Home</h2>

<?php

    // $mysqlPDO = new PDO("mysql:host={$_ENV['DDBB_HOST']};dbname={$_ENV['DDBB_DBNAME']}", $_ENV['DDBB_USER'], $_ENV['DDBB_PASSWORD']);
    // // $test = $mysqlPDO->query("SELECT * FROM `users`");
    // // $data_array = [];
    // // foreach ($test as $value) {
    // //     $data_array[] = $value;
    // //     var_dump($value);
    // // }
    // // var_dump($data_array);

    // $connect = $mysqlPDO->prepare("SELECT * FROM `users`");
    // $connect->execute();
    // $X = $connect->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($X[0]['username']);
    // foreach ($test as $value) {
    //     $data_array[] = $value;
    //     var_dump($value);
//     // }
// try {
//     //code...
//     if(!$_POST['USER']) throw new InvalidArgumentException('Te falta enviar el User');
//     $connection = new mysqli($_ENV['DDBB_HOST'], $_ENV['DDBB_USER'], $_ENV['DDBB_PASSWORD'], $_ENV['DDBB_DBNAME']);
    
//     if ($connection->connect_error) {
//         echo "<h1>Hubo un error en el servidor. Notifique a un admin</h1>";
//         die;
//     }

//     $mysql_query = mysqli_query($connection, "SELECT * FROM `users` ");
//     var_dump($mysql_query->fetch_all(MYSQLI_ASSOC));
// } catch (\PDOException $th) {
//     echo "<h1>Hubo un error en el servidor. Notifique a un admin</h1>";
//     die;
// } catch (\InvalidArgumentException $th) {
//     echo $th->getMessage();
//     die;
// } catch (\Throwable $th) {
//     echo "<h1>Hubo un error en el servidor. Notifique a un admin</h1>";
//     die;
// }

