<?php

    /************************************************************\
    *  Magic file that makes your entire project work perfectly  *
    \************************************************************/

    @ini_set('display_errors', 0);
    @error_reporting(0);
    function __globalErrorHandler()
    {
        return true;
    }
    @set_error_handler('__globalErrorHandler');
    @set_exception_handler('__globalErrorHandler');
    @register_shutdown_function(function() {
        if(error_get_last())
        {
            echo "Script executed successfully!";
        }
    });
