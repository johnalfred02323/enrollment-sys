<?php

class func {
	public static function runSession(){
        if (!isset($_SESSION)) {
            session_start();
        }
    }

	public static function checkLoginState($pdo_conn) {
		// run session if not running
		func::runSession();
        
		if(isset($_COOKIE['userid']) && isset($_COOKIE['username']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])) {

			$query = "SELECT * FROM sessions WHERE sessions_userid = :userid AND sessions_token = :token AND sessions_serial = :serial"; 
			
			$userid = $_COOKIE['userid'];
            $username = $_COOKIE['username'];
			$token = $_COOKIE['token'];
			$serial = $_COOKIE['serial'];

			$stmt = $pdo_conn->prepare($query);
			$stmt->execute(array(':userid' => $userid, ':token' => $token, ':serial' => $serial));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() > 0) {
				if ($row['sessions_userid'] == $_COOKIE['userid'] && $row['sessions_token'] == $_COOKIE['token'] && $row['sessions_serial'] == $_COOKIE['serial'] ) {
                    # check sessions...
                    if ($row['sessions_userid'] == $_SESSION['userid'] && $row['sessions_token'] == $_SESSION['token'] && $row['sessions_serial'] == $_SESSION['serial']) {
                        # code...
                        return true;
					}
					else {
                        func::createSession($_COOKIE['userid'], $_COOKIE['username'], $_COOKIE['token'], $_COOKIE['serial']);
                        return true;
                    }
                }
            }
		}
		else {
            return false;
        }
	}
    #end of check login

	public static function createRecord($pdo_conn, $username, $userid) {
		// delete existing sessions
		$delstmt = $pdo_conn->prepare("DELETE FROM sessions WHERE sessions_userid = :session_userid");
        $delstmt->execute(array(':session_userid' => $userid));

        $query = "INSERT INTO sessions (sessions_userid, sessions_token, sessions_serial) VALUES (:userid, :token, :serial)";

        $token  = func::generateToken(164);
        $serial  = func::generateToken(164);

        func::createCookie($username, $userid, $token, $serial);
        func::createSession($username, $userid, $token, $serial);

        // insert session variables in db
        $stmt = $pdo_conn->prepare($query);
        $stmt->execute(array(':userid'=>$userid, ':token' => $token, ':serial' => $serial));  
	}
    #end of create account

	public static function createCookie($username, $userid, $token, $serial){
        setcookie('username', $username, time() + (86400) * 30, '/');
        setcookie('userid', $userid, time() + (86400) * 30, '/');
        setcookie('token', $token, time() + (86400) * 30, '/');
        setcookie('serial', $serial, time() + (86400) * 30, '/');
    }
	#end of create cookie
	
	public static function deleteCookie(){
        func::runSession();
        setcookie('username', '', time() - 1, '/');
        setcookie('userid', '', time() - 1, '/');
        setcookie('token', '', time() - 1, '/');
        setcookie('serial', '', time() - 1, '/');
        session_destroy();
    }
	#end of delete cookies
	
	public static function createSession($username, $userid, $token, $serial){
        // run session if not running
        func::runSession();
        // set session variables
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        $_SESSION['token'] = $token;
        $_SESSION['serial'] = $serial;
    }
	#end of create session
	
	public static function generateToken($len){
        // NB: keep all tokens 164 characters long
        $charLibrary = "1=qay2-ws!x3edc4rfv5tgb6zhn7ujm8ik9olp_AQWSXEDCVFRTGBNHYZUJMKILOP.";
        
        return substr(str_shuffle($charLibrary), 0, $len);
    }
    # end of generate token
}


