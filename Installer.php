<?php


class Installer extends \yii\composer\Installer
{
    public static function initConfig(array $params)
    {
        $databaseName = basename(__DIR__);

        foreach ($params as $config => $destination) {
            if (is_file($config)) {
                $content = str_replace('database-username', $databaseName, file_get_contents($config));
                file_put_contents($config, $content);
                copy($config, $destination);
            }
        }

        $dir = implode(DIRECTORY_SEPARATOR, ['config', 'docker', 'nginx', 'conf.d', '']);
        $servers = array_filter(scandir($dir), function($value) {
            return !in_array($value, ['.', '..']) ?: false;
        });

        foreach ($servers as $config) {
            $config = $dir . $config;
            if (is_file($config)) {
                $content = str_replace('project.local', $databaseName.'.local', file_get_contents($config));
                file_put_contents($config, $content);
            }
        }
    }

    public static function postCreateProject($event)
    {
        $params = $event->getComposer()->getPackage()->getExtra();
        if (isset($params[__METHOD__]) && is_array($params[__METHOD__])) {
            foreach ($params[__METHOD__] as $method => $args) {
                call_user_func_array([__CLASS__, $method], (array) $args);
            }
        }
    }

}