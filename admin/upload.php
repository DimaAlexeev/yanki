<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <body>
    // HTML form
<form action="index.php" method="post" enctype="multipart/form-data">
  <input type="file" name="images[]" multiple>
  <button type="submit">Загрузить</button>
</form>
<?php
// File upload.php
// Если в $_FILES существует "images" и она не NULL
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
            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
            die($unknownMessage);
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
            if (!move_uploaded_file($fileTmpName, __DIR__ . '/upload/' . $name . $format)) {
                die('При записи изображения на диск произошла ошибка.');
            }
        }
    };
    echo 'Файлы успешно загружены!';
};


// File functions.php
function getRandomFileName($path)
{
    $path = $path ? $path . '/' : '';

    do {
        $name = md5(microtime() . rand(0, 9999));
        $file = $path . $name;
    } while (file_exists($file));

    return $name;
}
?>
    </body>
</html>