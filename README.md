# cartalyst/interpret

Interpret is a drive-based content rendering package, with support for HTMl, Markdown & plain text. You can register custom drivers for custom content types.

As you pass content to interpret, it will determine what it is and allow you to extract it's normal value and HTML equivilent.

### Installation

Installation is as easy as adding the following to your composer.json:

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "http://packages.cartalyst.com"
        }
    ],
    "require": {
        "cartalyst/interpret": "1.0.*"
    }
}
```

### Laravel 4

Add `Cartalyst\Interpret\InterpretServiceProvider` to your service provider array and add the following to your class alias':

```php
'Interpreter' => 'Cartalyst\Interpret\Facades\Interpreter',
```

### Using Interpret

```
$interpreter = new Cartalyst\Interpret\Interpreter;

$content = $interpreter->make(<<<
# Hello there

1. Foo
2. Bar

MARKDOWN
    , 'md');

echo $content->getValue();
echo $content->toHtml();
```

#### In Laravel 4

```
$content = Interpreter::make('<h1>Foo</h1>', 'html');
echo $content->toHtml();
```

### Extending Interpret

We mentioned that interpret is drive based. Extending it with new content types is very easy. You just need to make a class which implements `Cartalyst\Interpret\Content\ContentInterface` and register it.s

```
clas TextileContent implements Cartalyst\Interpret\Content\ContentInterface {

    protected $value;

    /**
     * Creates a new content instance.
     *
     * @param  string  $value
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Returns the content's value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the HTML equivilent of the content.
     *
     * @return string
     */
    public function toHtml()
    {
        return however_you_convert_that_to_html($this->value);
    }

}

// First param is class name, second parram is file type(s) (string or array)
$interpreter->addContentMapping('TextileContent', 'textile');

// In Laravel
Interpreter::addContentMapping('TextileContent', 'textile');

// And use it
echo $interpreter->make('foo', 'textile')->toHtml();
```

Of course, we'd love a pull request with your new content type! We're planning on adding many content types, but if you have one which you think would be useful for the community, please do submit a pull request for it.
