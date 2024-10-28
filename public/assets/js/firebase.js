const firebaseConfig = {
    apiKey: "AIzaSyBLUI4CcS7slx-iegz71EviRaQp6fk2W1o",
    authDomain: "souqkabra-f440a.firebaseapp.com",
    projectId: "souqkabra-f440a",
    storageBucket: "souqkabra-f440a.appspot.com",
    messagingSenderId: "82862831857",
    appId: "1:82862831857:web:a545c1994165d65f675150",
    measurementId: "G-FX1XYFJYDF"
};

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

function registerServiceWorkerAndGetToken(VAPID_KEY,CSRF) {
    navigator.serviceWorker.register('/firebase-messaging-sw.js')
    .then((registration) => {
        //console.log('Service Worker enregistré avec succès:', registration);

        // Attendre que le Service Worker soit activé
        return new Promise((resolve, reject) => {
            if (registration.installing) {
                registration.installing.addEventListener('statechange', function(event) {
                    if (event.target.state === 'activated') {
                        resolve(registration);
                    }
                });
            } else if (registration.active) {
                resolve(registration);
            } else {
                reject(new Error('Service Worker activation failed.'));
            }
        });
    })
    .then((registration) => {
        return messaging.getToken({ vapidKey: VAPID_KEY, serviceWorkerRegistration: registration });
    })
    .then((currentToken) => {
        if (currentToken) {
            console.log('Token:', currentToken);
            // Envoyer le token au backend
            fetch('/store-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF,
                },
                body: JSON.stringify({ token: currentToken })
            });
        } else {
            console.log('No registration token available.');
        }
    })
    .catch((err) => {
        console.log('An error occurred while retrieving token.', err);
    });
}