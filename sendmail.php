<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('mihailiukandrei24720@gmail.com', 'Пользователь сайта');
	//Кому отправить
	$mail->addAdress('mihailiukandrei@gmail.com');
	//Тема письма
	$mail->Subject = 'Письмо от пользователя';

	$body = '<h1>Встречайте новое письмо</h1>';

	if(trim(!empty($_POST['tel']))){
		$body.='<p><strong>Телефон:</strong> '.$_POST['tel'].</p>;
	}

//Отправляем
if (!$mail->send()) {
	$message = 'Ошибка';
} else{
	$message = 'Данные отправлены!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);