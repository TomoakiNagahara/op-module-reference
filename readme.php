<?php
/**
 * module-referencet:/readme.php
 *
 * @creation  2018-11-01
 * @version   1.0
 * @package   module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @creation  2019-04-04
 */
namespace OP;

/* @var $app UNIT\App */

//	...
Env::Mime('text/plain');

//	...
$app->Layout(false);

//	...
$args = $app->Args();

//	...
switch( $args[0] ){
	case 'core':
		echo 'not ready yet...';
		break;

	case 'unit':
		//	...
		$path = ConvertPath("app:/asset/unit/{$args[1]}/README.md");

		//	...
		if(!file_exists($path) ){
			echo "Has not been exists README file.";
			return;
		}

		//	...
		echo file_get_contents($path);

		//	...
		break;

	default:
		var_dump($args);
};
