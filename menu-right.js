
/** op-module-reference:/menu-right.js
 *
 * @created   2023-03-31
 * @version   1.0
 * @package   op-module-reference
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
document.addEventListener('DOMContentLoaded', async function(){
    //  ...
    document.querySelectorAll('[data-open="false"]').forEach(function(node){
        node.addEventListener('click', function(e){
            switch(e.target.dataset.open){
                case 'true':
                    open = 'false';
                    break;
                case 'false':
                    open = 'true';
                    break;
                default:
            };

            //  ...
            e.target.dataset.open = open;
        });
    });

    //  ...
    document.querySelectorAll('[data-md]').forEach(function(node){
        node.addEventListener('click', function(e){
            //  ...
            let md = e.target.dataset.md;
            //  ...
            fetch(`/reference/api/?md=${md}`)
                .then(response => response.json())
                .then(json => {
                    $OP.Markdown(json.result.markdown);
                }
            );
        });
    });
});
