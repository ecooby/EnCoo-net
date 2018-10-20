<?

/**
* @author enCoo Developments © Vladyslav Halimskyi 2018
* @package enCoo/Core/Functions
*/

class Funcs {
	public $DB;
	public static function getOption($option) {
		$DB = new DB();
		$query = "SELECT * FROM `ec_settings` WHERE `op_name` = '".$option."'";
		$query = $DB->query($query);
		$row = $DB->fetchAssoc($query);
		return $row['value'];
	}
	public static function getPageData($page) {
		$DB = new DB();
		$query = "SELECT * FROM `ec_pages` WHERE `url` = '".$page."'";
		if($query = $DB->query($query)) {
			$row = $DB->fetchAssoc($query);
			return $row;
		} else 
			return false;
	}

	private function getNavItems() {
		$array = array();
		$DB = new DB();
		$query = $DB->query("SELECT * FROM `ec_navigation_items` ORDER BY `id`");
		while ($row = $DB->fetchAssoc($query)) {
			if($row['hide'] === '0') {
				array_push($array, array($row['url'], $row['text']));
			}
		}
		return $array;
	}

	private function getFooter() {
		return file_get_contents(ROOT.'/ec-tpl/'.$this->getOption('template').'/contents/overall/footer.tpl');
	}
	public function getContentPage($page, $file=null) {
		if(!strlen($file)) {
			$file = 'content';
		}
		$fileurl = ROOT.'/ec-tpl/'.$this->getOption('template').'/contents/'.$page.'/'.$file.'.tpl';
		if(file_exists($fileurl))
			return file_get_contents($fileurl);
		else
			return $this->getContentPage('404');
	}

	public function langList() {
		$array_list = array();

	    if($handle = opendir($this->getOption('lang_dir'))) {
	        while($entry = readdir($handle)) {
            	if($entry != "." && $entry != "..") {
	            	$entry = explode('.', $entry);
	            	array_push($array_list, $entry[0]);
	            }
	        }
	       
	        closedir($handle);
	    }
		return $array_list;
	}
	public function Analytics($url, $type, $code=null) {
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
	    	$ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else 
		    $ip = $_SERVER['REMOTE_ADDR'];
		if($code == null) {
			if(isset($_COOKIE['ec_uId']))
				$code = '#1-1/0/0/0';
			else
				$code = '#1-0/0/0/0';
		} $info = array(
			'url' => $_SERVER['SERVER_NAME'].'/'.$url,
			'datetime' => date('Y-m-d-H-i-s', time()),
			'ip' => $ip,
			'type' => $type,
			'code' => $code.':'.EC_DEBUG
		);
		//$DB = new DB();
		//$query = "INSERT INTO `ec_analysis` VALUES (NULL, '".$info['type']."', '".$info['ip']."', '".$info['datetime']."', '".$info['code']."', '".$info['url']."')";
		//$date = '['.$info['datetime'].']';
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = 'log.php';
		if(file_exists(ROOT.'/ec-plugins/ec-base/logs/'.$file))
			return file_put_contents(ROOT.'/ec-plugins/ec-base/logs/'.$file, json_encode($info).'*'.PHP_EOL, FILE_APPEND);
	}

	public function getContent($page, $pfile=null) {
		$file = file_get_contents(ROOT.'/ec-tpl/'.$this->getOption('template').'/template.tpl');
		$file = str_replace('%{ec_template}%', $this->getOption('template'), $file);
		$navItems = array();
		$navItems = $this->getNavItems();
		$i = 0;
		$ec_items = '';
		foreach ($navItems as $navIt) {
			$ec_items_f = file_get_contents(ROOT.'/ec-tpl/'.$this->getOption('template').'/contents/overall/header.item.tpl');
			$ec_items_f = str_replace('%{header list ec_url}%', $navItems[$i][0], $ec_items_f);
			$ec_items_f = str_replace('%{header list ec_text}%', $navItems[$i][1], $ec_items_f);
			$i++;
			$ec_items .= $ec_items_f;
		}
		$file = str_replace('%{header ec_items}%', $ec_items, $file);
		$file = str_replace('%{ec_footer}%', $this->getFooter(), $file);
		$file = str_replace('%{header logo}%', $this->getOption('title'), $file);
		$file = str_replace('%{ec_content}%', $this->getContentPage($page, $pfile), $file);
		return $file;
	}
}