    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-messaging-compat.js"></script>
    <script src="{{url('/assets/js')}}/firebase.js"></script>
    <script>
        // Vérifier si la permission de notification est accordée
        if (Notification.permission === 'granted') {
            // Enregistrer le Service Worker et récupérer le token
            registerServiceWorkerAndGetToken("{{env('VAPID_FIREBASE')}}","{{ csrf_token() }}");
        } else if (Notification.permission !== 'denied') {
            // Demander la permission si elle n'est ni accordée ni refusée
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    registerServiceWorkerAndGetToken();
                } else {
                    alert('يتوجب عليك قبول الإشعارات لتتمكن من التسجيل');
                }
            });
        } else {
            alert('يتوجب عليك قبول الإشعارات لتتمكن من التسجيل');
        }
    </script>