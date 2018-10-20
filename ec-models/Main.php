<?
class Main {
	public static function getAdmins() {
		$DB = new DB();
		$query = $DB->query("SELECT * FROM `ec_admins` WHERE `id` = '1'");
		return $DB->fetchAssoc($query);
	}
	public static function getNewsList() {
		
	}
}