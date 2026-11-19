<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRecord extends Model
{
    public const CATEGORIES = ['Projeto', 'Acessibilidade', 'Tecnologia', 'Metodologia'];

    protected $fillable = ['title', 'category', 'summary', 'body'];
}
