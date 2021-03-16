<?php 
    session_start();
    require_once "connect.php";

    if(isset($_POST['email']))
    {
        $poprawneWypelnienie=true;

        $login = $_POST['login'];
        if((strlen($login)<3) || (strlen($login)>20))
        {
            $poprawneWypelnienie=false;
            $_SESSION['bladLogin'] = "Login musi posiadać od 3 do 20 znaków";
        }

        if(ctype_alnum($login)==false)
        {
            $poprawneWypelnienie=false;
            $_SESSION['bladLogin']="Login może się składać jedynie z cyfr i liter bez polskich znaków.";
        }

        $email = $_POST['email'];
        $email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($email2, FILTER_VALIDATE_EMAIL)==false) || ($email2!=$email))
        {
            $poprawneWypelnienie=false;
            $_SESSION['bladEmail']="Podany adres e-mail nie istnieje";
        }

        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];

        if((strlen($haslo1)<8) || (strlen($haslo1)>20))
        {
            $poprawneWypelnienie=false;
            $_SESSION['bladHaslo1']="Hasło powinno mieć od 8 do 20 znaków!";
        }

        if($haslo1!=$haslo2)
        {
            $poprawneWypelnienie=false;
            $_SESSION['bladHaslo2']="Podane hasła się różnią!";
        }

        try
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $rezultat = $polaczenie->query("SELECT id_uzytkownika FROM uzytkownicy WHERE e_mail='$email'");
                if(!$rezultat) throw new Exception($polaczenie->error);
                $iloscMaili = $rezultat->num_rows;
                if($iloscMaili>0)
                {
                    $poprawneWypelnienie=false;
                    $_SESSION['bladEmail']="Istnieje już konto z podanym adresem e-mail!";
                }

                $rezultat = $polaczenie->query("SELECT id_uzytkownika FROM uzytkownicy WHERE login='$login'");
                if(!$rezultat) throw new Exception($polaczenie->error);
                $iloscLoginow = $rezultat->num_rows;
                if($iloscLoginow>0)
                {
                    $poprawneWypelnienie=false;
                    $_SESSION['bladLogin']="Podana nazwa użytkonika jest już zajęta";
                }

                $rezultat = $polaczenie->query("SELECT id_uzytkownika FROM uzytkownicy WHERE haslo='$haslo1'");
                if(!$rezultat) throw new Exception($polaczenie->error);
                $iloscHasel = $rezultat->num_rows;
                if($iloscHasel>0)
                {
                    $poprawneWypelnienie=false;
                    $_SESSION['bladHaslo1']="Podane haslo jest zajęte";
                }

                if($poprawneWypelnienie==true)
                {
                    if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$login','$haslo1','$email', 0, '', '')"));
                    {
                        $_SESSION['udanaRejestracja']=true;
                        header('Location: nowy_uzytkownik.php');
                    }
                }

                $polaczenie->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera. Przepraszamy za problemy</span>';
           // echo $e;
        }
    }
    require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Rejestracja</title>

        <meta name="description" content="Strona do ankietyzacji online">
        <meta name="keywords" content="system, ankietyzacji, online">
        <meta name="author" content="Tomasz Kadłubowski">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <script src="js/script.js" asyns></script>
        <style>
        .blad
        {
            color: red;
            font-size: 15px;
        }
        </style>
    </head>
    <body>
        <main>
            <section>
                <div class = "container">
                    <div class="row">
                        <div class="tytul">
                            <h1>Rejestracja</h1>
                        </div>
                        <form method="post">
                            <div class="col-sm-1" id="s8">
                                <label>Login</label><br>
                                <input type="text" name="login"><br>
                                <?php
                                    if(isset($_SESSION['bladLogin']))
                                    {
                                        echo '<div class="blad">'.$_SESSION['bladLogin'].'</div>';
                                        unset($_SESSION['bladLogin']);
                                    }
                                ?>
                                <label>Hasło</label><br>
                                <input type="password" name="haslo1"><br>
                                <?php
                                    if(isset($_SESSION['bladHaslo1']))
                                    {
                                        echo '<div class="blad">'.$_SESSION['bladHaslo1'].'</div>';
                                        unset($_SESSION['bladHaslo1']);
                                    }
                                ?>
                                <label>Powtórz hasło</label><br>
                                <input type="password" name="haslo2"><br>
                                <?php
                                    if(isset($_SESSION['bladHaslo2']))
                                    {
                                        echo '<div class="blad">'.$_SESSION['bladHaslo2'].'</div>';
                                        unset($_SESSION['bladHaslo2']);
                                    }
                                ?>
                                <label>Adres e-mail</label><br>
                                <input type="text" name="email">
                                <?php
                                    if(isset($_SESSION['bladEmail']))
                                    {
                                        echo '<div class="blad">'.$_SESSION['bladEmail'].'</div>';
                                        unset($_SESSION['bladEmail']);
                                    }
                                ?>
                                <br><br>
                                <input type="submit" value="Załóż konto">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
<?php 
    require_once 'footer.php';
?>
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>     
    </body>
</html>