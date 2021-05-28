<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmissionDoc extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_submissions_docs';
    protected $fillable = [
        'submission_id',
        'document_id',
        'created',
        'created_by',
    ];
}
