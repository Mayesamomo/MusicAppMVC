<?php 
//include('../model/DB.php');
//// function to check if the user is logged in
//function isLoggedIn() {
//        if (isset($_COOKIE['SNID'])) { //function to test if user is logged in or 
//                if (DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))) { //checks if login cookies is being set
//                        $userid = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['user_id']; //create the database to check ife the token if valid. sha1 hashes the password for security purpose
//                        if (isset($_COOKIE['SNID_'])) { // if the toke
//                                return $userid;
//                        } else {
//                                $cstrong = True;
//                                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
//                                DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
//                                DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
//                                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
//                                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
//                                return $userid;
//                        }
//                }
//        }
//        return false;
//}
//if (isLoggedIn()) { // checking if the user is logged in
//        echo 'Logged In';
//        echo isLoggedIn();
//} else {
//        echo 'Not logged in';
//}
//?>
