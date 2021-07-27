<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public function students() {
        return $this->hasMany(Student::class);
    }
}
