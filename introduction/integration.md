## Integration

Cartalyst packages are framework agnostic and as such can be integrated easily natively or with your favorite framework.

### Laravel 4

The Interpret package has optional support for Laravel 4 and it comes bundled with a Service Provider and a Facade for easy integration.

After installing the package, open your Laravel config file located at `app/config/app.php` and add the following lines.

In the `$providers` array add the following service provider for this package.

```php
'Cartalyst\Interpret\InterpretServiceProvider',
```

In the `$aliases` array add the following facade for this package.

```php
'Interpreter' => 'Cartalyst\Interpret\Facades\Interpreter',
```

### Native

Integrating the package outside of a framework is incredible easy, just follow the example below.

```php
// Include the composer autoload file
require_once 'vendor/autoload.php';

// Import the necessary classes
use Cartalyst\Interpret\Interpreter;

// Instantiate the interpreter
$interpreter = new Interpreter;
```

The integration is done and you can now use all the available methods, here's an example:

```php
// Convert from markdown to html
echo $interpreter->make('## Hello', 'md')->toHtml();
```
