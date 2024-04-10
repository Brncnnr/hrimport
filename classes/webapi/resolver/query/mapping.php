<?php

namespace local_hrimport\webapi\resolver\query;

use core\webapi\execution_context;

class mapping extends \core\webapi\query_resolver
{
    public static function resolve(array $args, execution_context $ec)
    {
        // return ['source' => $args['source'], 'source_fields' => ['name' => 'testname-query', 'mapping' => 'testmapping-query']];
        $source_fields = new \stdClass;
        $source_fields->name = 'testname-stdclass';
        $test = [['name' => 'name1', 'mapping' => 'mapping1'], ['name' => 'name2']];
        // return ['source' => $args['source'], 'source_fields' => json_encode($test)];  // json_encode($source_fields)];
        // return ['source' => $args['source'], 'source_fields' => json_encode($source_fields)];
        return $args;
    }
}
