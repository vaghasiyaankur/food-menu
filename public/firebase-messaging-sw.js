importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
  apiKey: "AIzaSyBfphAIxpzsJDUuCCOhF6DtZKqUPxgj-wA",
  projectId: "fir-test-25564",
  messagingSenderId: "1064311492584",
  appId: "1:1064311492584:web:4842b73ccef0b65aeade5d",
});

  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});