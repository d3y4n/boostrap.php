<?php

    /************************************************************\
    *  Magic file that makes your entire project work perfectly  *
    \************************************************************/

    //the all-encompassing all-knowing error handling workhorse class! (singleton, of course)
    class magicFixerOfEverything {

        private function __construct() {}

        public static function instance()
        {
            return new magicFixerOfEverything();
        }

        public function fixIt($problem=null)
        {
            if($problem instanceof \Exception)
            {
                goto fixException;
            }
            elseif("error" === $problem)
            {
                goto fixError;
            }
            elseif("fatalError" === $problem)
            {
                goto fixFatal;
            }
            else
            {
                goto everythingsFine;
            }

            fixFatal:
            goto everythingsFine;

            fixException:
            fixError:
            return true;

            everythingsFine:
            echo "Script executed successfully!";
            exit(0);
        }

    }

    //handling functions (global scope, of course)
    function __globalHandleError()
    {
        $handler = magicFixerOfEverything::instance();
        return $handler->fixIt("error");
    }

    function __globalHandleException($exception)
    {
        $handler = magicFixerOfEverything::instance();
        return $handler->fixIt($exception);
    }

    function __globalHandleFatalError()
    {
        $handler = magicFixerOfEverything::instance();
        $handler->fixIt("fatalError");
    }

    function __globalHandleGenericProblem()
    {
        $handler = magicFixerOfEverything::instance();
        $handler->fixIt();
    }



    @ini_set('display_errors', 0) or call_user_func('__globalHandleGenericProblem');
    @error_reporting(0) or call_user_func('__globalHandleGenericProblem');
    @set_error_handler('__globalHandleError');
    @set_exception_handler('__globalHandleException');
    @register_shutdown_function('__globalHandleFatalError');
