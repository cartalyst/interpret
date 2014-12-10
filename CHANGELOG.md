# Interpret Change Log

This project follows [Semantic Versioning](CONTRIBUTING.md).

## Proposals

We do not give estimated times for completion on `Accepted` Proposals.

- [Accepted](https://github.com/cartalyst/interpret/labels/Accepted)
- [Rejected](https://github.com/cartalyst/interpret/labels/Rejected)

---

### v1.1.1 - 2014-12-10

`REVISED`

- Change license to BSD-3.

### v1.1.0 - 2014-12-05

`ADDED`

- Unit tests.

`CHANGED`

- Autoloading to PSR4.
- `dflydev/markdown` to `michelf/markdown`
- Laravel Service Provider `Cartalyst\Interpret\InterpretServiceProvider` to `Cartalyst\Interpret\Laravel\InterpretServiceProvider`
- Laravel Facade `Cartalyst\Interpret\Facades\Interpreter` to `Cartalyst\Interpret\Laravel\Facades\Interpreter`

`REMOVED`

- HtmlContent

### v1.0.2 - 2014-12-10

`REVISED`

- Change license to BSD-3.

### v1.0.1 - 2013-06-14

`ADDED`

- Fixed a bug on the markdown interpreter.

### v1.0.0 - 2013-04-13

`ADDED`

- Render markdown content.
- Render html content.
- Render text.
