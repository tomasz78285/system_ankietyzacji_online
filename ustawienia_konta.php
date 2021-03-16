<?php 
    session_start();
    require_once 'header_zalogowany.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Ustawienia konta</title>

        <meta name="description" content="Strona do ankietyzacji online">
        <meta name="keywords" content="system, ankietyzacji, online">
        <meta name="author" content="Tomasz Kadłubowski">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <script src="js/script.js" asyns></script>
	
    </head>
    <body>
        <main>
        <?php
            require_once('connect.php'); 
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
                          
            $user = $_SESSION['user'];
            $sql = "SELECT * FROM uzytkownicy WHERE login='$user'";
            $result = $polaczenie->query($sql);
                                   
            
         

        ?>
            <section>
                <div class = "container">
                    
                    <div class=tytul>
                        <h1>Zmień swoje dane</h1>
                    </div>
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-1" id="s8">
                        
                                Imie <br> <input type="text" name="imie" value="<?php if($result && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo $row['imie'];
                                    }
                                    } else {
                                    echo '0 results';
                                    } ?>"><br>
                                Nazwisko <br> <input type="text" name="nazwisko" value="<?php 
                                $user = $_SESSION['user'];
                                $sql = "SELECT * FROM uzytkownicy WHERE login='$user'";
                                $result = $polaczenie->query($sql);
                                if($result && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo $row['nazwisko'];
                                    }
                                    } else {
                                    echo '0 results';
                                    } ?>"><br>
                                Numer telefonu <br> <input type="text" name="nr_telefonu" value="<?php 
                                $user = $_SESSION['user'];
                                $sql = "SELECT * FROM uzytkownicy WHERE login='$user'";
                                $result = $polaczenie->query($sql);
                                if($result && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo $row['nr_telefonu'];
                                    }
                                    } else {
                                    echo '0 results';
                                    } ?>"><br>
                                Adres e-mail <br> <input type="text" name="e_mail" value="<?php 
                                $user = $_SESSION['user'];
                                $sql = "SELECT * FROM uzytkownicy WHERE login='$user'";
                                $result = $polaczenie->query($sql);
                                if($result && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo $row['e_mail'];
                                    }
                                    } else {
                                    echo '0 results';
                                    } ?>"><br>
                                Stare hasło <br> <input type="text" value="<?php 
                                $user = $_SESSION['user'];
                                $sql = "SELECT * FROM uzytkownicy WHERE login='$user'";
                                $result = $polaczenie->query($sql);
                                if($result && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo $row['haslo'];
                                    }
                                    } else {
                                    echo '0 results';
                                    } ?>"><br>
                                Nowe hasło <br> <input type="text" name="nowe_haslo" value="Wpisz nowe hasło"><br><br>
                                <?php
                                    if(isset($_POST['nazwisko']))
                                    {     
                                        $imie = $_POST['imie'];
                                        $nazwisko = $_POST['nazwisko'];
                                        $nr_telefonu = $_POST['nr_telefonu'];
                                        $e_mail = $_POST['e_mail'];
                                        $nowe_haslo = $_POST['nowe_haslo'];
                                        $user = $_SESSION['user'];

                                        $polaczenie -> query("UPDATE uzytkownicy SET imie = '$imie', nazwisko = '$nazwisko', nr_telefonu= '$nr_telefonu', e_mail= '$e_mail', haslo='$nowe_haslo' WHERE login='$user'");
                                        header('Location: ustawienia_konta.php');
                                    }     
                                    if ($polaczenie -> connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                        exit();
                                      }
                                ?>
                                <input type="submit" value="Zatwierdź zmiany">
                            </div>
                        </div>
                        </form>
                </div>
            </section>
            
<?php 
    require_once 'footer.php';
?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>    </body>
</html>