<?php
/**
 * module-reference:/index.php
 *
 * @created   2018-10-30
 * @updated   2019-03-29
 * @version   1.0
 * @package   module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Namespace
 *
 */
namespace OP;

/* @var $app \OP\UNIT\App */

/*
//	Check if has slash of end of url.
if( $_SERVER['DOCUMENT_ROOT'] === dirname($app->URL($app->Unit('Router')->EndPoint())) ){
	$app->Unit('Http')->Location($_SERVER['REDIRECT_URL'].'/', 301);
};
*/

//	...
$root_path = dirname( Unit::Singleton('Router')->EndPoint() );

//	...
RootPath('reference', $root_path);

//	...
$app->Template('index.phtml');
