# Contribution Guide

This project adheres to the following standards and practices.

## Versioning

We version under the [Semantic Versioning](http://semver.org/) guidelines as much as possible.

Releases will be numbered with the following format:

`<major>.<minor>.<patch>`

And constructed with the following guidelines:

* Breaking backward compatibility bumps the major (and resets the minor and patch)
* New additions without breaking backward compatibility bumps the minor (and resets the patch)
* Bug fixes and misc changes bumps the patch

## Coding Styles

Cartalyst follows the [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md) and [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) coding standards. In addition to these standards, below is a list of other coding standards that should be followed:

- Namespace declarations should be on the same line as `<?php`.
- Class opening `{` should be on the same line as the class name.
- Function and control structure opening `{` should be on a separate line.
- Interface names are suffixed with `Interface` (`FooInterface`)
- Use tabs instead of 4 spaces.

## Cartalyst Contribution Guide

This page contains guidelines for contributing to the Cartalyst packages. Please review these guidelines before submitting any pull requests to the package.

### Which Branch?

**ALL** bug fixes should be made to the branch which they belong. Bug fixes should never be sent to the `master` branch unless they fix features that exist only in the upcoming release.

### Pull Requests

The pull request process differs for new features and bugs. Before sending a pull request for a new feature, you should first create an issue with `[Proposal]` in the title. The proposal should describe the new feature, as well as implementation ideas. The proposal will then be reviewed and either approved or denied. Once a proposal is approved, a pull request may be created implementing the new feature. Pull requests which do not follow this guideline will be closed immediately.

Pull requests for bugs may be sent without creating any proposal issue. If you believe that you know of a solution for a bug that has been filed, please leave a comment detailing your proposed fix.

### Feature Requests

If you have an idea for a new feature you would like to see added to the package, you may create an issue with `[Request]` in the title. The feature request will then be reviewed by a core contributor.
