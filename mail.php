<?php
$name = $_POST['name'];
$phone = $_POST['phone'];

 
header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Введите имя', 'code' => 0));
  exit();
}
$phone = $_POST['phone'];
if(!preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $phone)){
    exit(print json_encode(array('message' => 'Некорректный телефон', 'code' => 0)));
}
// if ($city === ''){
//   print json_encode(array('message' => 'Введите населенный пункт', 'code' => 0));
//   exit();
// }
 
// if ($email === ''){
//   print json_encode(array('message' => 'Введите почту', 'code' => 0));
//   exit();
//   }
//   else {
//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
//   print json_encode(array('message' => 'Введите верный адрес почты', 'code' => 0));
//   exit();
//   }
// }
// if ($message === ''){
//   print json_encode(array('message' => 'Напишите подробный адрес и объект оценки', 'code' => 0));
//   exit();
// }
$content="Имя заказчика: $name \nТелефон заказчика: $phone ";
$recipient = "assasin21rus@gmail.com";
// $mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Ошибка!");
print json_encode(array('message' => 'Ваше обращение отправлено, наши специалисты с вами свяжутся!', 'code' => 1));
exit();
?>