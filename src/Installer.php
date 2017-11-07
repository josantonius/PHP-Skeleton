<?php
/**
 * Created in order to provide project skeleton to start new PHP project.
 *
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
     * @var string
     */
    private static $name;

    /**
     * @since 1.0.0
     *
     * @return void
     */
    public static function preInstall(Event $event)
    {
        $io = $event->getIO();
        $vendorClass = self::ask($io, 'What is the vendor name ?', 'MyVendor');
        $packageClass = self::ask($io, 'What is the package name ?', 'MyPackage');
        self::$name = self::ask($io, 'What is your name ?', self::getUserName());
        $packageName = sprintf('%s/%s', self::camel2dashed($vendorClass), self::camel2dashed($packageClass));
        $json = new JsonFile(Factory::getComposerFile());
        $composerDefinition = self::getDefinition($vendorClass, $packageClass, $packageName, $json);
        self::$packageName = [$vendorClass, $packageClass];
        // Update composer definition
        $json->write($composerDefinition);
        $io->write("<info>composer.json for {$composerDefinition['name']} is created.\n</info>");
    }

    /**
     * @since 1.0.0
     *
     * @return void
     */
    public static function postInstall(Event $event = null)
    {
        unset($event);
        list($vendorName, $packageName) = self::$packageName;
        $skeletonRoot = dirname(__DIR__);
        self::recursiveJob("{$skeletonRoot}", self::rename($vendorName, $packageName));
        //mv
        $skeletonPhp = __DIR__ . '/Skeleton.php';
        copy($skeletonPhp, "{$skeletonRoot}/src/{$packageName}.php");
        $skeletoTest = "{$skeletonRoot}/tests/SkeletonTest.php";
        copy($skeletoTest, "{$skeletonRoot}/tests/{$packageName}Test.php");
        // remove installer files
        unlink($skeletonRoot . '/README.md');
        unlink($skeletonPhp);
        unlink($skeletoTest);
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
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach ($iterator as $file) {
            $job($file);
        }
    }

    /**
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
        $composerDefinition = $json->read();
        unset($composerDefinition['autoload']['files'], $composerDefinition['scripts']['pre-install-cmd'], $composerDefinition['scripts']['pre-update-cmd'], $composerDefinition['scripts']['post-create-project-cmd']);

        $composerDefinition['name'] = $packageName;
        $composerDefinition['authors'] = [['name' => self::$name]];
        $composerDefinition['description'] = '';
        $composerDefinition['autoload']['psr-4'] = ["{$vendor}\\{$package}\\" => 'src/'];

        return $composerDefinition;
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
            if ($file->isDir() || strpos($fineName, '.') === 0 || ! is_writable($file)) {
                return;
            }
            $contents = file_get_contents($file);
            $contents = str_replace('__Vendor__', "{$vendor}", $contents);
            $contents = str_replace('__vendor__', "{strtolower($vendor)}", $contents);
            $contents = str_replace('__Package__', "{$package}", $contents);
            $contents = str_replace('__year__', date('Y'), $contents);
            $contents = str_replace('__name__', self::$name, $contents);
            file_put_contents($file, $contents);
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
}
