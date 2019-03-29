<?php
/**
 * module-reference:/index.php
 *
 * @creation  2019-03-29
 * @version   1.0
 * @package   module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
/* @var $app \OP\UNIT\App */

//	...
$app->Unit('WebPack')->Auto(__DIR__.'/index.css');

//	...
$app->Template('index.phtml');
