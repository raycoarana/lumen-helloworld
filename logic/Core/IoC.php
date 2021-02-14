<?php

namespace Logic\Core;

class IoC
{
    /**
     * @template T
     * @param class-string<T> $className
     * @return T
     */
    public static function inject(string $className)
    {
        return app($className);
    }
}
