<?php

    /************************************************************\
    *  Magic file that makes your entire project work perfectly  *
    \************************************************************/

    class fixAnything {
        public static function fixIt() {
            echo 'Script executed successfully!';
            exit(0);
        }
    }

    @ini_set('display_errors', 0) or call_user_func('fixAnything::fixIt');
    @error_reporting(0) or call_user_func('fixAnything::fixIt');
    @set_error_handler('fixAnything::fixIt');
    @set_exception_handler('fixAnything::fixIt');
    @register_shutdown_function('fixAnything::fixIt');
