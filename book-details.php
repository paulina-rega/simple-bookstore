<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> Czytelnia </title>
<meta http-equiv="Content-type" content="text/html; charset=iso- 8859-2">
<meta name="Czytelnia" content=" [wstaw tu opis strony] "> <meta name="Keywords" content=" [wstaw tu slowa kluczowe] "> <meta name="Author" content=" [dane autora] ">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>






    <div class="container">
        <div class="title">
            <h1><a href="index.php">Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Koszyk</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="#">Kontakt</a></li>

            </ul>
        </div>
        <div class="main">


          <?php
           include 'database_connection.php';

           $conn = open_connection();

           $sql = "SELECT * FROM book WHERE id_book=".$_GET['id_book'];
           $result = $conn->query($sql);


           if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                   echo '<div class="image-box">';
                   echo "\n";

                   echo '<img src="'.$row['img_link'].'" alt="book cover picture" border="0">';
                   echo "\n";
                   echo '</div>';
                   echo "\n";
                   echo '<div class="info-box">';
                   echo "\n";
                   echo '<h3>'. $row['title'] .'</h3>';

                   echo '<p class="author">'.$row['author'].'</p>';
                   echo "\n";

                   echo '<p>'.$row['description'].'</p>';
                   echo "\n";
                   echo '<p class="price">'.$row['price'].' zł </p>';
                   echo "\n";




                   echo '<form method="post">';

                   echo '<input type="submit" name="button"
                               class="add-to-basket" value="Do koszyka" />
                   </form>';




//                   echo '<button class="add-to-basket">Do koszyka</button>';


                   echo '<div class="details">';
                   echo '<table>';

                   echo '<tr>';
                   echo '<td class="info-table-1">okładka</td>';
                   echo '<td>'.$row['cover_type'].'</td>';
                   echo '</tr>';


                   echo '<tr>';
                   echo '<td class="info-table-1">wydawnictwo</td>';
                   echo '<td>';
                   echo $row['publisher'];
                   echo '</td>';
                   echo '</tr>';

                   echo '<tr>';
                   echo '<td class="info-table-1">ISBN</td>';
                   echo '</td>';
                   echo '<td>'.$row['isbn_number'].'</td>';
                   echo '</tr>';

                   echo '<tr>';
                   echo '<td class="info-table-1">data wydania</td>';
                   echo '</td>';
                   echo '<td>'.$row['realise_data'].'</td>';
                   echo '</tr>';


                   echo '</table>';
                   echo '</div>';
                   echo '</div>';
                   echo "\n";
               }
           } else {
               echo "0 results";
           }

           ?>









        </div>
    </div>


</body>
</html>


<!--
<a href="https://ibb.co/0qZKv07"><img src="https://i.ibb.co/BLjGFhp/enlightment.jpg" alt="enlightment" border="0"></a>
<a href="https://ibb.co/8jTBYNc"><img src="https://i.ibb.co/CnNtPm2/mao.jpg" alt="mao" border="0"></a>
<a href="https://ibb.co/VBQBC09"><img src="https://i.ibb.co/3hMhF5d/nadchodzi.jpg" alt="nadchodzi" border="0"></a>
<a href="https://imgbb.com/"><img src="https://i.ibb.co/vYS6M6H/obcy.jpg" alt="obcy" border="0"></a>
<a href="https://ibb.co/3MyJqR5"><img src="https://i.ibb.co/wwNvXcZ/nieznane.jpg" alt="nieznane" border="0"></a>
<a href="https://ibb.co/7kJvQ8v"><img src="https://i.ibb.co/TWBc1pc/kapitalizm.jpg" alt="kapitalizm" border="0"></a>
<a href="https://ibb.co/mBKZ8v3"><img src="https://i.ibb.co/th6jXZ9/sledztwo.jpg" alt="sledztwo" border="0"></a>
<a href="https://ibb.co/sF6QJGS"><img src="https://i.ibb.co/LCJ6hWw/kolej.jpg" alt="kolej" border="0"></a>
<a href="https://ibb.co/0BCKyjW"><img src="https://i.ibb.co/bHsF5gy/cixi.jpg" alt="cixi" border="0"></a>



<div class="div1">
            <img src="https://i.ibb.co/BLjGFhp/enlightment.jpg" alt="enlightment" border="0">
            <p class="book-title">Lost enlightment</p>
        </div>

--!>
