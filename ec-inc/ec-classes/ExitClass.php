<?

	class ExitClass {
		public function actionExit() {
			$funcs = new Funcs();
			$file = $funcs->getContent('404');
			echo $file;
			return true;
			return true;
		}
	}