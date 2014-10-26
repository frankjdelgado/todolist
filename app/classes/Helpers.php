<?php
class Helpers {
    public static function currentUser() {
    	
        return Session::get('username');
    }
    public static function currentUserID() {
    	
        return Session::get('user_id');
    }
}