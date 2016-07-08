<?php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
ini_set("error_reporting", "-1");

set_error_handler("errorHandler");
register_shutdown_function("shutdownHandler");

function errorHandler($error_level, $error_message, $error_file, $error_line, $error_context)
{
$error = "lvl: " . $error_level . " | msg:" . $error_message . " | file:" . $error_file . " | ln:" . $error_line;
    switch ($error_level) {
        case E_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
        case E_PARSE:
            my_log($error, "fatal");
            break;
        case E_USER_ERROR:
        case E_RECOVERABLE_ERROR:
            my_log($error, "error");
            break;
        case E_WARNING:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
        case E_USER_WARNING:
            my_log($error, "warn");
            break;
        case E_NOTICE:
        case E_USER_NOTICE:
            my_log($error, "info");
            break;
        case E_STRICT:
            my_log($error, "debug");
            break;
        default:
            my_log($error, "warn");
    }
}

function shutdownHandler() //will be called when php script ends.
{
$lasterror = error_get_last();
    switch ($lasterror['type'])
    {
        case E_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
        case E_USER_ERROR:
        case E_RECOVERABLE_ERROR:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
        case E_PARSE:
            $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
            my_log($error, "fatal");
    }
}

function my_log($error, $errlvl)
{
    error_log("$errlvl" . ' ' . "$error");
}

?>
