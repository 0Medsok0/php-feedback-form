<?php
// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Проверяем данные перед отправкой
    if (empty($name) || empty($email) || empty($message)) {
        echo "Все поля обязательны для заполнения.";
    } else {
        // Формируем заголовок письма
        $to = 'smykov.iw@yandex.ru'; // Укажите ваш email
        $subject = 'Новая заявка с сайта';
        $headers = 'From: ' . $email . "\r\n" .
                   'Reply-To: ' . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // Формируем тело письма
        $body = "Имя: $name \n";
        $body .= "Email: $email \n";
        $body .= "Сообщение:\n$message";

        // Отправляем письмо
        mail($to, $subject, $body, $headers);

        // Выводим сообщение об успешной отправке
        echo "Ваше сообщение было успешно отправлено.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
</head>
<body>

<form action="" method="post">
    <label for="name">Ваше имя:</label>
    <input type="text" name="name" id="name" required><br>
    <label for="email">Ваш email:</label>
    <input type="email" name="email" id="email" required><br>
    <label for="message">Сообщение:</label>
    <textarea name="message" id="message" cols="30" rows="10" required></textarea><br>
    <button type="submit">Отправить</button>
</form>

</body>
</html>
