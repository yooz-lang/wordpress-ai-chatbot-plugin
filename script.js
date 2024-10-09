var ischatopen = false;
var ele = document.getElementById("chatbar");

function openChatBox() {
    if (ischatopen == false) {
        ele.classList.add("toggle");
        ischatopen = true;
        document.getElementById("chatOpen").classList.remove("fa-comments");
        document.getElementById("chatOpen").classList.add("fa-times");

    }
    else {
        ele.classList.remove("toggle");
        ischatopen = false;
        document.getElementById("chatOpen").classList.add("fa-comments");
        document.getElementById("chatOpen").classList.remove("fa-times");
    }
}


class YouzParser {
    constructor() {
        this.input_data_string = null;
        this.patterns = [];
        this.definitions = {};
        this.stopWords = [];
        this.keywords = [];
        this.temp_vars = {};
        this.collections = {};
        this.collection_patterns = {};
        this.lastMatchedPattern = null; // متغیر برای ذخیره پرانتز آخرین دستور
    }

    parse(input) {
        this.discover_collections(input);
        this.input_data_string = input;
        const definitionRegex = /#(\S+)\s*:\s*(.*?)\s*\./gs;
        let match;
        while ((match = definitionRegex.exec(input)) !== null) {
            const key = match[1].trim();
            const value = match[2].trim();
            this.definitions[key] = value;
        }

        const patternRegex = /\(\s*\+\s*(.*?)\s*-\s*(.*?)\s*\)/gs;
        while ((match = patternRegex.exec(input)) !== null) {
            const userPattern = match[1].trim();
            const botResponses = match[2].split('_').map(response => response.trim());
            if (userPattern.startsWith('{')) {
                const keywords = userPattern.slice(1, -1).split('،').map(keyword => keyword.trim());
                this.keywords.push({ keywords, botResponses });
            } else {
                this.patterns.push({ userPattern, botResponses });
            }
        }

        const stopWordsRegex = /-\s*\{\s*(.*?)\s*\}/gs;
        while ((match = stopWordsRegex.exec(input)) !== null) {
            const words = match[1].split('،').map(word => word.trim());
            this.stopWords.push(...words);
        }
    }

    getResponse(userMessage) {

        const cleanedMessage = this.removeStopWords(userMessage);
        this.lastMatchedPattern = null; // ریست کردن متغیر قبل از هر جستجو

        for (let pattern of this.patterns) {
            const { userPattern, botResponses } = pattern;
            const regexPattern = this.createRegex(userPattern);
            const match = cleanedMessage.match(regexPattern);
            if (match) {
                this.lastMatchedPattern = { userPattern, botResponses }; // ذخیره پرانتز
                let responses = botResponses;
                let response = responses[Math.floor(Math.random() * responses.length)];
                if (response.endsWith('!>')) {
                    response = this.getAdditionalResponses(response.slice(0, -99).trim(), cleanedMessage);
                    response = response.replace('!>', '');
                }
                return this.resolveResponse(response, match);
            }
        }

        const messageWords = cleanedMessage.split(' ');
        for (let keywordPattern of this.keywords) {
            const { keywords, botResponses } = keywordPattern;
            if (this.containsKeywords(messageWords, keywords)) {
                this.lastMatchedPattern = { keywords, botResponses }; // ذخیره پرانتز
                let response = botResponses[Math.floor(Math.random() * botResponses.length)];
                if (response.endsWith('!>')) {
                    response = this.getAdditionalResponses(response.slice(0, -99).trim(), cleanedMessage);
                }
                return this.resolveResponse(response, []);
            }
        }

        return "متاسفم، متوجه نشدم.";
    }

    removeStopWords(message) {
        let words = message.split(' ');
        words = words.filter(word => !this.stopWords.includes(word));
        return words.join(' ');
    }

    createRegex(pattern) {
        return new RegExp(`^${pattern.replace(/\*([0-9]*)/g, '(.*?)')}$`);
    }

    resolveResponse(response, match) {
        let resolvedResponse = response;
        for (let i = 1; i < match.length; i++) {
            resolvedResponse = resolvedResponse.replace(`*${i}`, match[i].trim());
        }
        return resolvedResponse.replace(/#(\S+)/g, (match, key) => {
            return this.definitions[key] || match;
        });
    }

    containsKeywords(messageWords, keywords) {
        return keywords.every(keyword => messageWords.includes(keyword));
    }

    getAdditionalResponses(initialResponse, userMessage) {
        let additionalResponses = initialResponse;
        for (let pattern of this.patterns) {
            const { userPattern, botResponses } = pattern;
            const regexPattern = this.createRegex(userPattern);
            const match = userMessage.match(regexPattern);
            if (match) {
                const responses = botResponses;
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                additionalResponses += " " + this.resolveResponse(randomResponse, match);
            }
        }
        return additionalResponses;
    }
    _is_temp_var_declaration_line(line) {
        line = line.trim();
        let words_seperated = line.split(' ');
        let first_word = words_seperated[0];
        let first_char = first_word[0];
        let next_word = words_seperated[1];
        if (first_char === '=' && next_word === ':') { return true; }
        else { return false; }
    }
    define_temp_vars(text) {
        let lines = text.split('\n');
        for (let line of lines) {
            line = line.trim();
            let is_declaration_line = this._is_temp_var_declaration_line(line);
            if (is_declaration_line) {
                let chunks = line.split(' ');
                let first_chunk = chunks[0];
                let last_chunk = chunks[2];
                let var_name = first_chunk.slice(1, first_chunk.length);
                let value = last_chunk.trim();
                this.temp_vars[var_name] = value;
            }
        }
    }
    replace_temp_vars(response) {
        let lines = response.split('\n');
        let result_text = '';
        for (let line of lines) {
            line = line.trim();
            let is_declaration_line = this._is_temp_var_declaration_line(line);
            if (!is_declaration_line) {
                let chunks = line.split(' ');
                for (let chunk of chunks) {
                    let first_char = chunk[0];
                    if (first_char === '=') {
                        let var_name = chunk.slice(1, chunk.length);
                        console.log(var_name);
                        result_text += this.temp_vars[var_name] + ' ';
                    }
                    else { result_text += chunk + ' '; }
                }
            }
            result_text += '\n';
        }
        return result_text;
    }
    _is_answer_part(line) {
        let first_char = line[0];
        if (first_char === '-') { return true; } else { return false; }
    }
    discover_collections(input) {
        let open_parenthis = false;
        let outside_text = '';
        let parenthis_depth = 0;
        for (let i = 0; i < input.length; i++) {
            let char = input[i];
            if (char === '(') { open_parenthis = true; parenthis_depth++; }
            else if (char === ')') {
                parenthis_depth--;
                if (parenthis_depth === 0) { open_parenthis = false; continue; }
            }

            if (open_parenthis) { continue; }
            else { outside_text += char; }
        }
        let lines = outside_text.trim().split('\n');
        for (let line of lines) {
            if (line.includes('{')) {
                let start_index = line.indexOf('{');
                let end_index = line.indexOf('}');
                let between = line.slice(start_index + 1, end_index);
                let items = between.split('،');
                for (let i = 0; i < items.length; i++) { items[i] = items[i].trim(); }
                let collection_name = line.slice(0, start_index).trim();
                //console.log(items);
                this.collections[collection_name] = items;
            }
        }
    }
    check_for_collections_pattern(messageText) {
        let chunks = messageText.trim().split(' ');
        let collection_entries = Object.entries(this.collections);
        let result_text = '';
        for (let chunk of chunks) {
            let is_in_collections = false;
            for (let [key, vals_arr] of collection_entries) {
                if (vals_arr.includes(chunk)) {
                    is_in_collections = key;
                    break;
                }
            }
            if (is_in_collections) { result_text += '&' + is_in_collections + ' '; }
            else { result_text += chunk + ' '; }
        }
        return result_text.trim();
    }
}

let youzParser = new YouzParser();
let inputCode = myChatPluginData.inputCode;


youzParser.parse(inputCode);

function showResponseAndPattern(userMessage) {
    const response = youzParser.getResponse(userMessage);
    //console.log(response);
    let mathched_pattern = youzParser.lastMatchedPattern;

    let full_text = '';
    {
        let keys = Object.keys(mathched_pattern);
        for (let key of keys) {
            let value = mathched_pattern[key];
            full_text += '\n' + value;
        }
    }
    youzParser.define_temp_vars(full_text);
}

let messageCounter = 0;
const messages = [];

function sendMessage() {
    const inputElement = document.querySelector('.chat-input');
    let messageText = inputElement.value;

    if (messageText.trim() !== "") {
        messageCounter++;
        const messageVariableName = `userMessage${messageCounter}`;
        messages.push({ [messageVariableName]: messageText });

        // نمایش پیام کاربر
        displayMessage(messageText, 'user');

        // دریافت پاسخ از تابع youzParser
        let replace_collections_with_patterns = youzParser.check_for_collections_pattern(messageText);
        messageText = replace_collections_with_patterns;
        //console.log(messageText);
        let response = youzParser.getResponse(messageText);
        response = youzParser.replace_temp_vars(response);
        // نمایش پاسخ در صفحه
        displayMessage(response, 'bot');

        showResponseAndPattern(messageText);

        inputElement.value = ""; // Clear the input field
    }
}

function displayMessage(text, sender) {
    const chatWrapper = document.querySelector('.chat-wrapper');
    const messageWrapper = document.createElement('div');
    messageWrapper.className = sender === 'user' ? 'message-wrapper reverse' : 'message-wrapper';

    const img = document.createElement('img');
    img.className = 'message-pp';
    img.src = sender === 'user' ? 'https://yooz.run/pb_img//profile.png' : 'https://yooz.run/pb_img//bot.png'; // Change image based on sender
    img.alt = sender === 'user' ? 'profile-pic' : 'bot-pic';

    const messageBoxWrapper = document.createElement('div');
    messageBoxWrapper.className = 'message-box-wrapper';

    const messageBox = document.createElement('div');
    messageBox.className = 'message-box';
    messageBox.style.textAlign = 'right';
    messageBox.style.fontFamily = 'yekan';

    const mo = document.createElement('div');
    mo.className = 'mo';
    mo.textContent = text;

    messageBox.appendChild(mo);
    messageBoxWrapper.appendChild(messageBox);
    messageWrapper.appendChild(img);
    messageWrapper.appendChild(messageBoxWrapper);
    chatWrapper.appendChild(messageWrapper);
}

document.querySelector('.send').addEventListener('click', sendMessage);

let title = document.querySelectorAll(".chat-list-header");
let totalHeight = 0;

for (let i = 0; i < title.length; i++) {
    let totalHeight = 0;
    title[i].addEventListener("click", function () {
        let result = this.nextElementSibling;
        let activeSibling = this.nextElementSibling.classList.contains('active');
        this.classList.toggle('active');
        result.classList.toggle("active");
        if (!activeSibling) {
            for (i = 0; i < result.children.length; i++) {
                totalHeight = totalHeight + result.children[i].scrollHeight + 40;
            }
        } else {
            totalHeight = 0;
        }
        result.style.maxHeight = totalHeight + "px";
    });
}

const themeColors = document.querySelectorAll('.theme-color');

themeColors.forEach(themeColor => {
    themeColor.addEventListener('click', e => {
        themeColors.forEach(c => c.classList.remove('active'));
        const theme = 'pink';
        document.body.setAttribute('data-theme', theme);
        themeColor.classList.add('active');
    });
});

let buttonColor = myChatPluginData.buttonColor;

jQuery(document).ready(function($) {

    // تنظیم رنگ دکمه
    $('.chat_button').css('background-color', myChatPluginData.buttonColor);

    // تنظیم placeholder برای پرسش اولیه
    $('.chat-input').attr('placeholder', myChatPluginData.initialQuestion);

    // تنظیم SVG دکمه
    if (myChatPluginData.buttonIconUrl) {
        $('#btn-id').html(myChatPluginData.buttonIconUrl);
    }
});



