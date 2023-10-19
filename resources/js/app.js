import "./bootstrap";
import "./switchColorTheme.js";
import "flowbite";
import Alpine from "alpinejs";

import "./dataTables.js";

// Init alpine
window.Alpine = Alpine;

Alpine.start();

const messagesContainer = document.getElementById("messages-container");
scrollToBottom();

Livewire.on("message-sended", () => {
    scrollToBottom();
});

// Control the messages container scroll to bottom
function scrollToBottom() {
    if (messagesContainer)
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
}
