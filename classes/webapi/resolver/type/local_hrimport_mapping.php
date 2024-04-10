<?php

namespace local_hrimport\webapi\resolver\type;

use core\webapi\execution_context;
use GraphQL\Type\Definition\ObjectType;

class mapping extends \core\webapi\type_resolver
{
    /**
     * @param array<int,mixed> $args
     * @return array<string,string>
     */
    public static function resolve(string $field, $resource, array $args, execution_context $ec)
    {
        switch ($field) {
            case 'source':
                return $resource[$field];
                break;
            case 'source_fields':
                return ['type-query-test-source_field', 'mapping?'];
                break;
            default:
                return 'default-type-resolver';
                break;
        }
    }
}
