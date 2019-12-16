<?php
/**
 * module-reference:/marked/index.php
 *
 * @created   2019-04-04   app-skeleton-2019-nep:/vendor/marked/index.php
 * @copied    2019-12-16   app-skeleton-2019-nep:/vendor/marked/index.php --> module-reference:/marked/index.php
 * @version   1.0
 * @package   module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	...
Env::Mime('text/javascript');

//	...
echo file_get_contents(__DIR__.'/marked.min.js');
