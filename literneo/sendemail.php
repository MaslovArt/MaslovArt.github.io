<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['message'])) {$date = $_POST['message'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
 
    $to = "artemiy_maslov@mail.ru"; 
    $sendfrom   = "info@literneo.ru";
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData
<br><b>Имя пославшего:</b> $name <br>
<b>текст:</b> $date <br>
<b>Почта:</b> $email";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<div style="text-align: center; width:100%;">
 
Ваше сообщение отправлено!
 
</div>';
    }
    else
    {
    echo '<div style="text-align: center; width:100%;">
 
<b>Ошибка. Сообщение не отправлено!</b>
 
</div>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}?>