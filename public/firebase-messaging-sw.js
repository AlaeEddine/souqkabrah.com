self.addEventListener('push', function(event) {
    console.log('Push event received:', event);

    if (event.data) {
        try {
            // Parse the data payload
            const notificationData = event.data.json();
            console.log('Notification Data Received:', notificationData.data);

            const title = notificationData.data.title; // Use data.title if available, otherwise use default
            const body = notificationData.data.body; // Use data.body if available, otherwise use default
            const icon = notificationData.data.icon; // Use data.icon if available, otherwise use default

            // Define the notification options
            const options = {
                body: body,
                icon: icon,
                image: icon,
                requireInteraction: true
            };
            // Show the notification
            event.waitUntil(
                self.registration.showNotification(title, options)
            );
        } catch (e) {
            console.error('Error parsing notification JSON:', e);
        }
    } else {
        console.warn('No data received in push event.');
        // Fallback to default notification if data payload is missing
        event.waitUntil(
            self.registration.showNotification('SouqKabrah.com', {
                body: 'You have a new message',
                icon: '/favicon.ico'
            })
        );
    }
});

self.addEventListener('notificationclick', function(event) {
    console.log('Notification click received.');
    event.notification.close();
    event.waitUntil(
        clients.matchAll({ type: 'window', includeUncontrolled: true }).then(function(clientList) {
            if (clientList.length > 0) {
                return clientList[0].focus();
            }
            return clients.openWindow('https://souqkabrah.com/otp/validation/phone');
        })
    );
});
