<?php

namespace App\Models\Attachment;

use App\Models\Attachment\traits\AttachmentRelations;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use AttachmentRelations;

    protected $table = 'doctor_shifts';
    public $timestamps = false;

    protected $fillable = [
        'doctor_id',
        'day',
        'start_time',
        'end_time',
    ];

}
