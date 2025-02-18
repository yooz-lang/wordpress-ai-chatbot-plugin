function saveChatLog(userMessage, botResponse) {
    let formData = new FormData();
    formData.append('action', 'save_chat_log');
    formData.append('user_message', userMessage);
    formData.append('bot_response', botResponse);
    
    fetch(yooz_ajax.ajax_url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
    })
    .then(text => {
        return text ? JSON.parse(text) : {}; 
    })
}
