<?php

namespace local_hrimport\webapi\resolver\query;

use core\webapi\execution_context;

class mapping extends \core\webapi\query_resolver
{
    public static function resolve(array $args, execution_context $ec)
    {
        // return ['source', 'fields'];
        return $args;
    }
}
