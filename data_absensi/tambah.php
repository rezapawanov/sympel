<?php
require "koneksi.php";

// Check if the HTTP method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the 'tag' data from the POST request
    $tag = $_POST["tag"];

    $logFile = 'log.txt';
    $maxFileSize = 1024 * 1024; // 1 megabyte

    if (file_exists($logFile) && filesize($logFile) > $maxFileSize) {
        // If the log file exceeds the maximum size, rename it with a timestamp
        $backupLogFile = 'log_' . date('Y-m-d_H-i-s') . '.txt';
        rename($logFile, $backupLogFile);
    }

    // Write the new log entry to the file
    $logMessage = date('Y-m-d H:i:s') . " - Received tag: $tag" . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND);

    // Cleanup old log files if necessary
    $files = glob('log_*.txt');
    foreach ($files as $file) {
        if (filemtime($file) < strtotime('-7 days')) {
            unlink($file); // Delete log files older than 7 days (adjust as needed)
        }
    }

    // Insert the 'tag' data into your database
    $query = "INSERT INTO tambah (tag) VALUES ('$tag')";
    mysqli_query($koneksi, $query);
    
    // Send a response to the microcontroller
    echo "Data received and processed successfully.";
} else {
    // If the HTTP method is not POST, return an error response
    http_response_code(405); // Method Not Allowed
    echo "Only POST requests are allowed.";
}
?>
