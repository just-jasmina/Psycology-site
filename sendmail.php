<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    
    $mail = new PHPMailer(true);
    $mail->Charset = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/lenguage/');
    $mail->IsHTML(true);
    
    
    $mail->setForm('onix@info.com', 'ONIX Group')
    $mail->addAddress('zzloy948@gmail.com')
    $mail->Subject = 'Привет! Это Onix Group'
    
    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong>' $_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail:</strong>' $_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['number']))){
        $body.='<p><strong>Номер:</strong>' $_POST['number'].'</p>';
    }
    if(trim(!empty($_POST['massage']))){
        $body.='<p><strong>Сообщение:</strong>' $_POST['massage'].'</p>';
    }
    
    if (!mail->send()){
        $massage = 'Ошибка';
    }else{
        $massage = 'Данные отправлены';
    }

    $response = ['massage'=>$massage];

    header('Content-type: application/json');
    echo json_encode($response);

?>
