<?
require_once('/classes/db.php');
$db = new db();
require_once('/classes/session.php');
require_once('/classes/user_class.php');

session_start();

if(!$_SESSION || !$_SESSION['session']): $_SESSION['session'] = new session; endif;
?>