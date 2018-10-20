<?
	class PageClass {
		public function actionIndex($page) {
			if(isset($page)) {
				$funcs = new Funcs();
				$pageData = array();
				if($pageData = $funcs->getPageData($page)) {
					$file = $funcs->getContent('page');
					$file = str_replace('%{ec_page title}%', $pageData['title'], $file);
					$file = str_replace('%{ec_page content}%', $pageData['content'], $file);
				} else
					$file = $funcs->getContent('404');
				echo $file;

			}
			return true;
		}
	}