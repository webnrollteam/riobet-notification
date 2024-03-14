<?php
$userId = $_REQUEST['user_id'];
$lang = $_REQUEST['lang'] ?? 'ru';

$messages = [
  'ru' => [
    'please' => 'Пожалуйста нажмите кнопку "Разрешить"',
    'please2' => 'чтобы получать уведомления о новых<br /> бонусах, акциях и турнирах.',
  ],
  'en' => [
    'please' => 'Please tap the "Allow" button',
    'please2' => 'to receive notifications about new<br /> bonuses, promotions, and tournaments.',
  ]
];
?>
<html lang="<?php echo $lang?>" data-user-id="<?php echo $userId?>">
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
<link rel="stylesheet" href="styles.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="//www.gstatic.com/firebasejs/3.6.8/firebase.js"></script>
<script type="text/javascript" src="ubid/build/ubid-0.0.1.min.js"></script>
<script type="text/javascript" src="firebase_subscribe.js"></script>

<body>

  <p><button type="button" id="subscribe">Следить за изменениями</button></p>

  <form action="php/index.php" method="POST" target="_blank">
    <div><input type="text" name="token" readonly id="token" /></div>
    <div><input type="text" name="title" placeholder="title"/></div>
    <div><input type="text" name="body" placeholder="body"/></div>
    <div><input type="submit" value="send"/></div>
  </form>

</body>

</html>