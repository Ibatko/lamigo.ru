<html>
<head>
	<link href="css/style.css" rel="stylesheet">
    <title>LAMIGO</title>
	<?php
		require_once 'dbconnect/connection.php'; // подключаем скрипт
		$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
	?>
</head>
<body>
	<header> 
		<div class="header">
            <nav>
                <?
                    $query ="SELECT * FROM category";
                    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);



                    ?><table><?
                        foreach ($data as $ar){
                            ?> <tr><a style="color: white" href="/<?=$ar['name_category']?>">
                                <?=$ar['name_category']; echo " ";?>
                            </a>
                            <?
                            $query1 ="SELECT * FROM product_group WHERE  category_id =".$ar['id_category'];
                            $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
                            for ($data1 = []; $row1 = mysqli_fetch_assoc($result1); $data1[] = $row1);

                            foreach ($data1 as $ap){
                                ?>
                                    <td style="font-size: 14px"><?=$ap['name_group']; echo " ";?></td>
                                <?
                            }
                            ?>
                            </tr><?
                        }
                    ?></table><?
                ?>
            </nav>
		</div>
		<div class="leftblock">
		</div>
	</header>
	<article class="main">