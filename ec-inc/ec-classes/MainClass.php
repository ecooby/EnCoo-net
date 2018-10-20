<?
/**
* @author enCoo Developments © Vladyslav Halimskyi 2018
* @package enCoo/Classes/Main
*/


class MainClass {
	private function tpl() {
		$core = new Core();
		return $core->getTpl();
	}
	public function actionIndex() {
		$funcs = new Funcs();
		$file = $funcs->getContent('main', 'new.item');
		echo $file;
		return true;
	}
}