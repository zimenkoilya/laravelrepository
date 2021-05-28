<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmissionLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_submissions_log';
    protected $fillable = [
        'submission_id',
        'event',
        'log_details',
        'user_id',
        'created',
    ];
}
