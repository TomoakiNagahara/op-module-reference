"Meta Path" and "Meta URL"
===

 "Meta Path" and "Meta URL" is abstract the location.

## Meta URL

 Regardless of the directory where the app is installed, the full path can be obtained by abstracting the path.

```php
//  Document root URL.
$doc_root = $app->URL('doc:/'); // --> /

//  Application root URL.
$app_root = $app->URL('app:/'); // --> /my_app/
```

You can also use JavaScript.

```js
var app_root = $OP.URL('app:/'); // --> /my_app/
```

 Not FQDN, and Added slash to end of URL.

## Meta Path

 "Meta Path" is can be obtained the full file system path by abstracting the path.

```
<?php
//  Get document root path.
OP\ConvertPath('doc:/foo/bar') // --> /var/html/htdocs/

//  Get Application root path.
OP\ConvertPath('app:/foo/bar') // --> /var/html/htdocs/my_app/foo/bar/
```

## Already setted meta definition

<div data-i18n="false">

 * op:/
 * app:/
 * unit:/
 * asset:/
 * layout:/
 * template:/

</div>

## An arbitrary path

 You can set an arbitrary path.

```
<?php
//	Set an arbitrary path.
RootPath('hoge', __DIR__);

//	Convert meta url.
D( OP\ConvertURL('hoge:/foo/bar') );
```
