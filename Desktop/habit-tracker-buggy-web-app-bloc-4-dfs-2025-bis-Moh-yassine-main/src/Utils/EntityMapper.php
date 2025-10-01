<?php
namespace App\Utils;

final class EntityMapper {
    
    /**
     * Permet de mapper les données vers une entité
     *
     * @param  mixed $className
     * @param  mixed $data
     * @return object $entity
     */
    public static function map(string $className, array $data)
    {
        return !empty($data) ? $className::hydrate($data) : null;
    }

    public static function mapCollection(string $className, array $collection)
    {
        return array_map(function($data) use ($className)
        {
            return self::map($className, $data);
        }, $collection);
    }

}