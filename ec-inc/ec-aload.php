<? 
/**
* @package eCooby/AutoloadClasses
*/
function __autoload($class) {
	$dir_paths = array(
		'/ec-models/',
		'/ec-inc/ec-classes/'
	);

	foreach ($dir_paths as $path) {
		$path = ROOT.$path.$class.'.php';
		if(is_file($path)) {
			include_once($path);
		}
	}
}
include_once('/ec-inc/langCore.php');
$funcs = new Funcs();
$lang = $funcs->getOption('site_lang');
$langDir = $funcs->getOption('dir_lang');
$langFile = $langDir.$lang.'.language.php';
if(file_exists($langFile)) {
	include_once($langFile);
} else {
	// connect english language from official website
}