<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id=baner>
    <h2>Światowe rozgrywki piłkarskie</h2>
    <img src=obraz1.jpg alt="boisko">
    </div>


    <div id=mecze>
    <?php
    $conn = mysqli_connect("localhost","root","","egzamin");
    
$sql = "SELECT rozgrywka.zespol1, rozgrywka.zespol2, rozgrywka.wynik, rozgrywka.data_rozgrywki
FROM rozgrywka 
WHERE rozgrywka.zespol1 = 'EVG';";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class=informacja>";
        echo "<h3>",$row['zespol1']," - ",$row['zespol2'] ,"</h3>";
        echo "<h4>",$row['wynik'] ,"</h4>";
        echo "<p>","w dniu: ",$row['data_rozgrywki'] ,"</p>";
        echo "</div>";
    }
}else {
    echo "0 rezultatów";
}






    mysqli_close($conn);
    ?>
    
    </div>

    





    <div id=główny>
    <h2>Reprezentacja Polski</h2>
    </div>
    <div id=lewy>
    <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
    <form action="" method="post">
<input type=number name=numer>
<input type=submit value=sprawdź>

<?php



if(isset($_POST['numer'])){
$num = $_POST['numer'];
if($num == null){$num=0;}
$conn = mysqli_connect("localhost","root","","egzamin");
$sql = "SELECT zawodnik.imie,zawodnik.nazwisko
FROM zawodnik
WHERE zawodnik.pozycja_id = $num;";
$result = mysqli_query($conn, $sql);



if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<ul>";
        echo "<li>",$row["imie"], " ", $row['nazwisko'], "</li>";
        echo "</ul>";
    }
}

mysqli_close($conn);
}






?>
    </form>
    </div>



    <div id=prawy>
    <img src=zad1.png alt=piłkarz>
    <p>Autor: Mateusz Śledź </p>
    </div>






</body>
</html>