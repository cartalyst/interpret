## Installation

Cartalyst packages utilize [Composer](http://getcomposer.org), for more information on how to install Composer please read the [Composer Documentation](https://getcomposer.org/doc/00-intro.md).

### Preparation

Open your `composer.json` and add the following to the `require` array:

	"cartalyst/interpret": "1.1.*"

> **Note:** Make sure that after the required changes your `composer.json` file is valid by running `composer validate`.

### Install the dependencies

Run Composer to install or update the new requirement.

	composer install

or

	composer update

> **Note:** We're assuming you have Composer installed Globally.

Now you are able to require the `vendor/autoload.php` file to autoload the package.
