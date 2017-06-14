<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable =['firstname','lastname','birthday','report','country','phone','email','company','position','photo','about'];
}
