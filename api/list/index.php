<?php
/** op-module-reference:/api/list/index.php
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

//	...
$request = OP()->Api()->Request();
$meta = $request['meta'] ?? null;
$name = $request['name'] ?? null;
//$dir  = $request['dir'];

//	...
if(!$meta ){
	OP()->Api()->Error("Empty meta.");
}else{
	//	...
	if( $meta === 'core' ){
		$path = "{$meta}:/reference/*";
	}else{
		$path = $name ? "{$meta}:/{$name}/reference/*": "{$meta}:/*";
	}
	D($path);

	//	...
	if( $path = OP()->MetaPath($path) ){
		foreach( glob($path) as $path ){
			$name = basename($path);
			list($name, $ext) = explode('.', $name);
			$result[] = [
				'dir'  => is_dir($path),
				'name' => $name,
				'md'   => ($ext === 'md') ? true: false,
			];
		}
	}
	D($path);
}

//	...
OP()->Api()->Result($result ?? []);

//	...
OP()->Api()->Out();
