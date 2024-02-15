
/** op-module-reference:/webpack/menu-right.js
 *
 * @created   2024-02-14
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
if( typeof $OP.Reference.List === 'undefined' ){
	$OP.Reference.List = {};
}
//	...
if( typeof $OP.Reference.List.Click === 'undefined' ){
	//	...
	async function Path(elem){
		//	...
		var path = elem.getAttribute('data-path');
		//	...
		history.pushState(null, null, `/reference/${path}`);
		//	...
		if( elem.getAttribute('data-md') === "true" ){
			path = '';
		}
		//	...
		return path;
	}

	//	...
	async function Json(path){
		//	...
		if( path === '' ){
			return [];
		}
		//	...
		const URL      = `/reference/api/list/?path=${path}`;
		const response = await fetch(URL);
		const json     = await response.json();
		console.log(URL, json);
		//	...
		if( json.errors ){
			console.error(json.errors);
		}
		//	...
		return json.result ?? [];
	}

	//	...
	async function List(elem, json){
		//	...
		if( json.length === 0 ){
			return;
		}
		//	...
		const path = elem.getAttribute('data-path');
		const ol   = document.createElement('ol');
		elem.appendChild(ol);
		//	...
		json.forEach(function(item){
			//	...
			var data_path = path + item.name + (item.dir ? '/':'');
			var li = document.createElement('li');
				li.innerText = item.name;
				li.setAttribute('data-path', data_path);
				li.setAttribute('data-md'  , item.md);
				li.setAttribute('data-dir' , item.dir);
			ol.appendChild(li);
		});
	};

	//	...
	$OP.Reference.List.Click = async function(elem){
		//	...
		const path = await Path(elem);
		const json = await Json(path);
					 await List(elem, json);
		//	...
		$OP.Reference.File();

		//	...
		if( 1 ){
			return;
		}

		console.log(elem);
		//	...
		var ol = elem.querySelector('ol');
		if( ol ){
			return;
		}else{
			ol = document.createElement('ol');
			elem.appendChild(ol);
		}
		//	...
		var meta = elem.getAttribute('data-meta');
		var dir  = elem.getAttribute('data-dir');
		var md   = elem.getAttribute('data-md');
		var name = elem.innerText;
		if( name === meta ){
			name = '';
		}
		if( md === "true" ){
			return;
		}
		//	...
		const URL      = `/reference/api/list/?meta=${meta}&name=${name}`;
		const response = await fetch(URL);
		      json     = await response.json();
		console.log(URL, json);
		//	...
		if( json.errors ){
			console.error(json.errors);
		}
		if(!json.result ){
			return;
		}
		json.result.forEach(function(item){
			//console.log(item);
			var li = document.createElement('li');
				ol.appendChild(li);
				li.innerText = item.name;
				li.setAttribute('data-meta', meta);
				li.setAttribute('data-md'  , item.md);
				li.setAttribute('data-dir' , item.dir);
			if( item.md === false ){
				console.log(item.md, (item.md === false));
				li.addEventListener('click', function(e){ $OP.Reference.List.Click( e.target ); }, true);
			}
		});
	};
}

//	...
document.addEventListener('DOMContentLoaded', function(){
	document.querySelector('#menu-right ol').addEventListener('click', function(e){
		$OP.Reference.List.Click( e.target );
	}, true);
});
