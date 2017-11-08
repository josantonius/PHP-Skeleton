<?php
/**
 * Created in order to provide project skeleton to start new PHP project.
 *
 * @author    Koriyama <akihito.koriyama@gmail.com>
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 (c) Josantonius - PHP-Skeleton
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Skeleton
 * @since     1.0.0
 **/
namespace Josantonius\Skeleton;

use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Json\JsonFile;
use Composer\Script\Event;

/**
 * Installer handler.
 *
 * @since 1.0.0
 */
class Installer
{
    /**
     * @since 1.0.0
     *
     * @var array
     */
    private static $packageName;

    /**
     * @since 1.0.0
     *
     * @var array
     */
    private static $prefix;

    /**
     * @since 1.0.0
     *
     * @var string
     */
    private static $name;

    /**
     * @since 1.0.0
     *
     * @var string
     */
    private static $email;

    /**
     * @since 1.0.0
     *
     * @var string
     */
    private static $version;

    /**
     * @since 1.0.0
     *
     * @return void
     */
    public static function preInstall(Event $event)
    {
        $io = $event->getIO();

        $vendorClass = self::ask($io, 'What is the vendor name ?', self::getUserName());
        $packageClass = self::ask($io, 'What is the package name ?', 'MyPackage');
        self::$prefix = self::ask($io, 'What is the package prefix ?', '');
        self::$version = self::ask($io, 'What is the version ?', '1.0.0');
        self::$name = self::ask($io, 'What is your name ?', self::getUserName());
        self::$email = self::ask($io, 'What is your email ?', self::getUserEmail());

        $packageName = sprintf(
            '%s/%s',
            self::camel2dashed($vendorClass),
            self::camel2dashed($packageClass)
        );

        $json = new JsonFile(Factory::getComposerFile());
        self::$packageName = [$vendorClass, $packageClass];

        $definition = self::getDefinition(
            $vendorClass,
            $packageClass,
            $packageName,
            $json
        );

        $json->write($definition);
        $io->write(
            "<info>composer.json for {$definition['name']} created.\n</info>"
        );
    }

    /**
     * @since 1.0.0
     *
     * @return void
     */
    public static function postInstall(Event $event = null)
    {
        $skeletonRoot = dirname(__DIR__);
        unset($event);
        list($vendorName, $packageName) = self::$packageName;
        self::recursiveJob("{$skeletonRoot}", self::rename($vendorName, $packageName));

        unlink($skeletonRoot . '/README.md');
        unlink($skeletonRoot . '/README-ES.md');

        $skeletonPhp = __DIR__ . '/Skeleton.php';
        $exceptionPhp = __DIR__ . "/Exception/SkeletonException.php";
        $gitattributesFile = "{$skeletonRoot}/gitattributes.txt";
        $readmeFile = "{$skeletonRoot}/README_EN.md";
        $readmeFileES = "{$skeletonRoot}/README_ES.md";
        $testPhp = "{$skeletonRoot}/tests/SkeletonTest.php";

        copy($skeletonPhp, "{$skeletonRoot}/src/{$packageName}.php");
        copy($exceptionPhp, __DIR__ . "/Exception/{$packageName}Exception.php");
        copy($gitattributesFile, "{$skeletonRoot}/.gitattributes");
        copy($readmeFile, "{$skeletonRoot}/README.md");
        copy($readmeFileES, "{$skeletonRoot}/README-ES.md");
        copy($testPhp, "{$skeletonRoot}/tests/{$packageName}Test.php");

        unlink($skeletonPhp);
        unlink($exceptionPhp);
        unlink($gitattributesFile);
        unlink($readmeFile);
        unlink($readmeFileES);
        unlink($testPhp);
        unlink(__FILE__);
    }

    /**
     * @since 1.0.0
     *
     * @param IOInterface $io
     * @param string      $question
     * @param string      $default
     *
     * @return string
     */
    private static function ask(IOInterface $io, $question, $default)
    {
        $ask = [
            sprintf("\n<question>%s</question>\n", $question),
            sprintf("\n(<comment>%s</comment>):", $default)
        ];
        $answer = $io->ask($ask, $default);

        return $answer;
    }

    /**
     * @since 1.0.0
     *
     * @param string   $path
     * @param callable $job
     *
     * @return void
     */
    private static function recursiveJob($path, $job)
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $file) {
            $job($file);
        }
    }

    /**
     * Get Composer definition.
     *
     * @since 1.0.0
     *
     * @param string   $name
     * @param string   $vendor
     * @param string   $package
     * @param string   $packageName
     * @param JsonFile $json
     *
     * @return array
     */
    private static function getDefinition($vendor, $package, $packageName, JsonFile $json)
    {
        $definition = $json->read();

        unset(
            $definition['autoload']['files'],
            $definition['scripts']['pre-install-cmd'],
            $definition['scripts']['pre-update-cmd'],
            $definition['scripts']['post-create-project-cmd']
        );

        $definition['name'] = $packageName;
        $definition['description'] = '';
        $definition['autoload']['psr-4'] = ["{$vendor}\\{$package}\\" => 'src/'];
        $definition['authors'] = [[
            'name' => self::$name,
            'email' => self::$email,
            'homepage' => 'https://' . strtolower(self::$name) . '.com',
            'role' => 'Developer',
        ]];

        return $definition;
    }

    /**
     * @since 1.0.0
     *
     * @param string $vendor
     * @param string $package
     *
     * @return \Closure
     */
    private static function rename($vendor, $package)
    {
        $jobRename = function (\SplFileInfo $file) use ($vendor, $package) {
            $fineName = $file->getFilename();
            if ($file->isDir() || strpos($fineName, '.') === 0 || !is_writable($file)) {
                return;
            }
            $content = file_get_contents($file);
            $content = str_replace('__Vendor__', "{$vendor}", $content);
            $content = str_replace('__vendor__', strtolower($vendor), $content);
            $content = str_replace('__Package__', "{$package}", $content);
            $content = str_replace('__package__', strtolower($package), $content);
            $content = str_replace('__PREFIX__', self::$prefix, $content);
            $content = str_replace('__prefix__', strtolower(self::$prefix), $content);
            $content = str_replace('__year__', date('Y'), $content);
            $content = str_replace('__month__', date('m'), $content);
            $content = str_replace('__day__', date('d'), $content);
            $content = str_replace('__Name__', self::$name, $content);
            $content = str_replace('__name__', strtolower(self::$name), $content);
            $content = str_replace('__email__', self::$email, $content);
            $content = str_replace('__version__', self::$version, $content);
            file_put_contents($file, $content);
        };

        return $jobRename;
    }

    /**
     * @since 1.0.0
     *
     * @param string $name
     *
     * @return string
     */
    private static function camel2dashed($name)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $name));
    }

    /**
     * @since 1.0.0
     *
     * @return void
     */
    private static function getUserName()
    {
        $author = `git config --global user.name`;

        return $author ? trim($author) : '';
    }

    /**
     * @since 1.0.0
     *
     * @return void
     */
    private static function getUserEmail()
    {
        $email = `git config --global user.email`;

        return $email ? trim($email) : '';
    }
}
