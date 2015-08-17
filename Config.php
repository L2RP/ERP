<?php


class ConfigErp
{

    const VERSION = "0.0.1";
    public static $resources;
    public static $config;
    public static $log;
    private static $path;
    private static $library;
    private static $module_version;
    private static $cms_version;
    private static $php_version;

    private function __construct()
    {
        self::$path = (dirname(__FILE__));
        ErpAutoLoader::init();
    }

    public static function init()
    {
        require_once "loader" . DIRECTORY_SEPARATOR . "ErpAutoLoader.class.php";
        self::verifyDependencies();
        if (self::$library == null) {
            self::$library = new ConfigErp();
        }
        return self::$library;
    }

    private static function verifyDependencies()
    {

        $dependencies = true;

        try {

            if (!function_exists('curl_init')) {
                $dependencies = false;
                throw new Exception('Erp System: cURL library is required.');
            }

            if (!class_exists('DOMDocument')) {
                $dependencies = false;
                throw new Exception('Erp System: DOM XML extension is required.');
            }

        } catch (Exception $e) {
            return $dependencies;
        }

        return $dependencies;

    }

    final public static function getVersion()
    {
        return self::VERSION;
    }

    final public static function getPath()
    {
        return self::$path;
    }

    final public static function getModuleVersion()
    {
        return self::$module_version;
    }

    final public static function setModuleVersion($version)
    {
        self::$module_version = $version;
    }

    final public static function getPHPVersion()
    {
        return self::$php_version = phpversion();
    }

    final public static function setPHPVersion($version)
    {
        self::$php_version = $version;
    }

    final public static function getCMSVersion()
    {
        return self::$cms_version;
    }

    final public static function setCMSVersion($version)
    {
        self::$cms_version = $version;
    }
}

ConfigErp::init();
