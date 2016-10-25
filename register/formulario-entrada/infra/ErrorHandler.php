<?php

// Inicia Output Buffering
//ob_start();

header('Content-Type: application/json');

//header("PHP_ERROR: 0");

require_once("../classes/ReturnError.php");

/**
 * Error handler, passes flow over the exception logger with new ErrorException.
 */
function log_error( $num, $str, $file, $line, $context = null )
{
    log_exception( new ErrorException( $str, 0, $num, $file, $line ) );
}

/**
 * Uncaught exception handler.
 */
function log_exception( Exception $e )
{
    global $config;

    $config['debug'] = true;

    if ( $config['debug'] == true )
    {
        // Limpa Output Buffering, ou seja, limpa todos os echo, print, var_dump, etc anteriores
//        ob_get_clean();

//        header("PHP_ERROR: 1");

        $returnError = new ReturnError();
        $returnError->type = get_class( $e );
        $returnError->message = $e->getMessage();
        $returnError->file = $e->getFile();
        $returnError->line = $e->getLine();
        $returnError->status = "error";

//        print "<br/><br/>";
//        print '<table class="alert-danger">';
//        print "<tr><th style='width: 100px;'><strong>Type</strong></th><td>" . get_class( $e ) . "</td></tr>";
//        print "<tr><th><strong>Message</strong></th><td>{$e->getMessage()}</td></tr>";
//        print "<tr><th><strong>File</strong></th><td>{$e->getFile()}</td></tr>";
//        print "<tr><th><strong>Line</strong></th><td>{$e->getLine()}</td></tr>";
//        print "</table>";

        echo json_encode($returnError);
    }
    else
    {
        $message = "Type: " . get_class( $e ) . "; Message: {$e->getMessage()}; File: {$e->getFile()}; Line: {$e->getLine()};";
        file_put_contents( $config["app_dir"] . "../tmp/logs/exceptions.log", $message . PHP_EOL, FILE_APPEND );
        header( "Location: {$config["error_page"]}" );
    }

    exit();
}

/**
 * Checks for a fatal error, work around for set_error_handler not working on fatal errors.
 */
function check_for_fatal()
{
    $error = error_get_last();
    if ( $error["type"] == E_ERROR )
        log_error( $error["type"], $error["message"], $error["file"], $error["line"] );
}


register_shutdown_function( "check_for_fatal" );
set_error_handler( "log_error" );

set_exception_handler( "log_exception" );
ini_set( "display_errors", "off" );
error_reporting( E_ALL );

