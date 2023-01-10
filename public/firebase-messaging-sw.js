importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
  apiKey: "AIzaSyBJKAe1KTNC3dK65FfK-XDZ609tCYVjAYY",
  projectId: "ewaiting-notification",
  messagingSenderId: "229500280113",
  appId: "1:229500280113:web:85a419c0bad44fc5ac2410",
});


const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
