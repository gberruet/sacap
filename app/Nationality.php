<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    public $table = "nationalitys";

    public function students() {
        return $this->hasMany(Student::class);
    }
}
