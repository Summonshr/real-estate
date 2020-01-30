<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        [
            'key' => 'admin',
        ],
        [
            'key' => 'agent',
        ],
        [
            'key' => 'user'
        ]
    ];
}
