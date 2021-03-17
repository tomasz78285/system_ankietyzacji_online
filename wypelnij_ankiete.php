<?php 
    session_start();
 
    require_once 'connect.php';
    require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Kreator ankiet</title>

        <meta name="description" content="Strona do ankietyzacji online">
        <meta name="keywords" content="system, ankietyzacji, online">
        <meta name="author" content="Tomasz Kadłubowski">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <script src="script.js" asyns></script>
	
    </head>
    <body>
        <main>
        <form method="post">
            <label>Wpisz nazwe ankiety</label>
            <input type="text" name="ankieta" 
            <?php
            if(isset($_POST['ankieta'])){
                $a = $_POST['ankieta'];
                echo("value='$a'");
            }
                ?>
            />
            <input type="submit" value="OK" />
        </form>
        <div class="pytanie">
            <form method="post">
            <?php
                        
                        if(isset($_POST['ankieta'])){
                            $licznik = 1;
                            $licznikOtwartych = 1;
                            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                            if ($polaczenie -> connect_errno) {
                                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                exit();
                            }
                            $ankieta = $_POST['ankieta'];
                            
                            $sql = "SELECT tresc_pytania, rodzaj FROM pytania WHERE ankieta='$ankieta'";
                            
                            $result = $polaczenie->query($sql);
                            
                            if($result && $result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    //echo "-------------------------";
                                    echo "<br>"."<span style='font-weight:bold;'>Pytanie ".$licznik." ".$row["tresc_pytania"]. "</span><br>";
                                    $licznik++;
                                    $odp = $row["tresc_pytania"];
                                    $rodzaj = $row["rodzaj"];
                                    $sql2 = "SELECT id_odpowiedzi, tresc_odpowiedzi FROM odpowiedzi WHERE pytanie='$odp'";
                                    $result2 = $polaczenie->query($sql2);
                                    if($result2 && $result2->num_rows > 0) {
                                        if($rodzaj=='zamkniete'){
                                        while($row2 = $result2->fetch_assoc()) {
                                           // $id_odpowiedzi = $row2["id_odpowiedzi"];
                                            echo "<input type='checkbox' name='zamknieta'/> ".$row2["tresc_odpowiedzi"]. "<br>";   
                                        }
                                    }
                                    if($rodzaj=='otwarte'){
                                            echo "<input type='text' name='otwarta'/>";
                                           // $licznikOtwartych++;
                                        }
                                    }
                                else {
                                    echo "0 results";
                                }}
                            } else {
                                echo "0 results";
                            }
                            $polaczenie->close();
                            }
                    ?>
                    <br><br>
                    <input type="submit" value="Przeslij ankietę" />
                    </form>
                    <?php
                        if(isset($_POST['id_odpowiedzi'])){
                            $id = $_POST['zamknieta'];
                            $tresc = $_POST['otwarta'];
                            $polaczenie -> query("UPDATE odpowiedzi SET ilosc = ilosc + 1 WHERE id_odpowiedzi='$id'");
                            $polaczenie->close();
                            $polaczenie->query("INSERT INTO odpowiedzi VALUES (NULL,'$tresc','','$odp')");
                            $polaczenie->close();
                        if ($polaczenie -> connect_errno) {
                            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                            exit();
                        }
                      
                    }
                    ?>
                </div>
<?php 
    require_once 'footer.php';
?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
