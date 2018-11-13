<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['message'])) {$formData = $_POST['message'];}
 
    $to = "artemiy_maslov@mail.ru"; 
    $sendfrom   = "info@laspalmasqwer.ru";
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData
<br><b>Имя пославшего:</b> $name <br>
<b>Сообщение:</b> $formData <br>
<b>Почта:</b> $email";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<div style="text-align: center;">
 
Ваше сообщение отправлено!
 
</div>';
    }
    else
    {
    echo '<center>
 
<b>Ошибка. Сообщение не отправлено!</b>
 
</center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}?>