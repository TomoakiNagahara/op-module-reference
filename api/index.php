<?php
/**
 * module-reference:/api/index.php
 *
 * @created   2019-03-29
 * @version   1.0
 * @package   module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-20
 */
namespace OP;

/* @var $app UNIT\App */
/* @var $api UNIT\Api */

//	...
$api = $app->Unit('Api');

//	...
list($catg, $file) = explode('-', ($app->Request()['md'] ?? null) .'-' );

//	...
switch( $catg ){
	case 'core':
		$path = ConvertPath( ($file ? "op:/readme/{$file}.md":'op:/README.md') );
		break;

	case 'unit':
		$path = ConvertPath("unit:/{$file}/README.md");
		break;

	case 'javascript':
		$path = ConvertPath("app:/webpack/js/op/README.md");
		break;

	default:
	case 'app':
		if( $file ){
			$path = ConvertPath("asset:/readme/{$file}.md");
		}else{
			$path = ConvertPath('app:/README.md');
		};
	break;
};

//	...
if( empty($path) ){
	$api->Set('markdown', "File path is empty.");
}else if( 'md' !== ($ext = substr($path, strpos($path, '.')+1)) ){
	$api->Set('markdown', "File extension has not match. ($ext)");
}else if( file_exists($path) ){
	$api->Set('markdown', file_get_contents($path));
}else{
	$api->Set('markdown', "This readme file has not been exists. ({$catg}, {$file})");
};

//	...
$api->Out();
