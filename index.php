<?php
    require "mail.php";

    function form_validate($name, $email, $subject, $message){
        return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
    }
 
    $status="";

    if (isset($_POST["form"])){
        if (form_validate($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            $body = "$name <$email> te envia el siguiente mensaje: <br><br> $message";

            //mandar correo.
            sendMail($subject,$body, $email, $name, true );
            $status = "success";
            
        }
        else {
            $status = "danger";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulario de Contacto</title>
</head>

<body>
    <div class="main">

        <?php if ($status == "danger"): ?> 
            <div class="alert danger">
                <span>Hubo un problema, no se enviaron tus datos.</span>
            </div>
        <?php endif;?>

        <?php if ($status == "success"):?>
            <div class="alert success">
                <span>Tus datos fueron enviados exitósamente</span>
            </div>
        <?php endif;?>

        <form action="./"  method="POST" class="form-styles">
            <h1>Contactanos</h1>
            <div class="input-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input-group">
                <label for="email">Correo:</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="input-group">
                <label for="subject">Asunto:</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div class="input-group">
                <label for="message">Mensaje:</label>
                <textarea name="message" id="message"></textarea>
            </div>
            <div class="button-container">
                <button name="form" type="submit">Enviar</button>
            </div>
            <div class="contact-info">
                <div class="info">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>13 Saw Mill Circle, North Olmested.</span>
                </div>
                <div class="info">
                    <i class="fa-light fa-phone"></i>
                    <span>+1 123 4567890</span>
                </div>
            </div>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/4328f26fc9.js" crossorigin="anonymous"></script>

</body>

</html>