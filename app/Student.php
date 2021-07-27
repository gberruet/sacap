<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'student_type_id',
        'nationality_id',
        'document_type_id',
        'document_number',
        'file_number',
        'phone_number',
        'email',
    ];

    public function studentType() {
        return $this->hasOne(StudentType::class, 'id', 'student_type_id');
    }

    public function nationality () {
        return $this->hasOne(Nationality::class, 'id', 'nationality_id');
    }

    public function documentType() {
        return $this->hasOne(DocumentType::class, 'id', 'document_type_id');
    }
}
