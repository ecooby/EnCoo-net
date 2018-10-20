<?

class NewsClass {
	public function actionList() {
		$newsList = array();
		$newsList = News::getNewsList();

		echo '<pre>';
		print_r($newsList);
		echo '</pre>';
		return true;
	}
	public function actionView($category, $id) {
		echo 'Show one element: '.$category.' & id: '.$id;
		return true;
	}
}