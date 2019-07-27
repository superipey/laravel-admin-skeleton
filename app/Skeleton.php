<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;


class Skeleton extends Model
{
    public $table = 'skeleton';

    public $fillable = ['textfield', 'textarea', 'date', 'file'];
    public $dates = ['date'];
    public $dateFormat = 'd F Y';

    public function getFileLocationAttribute()
    {
        $file = $this->attributes['file'];

        if (\Storage::exists($file)) {
            return url('uploads/' . $file);
        } else return url('/uploads/placeholder.png');
    }
}
