var admin = require("firebase-admin");

var serviceAccount = require("./riobet-7585b-fedb02b78d3b.json");

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount)
});

var payload = {
  notification: {
    title: "Account Deposit",
    body: "A deposit to your savings account has just cleared."
  },
  data: {
    account: "Savings",
    balance: "$3020.25"
  }
};

var options = {
  priority: "high",
  timeToLive: 60 * 60 *24
};


var registrationToken = 'elRe57LSH94:APA91bEOjGtcl8FalwTBmXfB233MpJqAOzXlgSvV1ZIBxCQTSjxnCZ0KuvD_k59czC9WOYGqV4MSt8LzapKt8lbBu_K0wkkaGnIuL3v9BTk-h8Fe506XMKqP57U2skj3N8mxTxFqQ1qA';

admin.messaging().sendToDevice(registrationToken, payload, options)
  .then(function(response) {
    console.log("Successfully sent message:", response);
  })
  .catch(function(error) {
    console.log("Error sending message:", error);
  });

admin.messaging()