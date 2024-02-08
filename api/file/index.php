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
$path = OP()->Request('path');

//	...
$result = $path;

//	...
OP()->Api()->Result($result);

//	...
OP()->Api()->Out();
