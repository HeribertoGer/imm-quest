<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLItem extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'vt_CLItems';

    protected $fillable =[
        'cli_file'
    ];
}
