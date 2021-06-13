<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class bus extends Model
{
    use HasFactory;
    protected $primaryKey = 'bus_id';
    protected $fillable = ['bus_code', 'operator_name', 'depart', 'arrive', 'date'];
    public $timestamps = false;



    public function setDateAttribute($value)
    {

        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function getDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date'])->format('d/m/Y');
}
}