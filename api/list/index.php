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
$request = OP()->Request();
$path = $request['path'] ?? null;

//	...
if(!$path ){
	//	...
	OP()->Api()->Error("Empty path.");
}else{
	/* @var $match array */
	if(!preg_match('|^([a-z]+):/(.*)|', $path, $match) ){
		//	...
		OP()->Api()->Error("Unmatch path. ($path)");
	}else{
		//	...
		$meta = $match[1];
		$name = $match[2] ?? '';

		//	...
		if( $meta === 'core' ){
			$path = $name ? "{$meta}:/reference/{$name}/*": "{$meta}:/reference/*";
		}else{
			$path = $name ? "{$meta}:/{$name}/reference/*": "{$meta}:/*";
		}

		//	...
		if(!$path = OP()->MetaPath($path) ){
			//	...
			OP()->Api()->Error("Can not convert this path. ($path)");
		}else{
			foreach( glob($path) as $path ){
				$name = basename($path);
				list($name, $ext) = explode('.', $name.'.');
				$result[] = [
					'dir'  => is_dir($path),
					'name' => $name,
					'md'   => ($ext === 'md') ? true: false,
				];
			}
		}
	}
}

//	...
OP()->Api()->Result($result ?? []);

//	...
OP()->Api()->Out();
