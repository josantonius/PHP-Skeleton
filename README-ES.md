# Estructura estándar para proyectos PHP

[![Latest Stable Version](https://poser.pugx.org/josantonius/php-skeleton/v/stable)](https://packagist.org/packages/josantonius/php-skeleton)
[![License](https://poser.pugx.org/josantonius/php-skeleton/license)](LICENSE)

[English version](README.md)

Este proyecto fue creado con el fin de generar la estructura de archivos y directorios para iniciar un nuevo proyecto PHP.

---

- [Requisitos](#requisitos)
- [Crear proyecto](#crear-proyecto)
- [Composer scripts](#composer-scripts)
- [Licencia](#licencia)

---

## Requisitos

Este proyecto es soportado por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Crear proyecto

Necesitarás tener instalado [Composer](http://getcomposer.org/download/).

```
composer create-project josantonius/php-skeleton {project-path}
```

[![asciicast](https://asciinema.org/a/146511.png)](https://asciinema.org/a/146511)

Varios archivos de configuración estarán listos para integración continua.

- phpunit.xml para [phpunit](http://phpunit.de/manual/current/en/index.html)
- phpmd.xml para [PHPMD](https://phpmd.org)
- phpcs.xml para [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)
- .php_cs para [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
- .travis.yml para [Travis CI](https://travis-ci.org/)

## Composer scripts

### tests

`composer tests` ejecuta [`phpcs`](https://github.com/squizlabs/PHP_CodeSniffer), [`phpmd`](https://github.com/phpmd/phpmd) and [`phpunit`](https://github.com/sebastianbergmann/phpunit). Ejecuta `phpunit` solo para pruebas unitarias.

```
composer tests
```

### fix

`composer fix` ejecuta [`php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) y [`phpcbf`](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Fixing-Errors-Automatically) corregirán el código PHP para seguir los estándares de codificación.

```
composer fix
```

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2013, [Koriym](https://github.com/koriym)

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
