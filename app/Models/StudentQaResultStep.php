<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQaResultStep extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_qa_results_steps';
    protected $fillable = [
        'result_id',
        'step',
        'created',
        'created_by',
        'completed',
        'completed_by',
    ];
}
