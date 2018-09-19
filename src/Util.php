<?php namespace Prosperworks;

class Util
{
    public static function sortBy($field, &$array, $direction = 'asc')
    {
        usort($array, function($a, $b) use ($field, $direction) {
            if (is_object($a)) {
                $a = $a->{$field};
            } else {
                $a = $a[$field];
            }

            if (is_object($b)) {
                $b = $b->{$field};
            } else {
                $b = $b[$field];
            }

            if ($a == $b) return 0;

            $order = ($a < $b) ? -1 : 1;

            return (strtolower(trim($direction)) == 'desc') ? -($order) : $order;
        });

        return true;
    }
}