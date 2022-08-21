<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;
    protected $casts = [
    'created_at'  => 'date:m-d-Y',
    // 'updated_at' => 'datetime:Y-m-d H:00',
];


    protected $fillable = [
        'aws_sent_sms_id', 'status', 'retry_count', 'applicationId', 'message', 'sourceAddress', 'encoding', 'version', 'requestId', 'created_at','time'
    ];

}
