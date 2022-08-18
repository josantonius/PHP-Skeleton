# A standard PHP project skeleton

[![Latest Stable Version](https://poser.pugx.org/josantonius/php-skeleton/v/stable)](https://packagist.org/packages/josantonius/php-skeleton)
[![License](https://poser.pugx.org/josantonius/php-skeleton/license)](LICENSE)

[Versión en español](README-ES.md)

This project was created in order to provide project skeleton to start new PHP project.

---

- [Requirements](#requirements)
- [Create project](#create-project)
- [Composer scripts](#composer-scripts)
- [License](#license)

---

## Requirements

This project is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Create project

You'll need [Composer](http://getcomposer.org/download/).

```
composer create-project josantonius/php-skeleton {project-path}
```

[![asciicast](https://asciinema.org/a/146511.png)](https://asciinema.org/a/146511)

Various config files are ready for continuous integration.

- phpunit.xml for [phpunit](http://phpunit.de/manual/current/en/index.html)
- phpmd.xml for [PHPMD](https://phpmd.org)
- phpcs.xml for [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)
- .php_cs for [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
- .travis.yml for [Travis CI](https://travis-ci.org/)

## Composer scripts

### tests

`composer tests` run [`phpcs`](https://github.com/squizlabs/PHP_CodeSniffer), [`phpmd`](https://github.com/phpmd/phpmd) and [`phpunit`](https://github.com/sebastianbergmann/phpunit). Run `phpunit` for unit test only.

```
composer tests
```

### fix

`composer fix` run [`php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) and [`phpcbf`](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Fixing-Errors-Automatically) to fix up the PHP code to follow the coding standards.

```
composer fix
```

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2013, [Koriym](https://github.com/koriym)

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
