<?php
include 'conn.php';

    if (isset($_GET['login'])) {
            # code...
            
    $sql = "SELECT * FROM `usuarios`
                WHERE `login` = \"".$_GET['login']."\"";//monto a query

    $result= mysqli_query($conexao,$sql);
    $total=mysqli_num_rows($result);
    
        

        if( $total> 0 )//se retornar algum resultado
                header('HTTP/1.0  400');

        else
                header('HTTP/1.0  200');
}

if (isset($_GET['email'])) {
            # code...
            
    $sql = "SELECT * FROM `usuarios`
                WHERE `email` = \"".$_GET['email']."\"";//monto a query

    $result= mysqli_query($conexao,$sql);
    $total=mysqli_num_rows($result);
    
        

        if( $total> 0 )//se retornar algum resultado
                header('HTTP/1.0  400');

        else
                header('HTTP/1.0  200');
}
    

    

?>
