function handleYes() {
    const response = prompt("I'm so happy you said yes! Type 'I do' to accept.");
    
    if (response && response.toLowerCase() === 'i do') {
        simulateWhatsappMessage("I love you too! 💖 Let's spend the rest of our lives together.");
    } else {
        alert("Oh no! Let me know when you're ready. 😔");
    }
}

function simulateWhatsappMessage(message) {
    alert(`Sending WhatsApp message:\n\n${message}`);
    // Di dunia nyata, ini akan mengirim pesan WhatsApp melalui API resmi.
}
