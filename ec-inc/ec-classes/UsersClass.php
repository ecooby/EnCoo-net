<?

class UsersClass {
	private function tpl() {
		$core = new Core();
		return $core->getTpl();
	}
	public function actionLogin() {
		include_once(ROOT.'/ec-tpl/'.$this->tpl().'/login.html');
		return true;
	}
	public function actionRegister() {
		$core = new Core();
		include_once(ROOT.'/ec-tpl/'.$this->tpl().'/signup.html');
		return true;
	}
	public function actionCabinet($user = null) {
		$funcs = new Funcs();
		$file = $funcs->getContent('#', '#');
		echo $file;
		return true;
	}
}