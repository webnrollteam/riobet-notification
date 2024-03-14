var messagingSenderId = '985618152874';

var ubid = require( 'ubid' );

var messages = {
  ru: {
    alreadySubscribed: 'Вы уже подписаны на уведомления'
  },
  en: {
    alreadySubscribed: 'You are already subscribed'
  }
};

$(function () {
  var lang = $('html').attr('lang');
  
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

    subscribe();

    // $('#subscribe').on('click', function () {
    //   subscribe();
    // });
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

  function sendTokenToServer(currentToken) {
    $('#token').val(currentToken);

    if (!isTokenSentToServer(currentToken)) {
      console.log('Отправка токена на сервер...');

      ubid.get( function( error, signatureData ) {
        if ( error ) {
            console.error( error );
            return;
        }

        var url = 'ЭТО_АДРЕС_СЕРВЕРА';
        $.post(url, {
          token: currentToken,
          fingerPrint: signatureData.browser.signature,
          userId: $('html').data('user-id')
        });
  
        setTokenSentToServer(currentToken);
  
        signatureData.browser.signature
    } );
    
    } else {
      console.log('Токен уже отправлен на сервер.');
    }

    $('.please').html(messages[lang].alreadySubscribed);
    $('.please2').hide();
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