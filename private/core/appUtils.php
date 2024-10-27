<?php

function isValueSet($key, $defaultValue = '')
{
    return isset($_POST[$key]) ? $_POST[$key] : $defaultValue;
}

function isSelectValueSet($key, $value)
{
    // Check if the value is not empty and is not the default "Select" option
    return (isset($_POST[$key]) && $_POST[$key] == $value) ? "selected" : "";
}

//escape characters
function esc_chars($values)
{
    return addslashes($values);
}

//error log func
function logError($message)
{
    $logFile = 'logs/error.log';
    $timestamp = date('Y-m-d H:i:s');
    $formattedMessage = "[{$timestamp}] {$message}" . PHP_EOL;

    if (!file_exists(dirname($logFile))) {
        mkdir(dirname($logFile), 0755, true);
    }

    file_put_contents($logFile, $formattedMessage, FILE_APPEND);
}

function getDateFormat($date)
{
    return date('jS M, Y', strtotime($date));
}
/**
 * Generate a random string of a specified length
 *
 * @param int $length Length of the string
 * @return string Random string
 */
function randomStringGenerator($length)
{
    $characterSet = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    $randomString = '';
    for ($x = 0; $x < $length; $x++) {
        $random = rand(0, 61);
        $randomString .= $characterSet[$random];
    }
    return $randomString;
}

function printMessage($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
