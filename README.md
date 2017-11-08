# A standard PHP project skeleton

[![Latest Stable Version](https://poser.pugx.org/josantonius/php-skeleton/v/stable)](https://packagist.org/packages/josantonius/php-skeleton) [![Latest Unstable Version](https://poser.pugx.org/josantonius/php-skeleton/v/unstable)](https://packagist.org/packages/josantonius/php-skeleton) [![License](https://poser.pugx.org/josantonius/php-skeleton/license)](LICENSE) [![Total Downloads](https://poser.pugx.org/josantonius/php-skeleton/downloads)](https://packagist.org/packages/josantonius/php-skeleton) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/)

[Versión en español](README-ES.md)

This project was created in order to provide project skeleton to start new PHP project.

---

- [Requirements](#requirements)
- [Create project](#create-project)
- [Composer scripts](#composer-scripts)
- [TODO](#-todo)
- [Contribute](#contribute)
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

 * phpunit.xml for [phpunit](http://phpunit.de/manual/current/en/index.html)
 * phpmd.xml for [PHPMD](https://phpmd.org)
 * phpcs.xml for [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)
 * .php_cs for [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
 * .travis.yml for [Travis CI](https://travis-ci.org/)

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

## ☑ TODO

- [ ] Improve documentation

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/PHP-Skeleton/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.
