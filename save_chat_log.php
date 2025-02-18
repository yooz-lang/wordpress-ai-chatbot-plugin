<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userMessage = trim($_POST['user_message']);
    $botResponse = trim($_POST['bot_response']);
    
    $filePath = __DIR__ . "/chat_log.yooz";
    $logEntry = "( \n + $userMessage\n - $botResponse\n)\n";

    $chatLog = file_exists($filePath) ? file_get_contents($filePath) : "";
    if ($chatLog === false) {
        exit;
    }

    // استخراج بلاک‌ها با الگوی بهبودیافته
    preg_match_all("/\(\s*\+\s.*?-\s.*?\s*\)/s", $chatLog, $matches);
    $entries = $matches[0];

    // اصلاح شرط به >=4
    if (count($entries) >= 15) {
        $firstEntry = preg_quote($entries[0], '/');
        // حذف دقیق اولین بلاک با جایگزینی regex
        $chatLog = preg_replace("/{$firstEntry}/s", "", $chatLog, 1);
        // حذف خطوط خالی اضافی
        $chatLog = trim($chatLog) . "\n";
    }

    file_put_contents($filePath, $chatLog . $logEntry, LOCK_EX);
}
?>