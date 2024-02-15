
/** op-module-reference:/reference-file.js
 *
 * @created   2024-02-08
 * @version   1.0
 * @package   op-module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

//	...
if( typeof $OP === 'undefined' ){
	$OP = {};
}

//	...
if( typeof $OP.Reference === 'undefined' ){
	$OP.Reference = {};
}

//	...
if( typeof $OP.Reference.File === 'undefined' ){
	$OP.Reference.File = async function($path){
		//	...
		const URL      = "./api/file/" + '?path=' + $path;
		const response = await fetch(URL);
		const json     = await response.json();

		//	...
		document.getElementById('markdown').innerHTML = marked.parse(json.result);
	};
}

//	...
document.addEventListener('DOMContentLoaded', function(){
	$OP.Reference.File('');
});
