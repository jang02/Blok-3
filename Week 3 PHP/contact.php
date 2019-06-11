<?php include "header/header.php";
    include "menu/menu.php";

    ?>
    <div id="container">
    <?php

    function changeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $strings = ["name", "email", "subject", "phone", "comment", "files"];
    $notRequired = ["phone", "files"];

    $data = [];
    $dataErr = [];

    foreach ($strings as $value) {
        $data[$value] = "";
        $dataErr[$value] = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST[$value])) {
                if (in_array($value, $notRequired))
                    continue;

                $dataErr[$value] = "Dit veld is verplicht";
            }
            else {
                $data[$value] = changeInput($_POST[$value]);

            }
        }

    }

    ?>

    <div id="content">
        <p>Note: Alles behalve het meesturen van bestanden werkt.</p>
        <div id="formulier">
            <form  class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form-self" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-6" for="kunnen" style="margin-top: 5px">Voor- en achternaam <span class="error">* <?php echo $dataErr["name"]?></span></label>
                    <div class="col-sm-16">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data["name"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6" for="persoon">E-mail adres <span class="error">* <?php echo $dataErr["email"]?></span></label>
                    <div class="col-sm-16">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $data["email"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6" for="persoon">Onderwerp <span class="error">* <?php echo $dataErr["subject"]?></span></label>
                    <div class="col-sm-16">
                        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $data["subject"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6" for="getal">Telefoonnummer</label>
                    <div class="col-sm-16">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $data["phone"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6" for="voorwerp">Vraag <span class="error">* <?php echo $dataErr["comment"]?></span></label>
                    <div class="col-sm-16">
                        <textarea rows="4" class="form-control" id="comment" name="comment" form="form-self"><?php echo $data["comment"] ?></textarea>
                    </div>
                </div>

                <input class="ignoreFloat" type="file" id="files" name="files" accept="audio/*, video/*, image/*, application/msword, application/vnd.ms-excel">

                <input class="ignoreFloat" type="submit" id="submit">
            </form>
        </div>

        <div id="result" style="display: none">
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $data = [];
                $dataErr = [];

                $canProcess = true;

                foreach ($strings as $value) {
                    if (empty($_POST[$value])) {
                        if (in_array($value, $notRequired))
                            continue;

                        $canProcess = false;
                        break;
                    }
                    else {
                        $data[$value] = changeInput($_POST[$value]);
                    }
                }

                if ($canProcess) {
                    echo
                    "<script>
	                        
	                        
                            document.getElementById('formulier').style.display = 'none';
                            document.getElementById('result').style.display = 'block';
                        
                        </script>";

                    require "phpmailer/src/Exception.php";
                    require "phpmailer/src/PHPMailer.php";
                    require "phpmailer/src/SMTP.php";


                    $phone = "";
                    $subject = $data["subject"];

                    if (isset($_FILES["files"])) {
                        $errors= array();
                        $file_name = $_FILES['files']['name'];
                        $file_size = $_FILES['files']['size'];
                        $file_tmp = $_FILES['files']['tmp_name'];
                        $file_type = $_FILES['files']['type'];

                        $file_ext = explode('.',$file_name);
                        $file_ext=strtolower(end($file_ext));

                        $fileSizeInMB = 10;

                        if($file_size > 10 * 1024 * 1024) {
                            $errors="De file moet kleiner zijn dan " . $fileSizeInMB . "MB.";
                        }

                        if(!empty($errors)) {
                            echo $errors;
                            exit;
                        }
                        else {
                            move_uploaded_file($file_tmp, "uploaded_files/" . $file_name);
                        }
                    }

                    if (!empty($data["phone"]))
                        $phone = $data["phone"];


                    $message = "Verstuurd door: " . $data["name"] . "<br>";
                    $message .= "Email: " . $data["email"] . "<br>";
                    if (!empty($phone))
                        $message .= "Telefoon nr: " . $phone . "<br>";
                    $message .= "Ip adres: " . getUserIP() . "<br><br>";

                    if (is_array($data["comment"])) {
                        for ($i = 0; $i < count($data["comment"]); $i++) {
                            $message .= changeInput($data["comment"][$i]) . "<br>";
                        }
                    }
                    else {
                        $message .= str_replace("\n", "<br>", changeInput($data["comment"]));
                    }


                    try {
                        $mail = new \PHPMailer\PHPMailer\PHPMailer();

                        $mail->IsSMTP();
                        $mail->SMTPDebug = 0;
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "tls";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Username = "jangarretsen01@gmail.com";
                        $mail->Password = base64_decode("aGhyYm50c3NkYmx1dWJwcg==");

                        $mail->Port = 587; // 465 or 587

                        $mail->From = "jangarretsen01@gmail.com";
                        $mail->FromName = $data["name"];
                        $mail->addAddress("jangarretsen01@gmail.com");     // Add a recipient

                        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters


                        $mail->isHTML(true);                                  // Set email format to HTML

                        $mail->Subject = $subject;
                        $mail->Body = $message;
                        $mail->AltBody = $message;

                        if (isset($_FILES["files"])) {
                            $mail->addAttachment($file_tmp, $file_name);         // Add attachments
                            echo $file_tmp.$file_name;
                        }

                        if(!$mail->send()) {//$mail->send()
                            echo "Er is een error opgetreden, stuur deze error door naar de maker.<br>";
                            echo "Mail Error: " . $mail->ErrorInfo;
                        } else {
                            echo "E-mail is succesvol verzonden.";
                        }
                    } catch (Exception $e) {
                        echo "Caught exception: ",  $e->getMessage(), "\n";
                    }
                }

            }

            function getUserIP()
            {
                // Get real visitor IP behind CloudFlare network
                if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                    $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                    $_SERVER["HTTP_CLIENT_IP"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                }
                $client  = @$_SERVER["HTTP_CLIENT_IP"];
                $forward = @$_SERVER["HTTP_X_FORWARDED_FOR"];
                $remote  = $_SERVER["REMOTE_ADDR"];

                if(filter_var($client, FILTER_VALIDATE_IP))
                {
                    $ip = $client;
                }
                elseif(filter_var($forward, FILTER_VALIDATE_IP))
                {
                    $ip = $forward;
                }
                else
                {
                    $ip = $remote;
                }

                return $ip;
            }
            ?>
        </div>
    </div>
</div>
</div>
    <?php include "footer/footer.php" ?>