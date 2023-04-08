/**
 * module-reference:/reference.js
 *
 * @created   2019-04-03
 * @version   1.0
 * @package   module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
//	...
document.addEventListener('DOMContentLoaded', async function(){
    //  ...
    if( typeof marked === 'undefined' ){
        console.log('marked is undefined');
        return;
    }

    //  ...
    marked.setOptions({
        gfm:         true,
        tables:      true,
        breaks:      false,
        /*
        pedantic:    false,
        smartLists:  true,
        smartypants: false,
        sanitize:    true,
        langPrefix: 'language-',
        highlight:   function(code, lang) {
            return   code;
        }
        */
    });

    //  ...
    fetch('/reference/api/')
        .then(response => response.json())
        .then(json => {
            $OP.Markdown(json.result.markdown);
        }
    );

    //  ...
    $OP.Markdown = function(markdown){
        //  ...
        let node = document.querySelector('#markdown');
        let html = marked.parse(markdown);

        //  Remove LF code.
        while( html.search(/>\n/) !== -1 ){
            html = html.replace(">\n",'>');
        }
        
        //  ...
        node.innerHTML = html;
    }

    /*
	//	...
	function fetch(md){
		//	...
		var url  = "<?= dirname($_SERVER['REQUEST_URI']) . '/api/' ?>";
		var data = {};
			data.md = md;

		//	...
		$OP.Ajax.Post(url, data, function(json){

			//	...
			var dom = document.querySelector('#markdown');
			if(!dom ){
				return;
			};

			//	...
			dom.innerHTML = marked( json.result.markdown );

			//	...
			touch();

		}, function(e){
			console.error(e);
		});
	};

	//	...
	function touch(){
		var doms = document.querySelectorAll('#markdown h1, #markdown h2, #markdown h3, #markdown p, #markdown li, #markdown b, #markdown i');
		for(var dom of doms ){
			//	If already set.
			if( dom.dataset.i18n === 'false' ){
				continue;
			};

			//	If parents node is disabled.
			if( if_parents(dom.parentNode) ){
				continue;
			};

			//	...
			dom.dataset.i18n   = 'true';
			dom.dataset.locale = 'en:US';
		};

		//	...
		if( $OP && $OP.i18n && $OP.i18n.Translate ){
			$OP.i18n.Translate();
		}
	};

	//	...
	function if_parents(node){
		//	...
		if(!node.dataset ){
			return false;
		};

		//	...
		if( node.dataset.i18n === 'false' ){
			return true;
		};

		//	...
		return if_parents( node.parentNode );
	};

	//	...
	document.querySelectorAll('#menu-right [data-md]').forEach(function(elem){
		elem.addEventListener('click', function(event){
			//	...
			var md = event.target.dataset.md;

			//	...
			fetch(md);

			//	...
			history.pushState(null,null,md);
		});
	});

	//	...
	var match = location.href.match(/[^\/]+$/);
	var md    = match ? match[0]: 'app';

	//	...
	fetch(md);
    */
});
