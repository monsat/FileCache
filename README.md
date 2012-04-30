FileCache
=========

FileCache Plugin - read cache file if is not expired

## USAGE
```php
# app/Config/bootstrap.php
CakePlugin::load('FileCache');
```

```php
App::uses('FileCache', 'FileCache.Lib');
```

```php
$file = new FileCache($filename);
$file->duration = '+4 hours'; // optional. default +1 hours
$content = $file->read();
if (!$content) {
  $content = 'some content';
  $file->write($content);
}
```
