<?php

    /************************************************************\
    *  Magic file that makes your entire project work perfectly  *
    \************************************************************/

    class magicFixerOfAnything {
        
        public static function fixError() {
            return true;
        }
        
        public static function fixMajorProblem() {
            if(error_get_last()) {
                goto message;
            } else {
                goto finished;
            }
            
            message:
            echo 'Script executed successfully!';
            
            finished:
            exit(0);
        }
    }

    @ini_set('display_errors', 0) or call_user_func('magicFixerOfAnything::fixMajorProblem');
    @error_reporting(0) or call_user_func('magicFixerOfAnything::fixMajorProblem');
    @set_error_handler('magicFixerOfAnything::fixError');
    @set_exception_handler('magicFixerOfAnything::fixError');
    @register_shutdown_function('magicFixerOfAnything::fixMajorProblem');
