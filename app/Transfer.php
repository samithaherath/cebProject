<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use Notifiable;

    protected $fillable = ['epf_no','name', 'dob', 'present_work_station', 'maritial_status', 'reported_date', 'years', 'first_pref', 'second_pref', 'third_pref', 'reason', 'address'];
    protected $table = 'transfer_list';
}
