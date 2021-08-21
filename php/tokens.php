    <?php
        session_start();
        use Firebase\JWT\JWT;
        require_once './php-jwt-master/src/JWT.PHP';
        $time = time();
        $key = "example_key";
        $token = array(
                'iat'=> $time,
                'exp'=> $time + (60 * 60),
                'Usuario'=> $_SESSION['usuario'],
                );

        $jwt = JWT::encode($token,$key);
        $decoded = JWT::decode($jwt,$key, array('HS256'));
    ?>
