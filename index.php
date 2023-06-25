<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="./js/libraries/jquery.js"></script>
    <script defer src="./js/export.js"></script>
    <script defer src="./js/import.js"></script>
    <script defer src="./js/parserCSV.js"></script>
</head>
<body>
    <?php
        require './config.php';
        include './api/core.php';
        include './api/export.php';
        include './api/import.php';

        // $connect = inc();
        // $allData = $connect->query("SELECT * FROM `product` WHERE 1");

        $core = new Core();
        $allData = $core->connect->query("SELECT * FROM `product` WHERE 1")
    ?>

    <form id="uploader" name="uploader" enctype="multipart/form-data" method="POST">
    <input id="upload-file" name="upload-file" type="file" onchange="downloadFile(this)"/>
    <button type="submit" name="load">Загрузить</button>
    </form>


    <div class="container-products">
        <?php
             while($row = $allData->fetch_assoc()){
                echo "
                <div class='product' data-id='$row[id]'>
                <p class='name-product'>$row[name]</p>
                <p class='price'>$row[price]</p>
                <p class='small-text'>$row[small_text]</p>
                <p class='big-text'>$row[big_text]</p>
                <button class='btn-export'>Экспортировать файл CSV</button>
            </div>
                ";
            }
        ?>
    </div>
</body>
</html>