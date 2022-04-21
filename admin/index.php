<? 
require_once("../lib/db.php");
$sql_text = 'SELECT * FROM katalog';
$result = mysqli_query($link,$sql_text);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>добавление товара</title>
</head>
<body>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Наименование товара"> <br />
        <input type="number" name="cena" placeholder="Стоимость товара"> <br />
        <select name="id_color">
            <option value="white">white</option>
            <option value="Blue">Blue</option>
            <option value="yellow">yellow</option>
            <option value="black">black</option>
        </select>
        <br />
        <select name="id_size">
            <option value="xxs">xxs</option>
            <option value="xs">xs</option>
            <option value="s">s</option>
            <option value="m">m</option>
        </select>
        <br />
        <textarea name="description" placeholder="Описание"></textarea><br />
        <textarea name="sostav" placeholder="Состав"></textarea><br />
        <input type="number" name="length" placeholder="Количество товара"> <br />
        <select name="id_katalog">
        <?
         while($row_text = mysqli_fetch_array($result)) {
            echo '<option value="'.$row_text['id'].'">'.$row_text['name'].'</option>';
         }
        ?>
        </select>
        <br />
        <input type="file" name="images[]" multiple>
        <br />
        <input type="submit" value="Добавить" >
    </form>
</body>
</html>
<?
if(!empty($_POST)){
    
    $nameTovar = $_POST['name'];
    $cena = $_POST['cena'];
    $id_color =  $_POST['id_color'];
    $id_size =  $_POST['id_size'];
    $description = $_POST['description'];
    $sostav = $_POST['sostav'];
    $length = $_POST['length'];
    $id_katalog = $_POST['id_katalog'];
    $article = time() + rand(1,100);
    $PathsaveFile = __DIR__ . '/upload/'.$article.'/';
    $title_img = "";
    mkdir($PathsaveFile, 0777, true);

    if(!$nameTovar){
        exit("Поле name обязательное");
    }

    if(!$id_katalog){
        exit("Поле id_katalog обязательное <a href='http://auto-site.com/addedText.php'>вернуться</a>");
    }

    if(!$length){
        exit("Поле length  обязательное <a href='http://auto-site.com/addedText.php'>вернуться</a>");
    }


    if (isset($_FILES['images'])) {
        // Изменим структуру $_FILES
        foreach($_FILES['images'] as $key => $value) {
            foreach($value as $k => $v) {
                $_FILES['images'][$k][$key] = $v;
            }
            // Удалим старые ключи
            unset($_FILES['images'][$key]);
        }
        // Загружаем все картинки по порядку
        foreach ($_FILES['images'] as $k => $v) {
            // Загружаем по одному файлу
            $fileName = $_FILES['images'][$k]['name'];
            $fileTmpName = $_FILES['images'][$k]['tmp_name'];
            $fileType = $_FILES['images'][$k]['type'];
            $fileSize = $_FILES['images'][$k]['size'];
            $errorCode = $_FILES['images'][$k]['error'];
    
            // Проверим на ошибки
            if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
                // Зададим неизвестную ошибку
                die('При загрузке файла произошла неизвестная ошибка.');
            } else {
                // Создадим ресурс FileInfo
                $fi = finfo_open(FILEINFO_MIME_TYPE);
                // Получим MIME-тип
                $mime = (string) finfo_file($fi, $fileTmpName);
                // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
                if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');
                // Результат функции запишем в переменную
                $image = getimagesize($fileTmpName);
               
                // Сгенерируем новое имя файла через функцию getRandomFileName()
                $name = getRandomFileName($fileTmpName);
                // Сгенерируем расширение файла на основе типа картинки
                $extension = image_type_to_extension($image[2]);
                // Сократим .jpeg до .jpg
                $format = str_replace('jpeg', 'jpg', $extension);
                // Переместим картинку с новым именем и расширением в папку /upload
                if (!move_uploaded_file($fileTmpName, $PathsaveFile. $name . $format)) {
                    die('При записи изображения на диск произошла ошибка.');
                }
                $title_img = $PathsaveFile. $name . $format;
            }
        };
        echo 'Файлы успешно загружены!';
    };
    
    
   
$sql = "INSERT INTO tovar (`name`, article, title_img, cena, id_color, id_size, `description`, sostav, `length`, id_katalog) VALUES (?,?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($link,$sql);
mysqli_stmt_bind_param($stmt, 'sssissssii',  $nameTovar, $article, $title_img, $cena, $id_color, $id_size, $description, $sostav, $length,  $id_katalog );
mysqli_stmt_execute($stmt); 
}

// File functions.php
function getRandomFileName($path) {
    $path = $path ? $path . '/' : '';

    do {
        $name = md5(microtime() . rand(0, 9999));
        $file = $path . $name;
    } while (file_exists($file));

    return $name;
}
    

?>