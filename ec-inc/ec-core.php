<?
/**
* @package eCooby/Core
*/
class Core {
	private $routes, $funcs, $plugins;
	public function __construct() {
		$this->plugins = array();
		$filelist = glob("./ec-plugins/*", GLOB_ONLYDIR);
		for ($i=0; $i < count($filelist); $i++) { 
		    $filelist[$i] = explode('/', $filelist[$i]);
		    array_push($this->plugins, $filelist[$i][2]);
		}
		$routesPath = ROOT.'/ec-inc/ec-config/ec-routes.php';
		$this->routes = include($routesPath);
		for ($i=0; $i < count($this->plugins); $i++) { 
		    if(file_exists(ROOT.'/ec-plugins/'.$this->plugins[$i].'/__router.php')) {
				include(ROOT.'/ec-plugins/'.$this->plugins[$i].'/__router.php');
			} 
		}
		$this->routes[''] = 'error';
	}

	private function getURI() {
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	public function getTpl() {
		$funcs = new Funcs();
		return $funcs->getOption('template');
	}
	public function Analytics($url, $type) {
		$funcs = new Funcs();
		return $funcs->Analytics($url, $type);
	}
	public function run() {
		$funcs = new Funcs();
		$uri = $this->getURI();
		if(strlen($uri) < 1) {
			$uri = 'index';
		}
		foreach ($this->routes as $uriPattern => $path) {
			if(preg_match("~$uriPattern~", $uri)) {
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$this->Analytics($uri, 1);
				$segments = explode('/', $internalRoute);

				$classFire = array_shift($segments);
				$className = $classFire.'Class';
				$className = ucfirst($className);

				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;

				$classDir = '/ec-inc/ec-classes/';
				$classFile = ROOT.$classDir.$className.'.php';

				if(file_exists($classFile)) {
					include_once($classFile);
				} else {
					$f=0;
					for ($i=0; $i < count($this->plugins); $i++) { 
					    if(file_exists(ROOT.'/ec-plugins/'.$this->plugins[$i].'/index.php')) {
							include_once(ROOT.'/ec-plugins/'.$this->plugins[$i].'/index.php');
							$f++;
						} 
					}
					if(!class_exists($className)) {
						$className = 'ExitClass';
						$actionName = 'actionExit';
						include_once(ROOT.'/ec-inc/ec-classes/'.$className.'.php');
					}
				}
				$classObject = new $className;

				// CALL ACTION
				$result = call_user_func_array(array($classObject, $actionName), $parameters);
				if($result != null) {
					break;
				}
			}
		}
	}
}