<?php

namespace local_hrimport\webapi\resolver\type;

use core\webapi\execution_context;

class mapping extends \core\webapi\type_resolver
{
    /**
     * @param array<int,mixed> $args
     * @return array<string,string>
     */
    public static function resolve(string $field, $resource, array $args, execution_context $ec)
    {
        switch ($field) {
            case 'hrfields':
                return (object) ['hrfields' => ['name' => 'testname']];
                // return (object) ['name' => 'testname', 'mapping' => 'custom_testname', 'required' => true];
                break;
            default:
                return $resource;
                break;
        }
    }
}
