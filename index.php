<?php
?>
<html>

<head>
  <script type="text/javascript" src="//code.jquery.com/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" src="//www.gstatic.com/firebasejs/3.6.8/firebase.js"></script>
  <script type="text/javascript" src="firebase_subscribe.js"></script>
</head>

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