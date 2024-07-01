<?php

$name = htmlspecialchars(trim($_POST['name']));
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($_POST['message']));

if (!empty($name) && !empty($email) && !empty($message)) {
    $prepared_message = "Вам пришло сообщение с сайта: \n Имя отправителя: $name \n Email отправителя: $email \n Сообщение: $message";

    $sending = mail('example@mail.ru', 'Сообщение с сайта', $prepared_message);

    if ($sending) {
        header('Location: success.html');
        die();
    } else {
        error_log('Email sending failed.');
        header('Location: error.html');
        die();
    }
} else {
    header('Location: index.html');
    die();
}