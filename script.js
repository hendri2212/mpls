document.addEventListener('DOMContentLoaded', () => {
    readContacts();
});

function readContacts() {
    var api = (navigator.contacts || navigator.mozContacts);
    const props = ["name", "email", "tel"];
    const opts = { multiple: true };

    if (api && !!api.select) { // new Chrome API
        api.select(props, opts)
        .then(function (contacts) {
            let dataSend = contacts.map(contact => ({
                    name: contact.name[0], 
                    email: contact.email[0], 
                    tel: contact.tel[0]
            }))

            consoleLog('Found ' + contacts.length + ' contacts.');
            if (contacts.length) {
                consoleLog('\nAll Contacts:');
                contacts.forEach((contact) => {
                    consoleLog('Name : ' + contact.name + '\nEmail : ' + contact.email + '\nPhone : ' + contact.tel + '\n\n');
                });
            }

            let send = [
                {
                    name: "Ade",
                    email: "ade@gmail.com",
                    tel: "08123456789"
                },
                {
                    name: "Budi",
                    email: "budi@gmail.com",
                    tel: "08123456789"
                }
            ]
            fetch('hasil.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(send)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        })
        
    } else {
        consoleLog('Contacts API not supported.');
    }
}

function consoleLog(data) {
    var logElement = document.getElementById('log');
    logElement.innerHTML += data + '\n';
}