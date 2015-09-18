<?php
/**
 * Yii bootstrap file.
 * Used for IDE code autocompletion for our extended from Yii core components and classes.
 *
 * This file is copy and does the same as './vendor/yiisoft/yii2/Yii.php'.
 * Note! To avoid 'Multiple Implementations' PHPStorm waring and make autocomplete faster
 *  - exclude or 'Mark as Plain Text' file './vendor/yiisoft/yii2/Yii.php'.
 *
 *
 * Yii is a helper class serving common framework functionalities.
 *
 * It extends from [[\yii\BaseYii]] which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of [[\yii\BaseYii]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var BaseApplication|WebApplication|ConsoleApplication the application instance
     */
    public static $app;
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap = include(__DIR__ . '/../../vendor/yiisoft/yii2/classes.php');
Yii::$container = new yii\di\Container;

/**
 * Class BaseApplication
 * Used for properties that are identical for both WebApplication and ConsoleApplication
 * @property \common\components\Formatter $formatter
 */
abstract class BaseApplication extends yii\base\Application
{
}

/**
 * Class WebApplication
 * Include only Web application related components here
 */
class WebApplication extends yii\web\Application
{
}

/**
 * Class ConsoleApplication
 * Include only Console application related components here
 *
 * @property \yii\db\Connection $dbOld
 */
class ConsoleApplication extends yii\console\Application
{
}