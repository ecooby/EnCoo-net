<?
class LangCore {
	public static function LangEngine($file, $page) {
		$file = str_replace('{VIS_TOD}', VIS_TOD, $file);
		$file = str_replace('{UNI_VIS_TOD}', UNI_VIS_TOD, $file);
		$file = str_replace('{VIS_WEEK}', VIS_WEEK, $file);
		$file = str_replace('{AUTHS_TOD}', AUTHS_TOD, $file);
		$file = str_replace('{REGS_TOD}', REGS_TOD, $file);
		//
		$file = str_replace('{AUTH_SUCCESS}', AUTH_SUCCESS, $file);
		$file = str_replace('{AUTH_ERROR}', AUTH_ERROR, $file);
		$file = str_replace('{AUTH_ERROR_NO_POST}', AUTH_ERROR_NO_POST, $file);
		//
		$file = str_replace('{NAVBAR_ITEM_HOME}', NAVBAR_ITEM_HOME, $file);
		$file = str_replace('{NAVBAR_ITEM_SETTINGS}', NAVBAR_ITEM_SETTINGS, $file);
		$file = str_replace('{NAVBAR_ITEM_MAIL}', NAVBAR_ITEM_MAIL, $file);
		$file = str_replace('{NAVBAR_ITEM_CONSOLE}', NAVBAR_ITEM_CONSOLE, $file);
		$file = str_replace('{NAVBAR_ITEM_PLUGINS}', NAVBAR_ITEM_PLUGINS, $file);
		$file = str_replace('{NAVBAR_ITEM_NEWS}', NAVBAR_ITEM_NEWS, $file);
		$file = str_replace('{NAVBAR_ITEM_PAGES}', NAVBAR_ITEM_PAGES, $file);
		$file = str_replace('{NAVBAR_ITEM_NAV}', NAVBAR_ITEM_NAV, $file);
		$file = str_replace('{NAVBAR_ITEM_DOCS}', NAVBAR_ITEM_DOCS, $file);
		$file = str_replace('{NAVBAR_ITEM_MYCOGS}', NAVBAR_ITEM_MYCOGS, $file);
		$file = str_replace('{NAVBAR_ITEM_DOCUMENTATION}', NAVBAR_ITEM_DOCUMENTATION, $file);
		$file = str_replace('{NAVBAR_ITEM_NAVIGATION}', NAVBAR_ITEM_NAVIGATION, $file);
		//
		$file = str_replace('{WEBSITE_SETTS}', WEBSITE_SETTS, $file);
		$file = str_replace('{PROJ_NAME}', PROJ_NAME, $file);
		$file = str_replace('{SITE_TAGS}', SITE_TAGS, $file);
		$file = str_replace('{SITE_LANG}', SITE_LANG, $file);
		$file = str_replace('{SITE_CATEG}', SITE_CATEG, $file);
		$file = str_replace('{SITE_TPL}', SITE_TPL, $file);
		$file = str_replace('{SITE_HOME}', SITE_HOME, $file);
		$file = str_replace('{SITE_LIC}', SITE_LIC, $file);
		$file = str_replace('{SITE_DOMAIN}', SITE_DOMAIN, $file);
		//
		$file = str_replace('{MAIL_POFS}', MAIL_POFS, $file);
		$file = str_replace('{MAIL_CREATE_BTN}', MAIL_CREATE_BTN, $file);
		$file = str_replace('{MAIL_CREATEPROF_BTN}', MAIL_CREATEPROF_BTN, $file);
		$file = str_replace('{MAIL_CREATE_SUBJECT}', MAIL_CREATE_SUBJECT, $file);
		$file = str_replace('{MAIL_CREATE_PLACEHOLDER_NAME}', MAIL_CREATE_PLACEHOLDER_NAME, $file);
		$file = str_replace('{MAIL_CREATE_PLACEHOLDER_DESC}', MAIL_CREATE_PLACEHOLDER_DESC, $file);
		//
		$file = str_replace('{PLUGS_LIST}', PLUGS_LIST, $file);
		$file = str_replace('{PLUGS_IMP}', PLUGS_IMP, $file);
		//
		$file = str_replace('{PASS_SETTS}', PASS_SETTS, $file);
		$file = str_replace('{U_PASS}', U_PASS, $file);
		$file = str_replace('{NEW_PASS}', NEW_PASS, $file);
		$file = str_replace('{C_NEW_PASS}', C_NEW_PASS, $file);
		$file = str_replace('{SET_IMAGE}', SET_IMAGE, $file);
		$file = str_replace('{DEL_IMAGE}', DEL_IMAGE, $file);
		$file = str_replace('{HELP_TEXT}', HELP_TEXT, $file);
		//
		$file = str_replace('{O_PROFILE}', O_PROFILE, $file);
		$file = str_replace('{O_LOGOUT}', O_LOGOUT, $file);
		$file = str_replace('{O_CONF}', O_CONF, $file);
		$file = str_replace('{O_CANC}', O_CANC, $file);
		$file = str_replace('{O_SEL}', O_SEL, $file);
		$file = str_replace('{O_DEL}', O_DEL, $file);
		$file = str_replace('{O_DATE}', O_DATE, $file);
		$file = str_replace('{O_LOGIN}', O_LOGIN, $file);
		$file = str_replace('{O_UPDATE}', O_UPDATE, $file);
		$file = str_replace('{O_VERSION}', O_VERSION, $file);
		$file = str_replace('{O_NAME}', O_NAME, $file);
		$file = str_replace('{O_COGS}', O_COGS, $file);
		$file = str_replace('{O_ICON}', O_ICON, $file);
		$file = str_replace('{O_AVA}', O_AVA, $file);
		$file = str_replace('{O_EMAIL}', O_EMAIL, $file);
		$file = str_replace('{O_BIRTHD}', O_BIRTHD, $file);
		$file = str_replace('{O_SEND_MESS}', O_SEND_MESS, $file);
		$file = str_replace('{O_SEND}', O_SEND, $file);
		$file = str_replace('{O_SEND_TITLE}', O_SEND_TITLE, $file);
		$file = str_replace('{O_SEND_SUBJ}', O_SEND_SUBJ, $file);
		$file = str_replace('{O_SEND_TO}', O_SEND_TO, $file);
		$file = str_replace('{O_SEND_SEE_MESS}', O_SEND_SEE_MESS, $file);
		$file = str_replace('{O_ONLINE}', O_ONLINE, $file);
		$file = str_replace('{O_PAGE_NOT_404}', O_PAGE_NOT_404, $file);
		return $file;
	}
}