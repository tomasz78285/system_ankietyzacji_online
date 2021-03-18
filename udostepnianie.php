<?php 
    require_once 'header_zalogowany.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Ankiety Online - Udostępnianie</title>

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
        <br><br>
        <main>
            <section class="rodzaj_ankiet">
                <div class = "container">

                    <h1>Wybierz opcję udostępnienia</h1>

                    <div class="row">

                        <div class="col-sm-4" id="s4">
                            <h1>Pobierz link</h1>
                            <a href="http://localhost/System_ankietyzacji_online/przykladowe_ankiety.php">http://localhost/System_ankietyzacji_online/przykladowe_ankiety.php</a>
                        </div>
                        <form method="post">
                            <div class="col-sm-4" id="s5">
                                <h1>Wyślij zaproszenie e-mail</h1>
                                <label>Wpisz adresata</label>
                                <input type="text" name="adresat" />
                                <input type="submit" value="Wyślij" />
                            </div>
                        </form>
                        <?php
                            include_once "PHPMailer/PHPMailer.php";
                            include_once "PHPMailer/Exception.php";
                            //Import PHPMailer classes into the global namespace
                            //These must be at the top of your script, not inside a function
                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\SMTP;
                            use PHPMailer\PHPMailer\Exception;
                           
                           
                            //Load Composer's autoloader
                //require 'vendor/autoload.php';

                            //Instantiation and passing `true` enables exceptions
                            $mail = new PHPMailer(true);

                            try {
                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                $mail->isSMTP();                                            //Send using SMTP
                                $mail->Host       = 'ssl0.ovh.net';                     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                $mail->Username   = 'kad.tom@wp.pl';                     //SMTP username
                                $mail->Password   = '784-Tit.';                               //SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                //Recipients
                                $mail->setFrom('kad.tom@wp.pl', 'Mailer');
                                $mail->addAddress('tkadlubowski78285');     //Add a recipient
                       //Name is optional
                           //
                               //Optional name

                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Here is the subject';
                                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                               // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                $mail->send();
                                echo 'Message has been sent';
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                        ?>
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
