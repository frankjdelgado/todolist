<?php
class Helpers {
    public static function currentUser() {
    	
        return Session::get('username');
    }
}