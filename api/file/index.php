<?php
/** op-module-reference:/api/file/index.php
 *
 * @created   2024-02-07
 * @version   1.0
 * @package   op-module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

 /** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP\MODULE\REFERENCE;

//	...
include('../common.php');

/* @var $api \OP\UNIT\Api */
$api = OP()->Api();

//	...
$request = $api->Request();

//	...
if(!$path = $request['path'] ?? null ){
	$path = 'reference:/README.md';
}

//	...
$content = file_get_contents( OP()->MetaPath($path) );

//	...
$api->Result( $content );

//	...
$api->Out();
