<?php
/** op-module-reference:/api/index.php
 *
 * @created   2019-03-29
 * @version   1.0
 * @package   op-module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-20
 */
namespace OP;

/* @var $app UNIT\App */

//	...
$json = [];
$json['status'] = true;
$json['errors'] = null;
$json['result'] = null;
$json['timestamp'] = OP::Timestamp();

//	...
if( $arg  = OP::Request()['md'] ?? null ){
    $args = explode('-', $arg);
}

//	...
switch( $args[0] ?? 'app' ){
    case 'reference':
        if(!$file = $args[1] ?? null ){
            $path = 'app:/reference/README.md';
        }else{
            $path = "app:/reference/reference/{$file}.md";
        }
        break;

    case 'app':
        if(!$file = $args[1] ?? null ){
            $path = 'app:/README.md';
        }else{
            $path = "asset:/reference/{$file}.md";
        }
        break;

    case 'core':
        if(!$file = $args[1] ?? null ){
            $path = 'core:/README.md';
        }else{
            $path = "asset:/core/reference/{$file}.md";
        }
        break;

    case 'unit':
        if(!$unit = $args[1] ?? null ){
            $path = '';
        }else if(!$file = $args[2] ?? null ){
            $path = "asset:/unit/{$unit}/README.md";
        }else{
            $path = "asset:/unit/{$unit}/reference/{$file}.md";
        }
		break;

	default:
};

//	...
if( empty($path) ){
    $markdown = "Does not correct argument. ({$arg})";
}else{
    //  ...
    $path = OP::MetaPath($path);

    //  ...
    if( file_exists($path) ){
        $markdown = file_get_contents($path);
    }else{
        $markdown = "Does not exists file. ({$path})";
    };
}

//	...
$json['result']['markdown'] = $markdown;

//	...
Env::Mime('text/json');

//	...
echo json_encode($json);
