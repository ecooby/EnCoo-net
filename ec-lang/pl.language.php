<?
	class LangConst {
		function __construct($def) {
			$lang_arr = array(
				'ERR' => 'Error',
				'' => ''
				/*'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => ''*/
			);
			return $lang_arr[$def];
		}
	}