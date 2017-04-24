<?php

namespace Elasticquent;

use ReflectionClass;

class ElasticquentSupport
{
    use ElasticquentClientTrait;

    public static function isLaravel5()
    {
        if (class_exists('\Illuminate\Foundation\Application')) {
            return version_compare(\Illuminate\Foundation\Application::VERSION, '5', '>');
        } else if (class_exists('\Laravel\Lumen\Application')) {
            $cls = new ReflectionClass('\Laravel\Lumen\Application');
            $version = $cls->newInstanceWithoutConstructor()->version();

            return strpos($version, 'Lumen (5') === 0;
        }

        return false;
    }
}
