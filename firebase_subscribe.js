var messagingSenderId = '985618152874';

$(function () {
  firebase.initializeApp({
    messagingSenderId: messagingSenderId
  });

  // браузер поддерживает уведомления
  // вообще, эту проверку должна делать библиотека Firebase, но она этого не делает
  if ('Notification' in window) {
    var messaging = firebase.messaging();

    messaging.onMessage(function (payload) {
      console.log('Получили сообщение', payload);
      new Notification(payload.notification.title, payload.notification);
    });

    if (Notification.permission === 'granted') {
      subscribe();
    }

    $('#subscribe').on('click', function () {
      subscribe();
    });
  }

  function subscribe() {
    messaging.requestPermission()
      .then(function () {
        messaging.getToken()
          .then(function (currentToken) {
            console.log('Token устройства', currentToken);

            if (currentToken) {
              sendTokenToServer(currentToken);
            } else {
              console.warn('Не удалось получить токен устройства');
              setTokenSentToServer(false);
            }
          })
          .catch(function (err) {
            console.warn('При получении токена устройства произошла ошибка', err);
            setTokenSentToServer(false);
          });
      })
      .catch(function (err) {
        console.warn('Не удалось получить разрешение на показ уведомлений', err);
      });
  }

  // отправка ID на сервер
  function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer(currentToken)) {
      console.log('Отправка токена на сервер...');

      var url = '';
      $.post(url, {
        token: currentToken
      });

      setTokenSentToServer(currentToken);
    } else {
      console.log('Токен уже отправлен на сервер.');
    }
  }

  // используем localStorage для отметки того,
  // что пользователь уже подписался на уведомления
  function isTokenSentToServer(currentToken) {
    return window.localStorage.getItem('sentFirebaseMessagingToken') == currentToken;
  }

  function setTokenSentToServer(currentToken) {
    window.localStorage.setItem(
      'sentFirebaseMessagingToken',
      currentToken ? currentToken : ''
    );
  };
});