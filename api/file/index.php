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

//	...
$request = OP()->Request();

//	...
if(!$path = $request['path'] ?? null ){
	$path = 'reference:/README.md';
}else{
	/* @var $match array */
	if(!preg_match('|^([a-z]+):/([^/]*)/?(.*)|', $path, $match) ){
		//	...
		OP()->Api()->Error("Unmatch path. ($path)");
	}else{
		//	...
		$meta = $match[1] ?? null;
		$name = $match[2] ?? null;
		$file = $match[3] ?? null;

		//	...
		if( $meta === 'core' ){
			if(!$name ){
				$path = "{$meta}:/README";
			}else{
				$path = $file ? "{$meta}:/reference/{$name}/{$file}": "{$meta}:/reference/{$name}";
			}
		}else if( $name ){
			//	Unit, Layout, Module
			$path = $file ? "{$meta}:/{$name}/reference/{$file}": "{$meta}:/{$name}/README";
		}else{
			$path = '';
		}
	}
}

//	...
if(!$path){
	//	...
}else if(!$real_path = OP()->MetaPath($path) ){
	//	...
	OP()->Api()->Error("Can not convert this path. ($path)");
}else{
	//	...
	$real_path .= '.md';

	//	...
	if(!file_exists($real_path) ){
		//	...
		OP()->Api()->Error("File does not exists. ($real_path)");
	}else{
		//	...
		OP()->Api()->Result( file_get_contents($real_path) );
	}
}

//	...
OP()->Api()->Out();
