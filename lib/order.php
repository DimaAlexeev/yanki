<?
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    require_once("db.php");
    $sql = "INSERT INTO orders (cart, name, phone) VALUES (?,?,?)";
    $stmt = mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt , 'sss' , json_encode($obj[0], JSON_UNESCAPED_UNICODE), $obj[1], $obj[2] );

    mysqli_stmt_execute($stmt);
?>