<?php
/**
 * Created by PhpStorm.
 * User: jaynam
 * Date: 11/3/18
 * Time: 8:06 PM
 */

class Session{

    public static  function  startSession(){
        if (!Session::isSessionStart()){
            session_start();
        }
    }

    public static function isSessionStart(){
        if (isset($_SESSION['login'])){
            return true;
        }else{
            return false;
        }
    }
}