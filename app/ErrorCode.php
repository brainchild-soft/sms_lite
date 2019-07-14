<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorCode extends Model
{
    protected $table ='switch_setings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ErrorCode',
        'ErrorName',
        'Limit',
    ];

    
}
