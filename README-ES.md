# Estructura estándar para proyectos PHP

[![Latest Stable Version](https://poser.pugx.org/josantonius/Skeleton/v/stable)](https://packagist.org/packages/josantonius/Skeleton) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Skeleton/v/unstable)](https://packagist.org/packages/josantonius/Skeleton) [![License](https://poser.pugx.org/josantonius/Skeleton/license)](LICENSE) [![Total Downloads](https://poser.pugx.org/josantonius/Skeleton/downloads)](https://packagist.org/packages/josantonius/Skeleton) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/)

[English version](README.md)

Este proyecto fue creado con el fin de generar la estructura de archivos y directorios para iniciar un nuevo proyecto PHP.

---

- [Requisitos](#requisitos)
- [Crear proyecto](#crear-proyecto)
- [Composer scripts](#composer-scripts)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Licencia](#licencia)

---

## Requisitos

Este proyecto es soportado por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Crear proyecto

You'll need [Composer](http://getcomposer.org/download/).
    
```
composer create-project josantonius/skeleton {project-path}

What is the vendor name ?

(MyVendor): Josantonius

What is the package name ?

(MyPackage): AwesomeProject

What is your name ?

(Josantonius):
```

Varios archivos de configuración estarán listos para integración continua.

 * phpunit.xml.dist para [phpunit](http://phpunit.de/manual/current/en/index.html)
 * phpmd.xml para [PHPMD](https://phpmd.org)
 * phpcs.xml para [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)
 * .php_cs para [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
 * .travis.yml para [Travis CI](https://travis-ci.org/)

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

## ☑ Tareas pendientes

- [ ] Mejorar documentación

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/Josantonius/PHP-Skeleton/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.
