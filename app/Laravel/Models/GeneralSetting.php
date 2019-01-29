<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSetting extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "general_setting";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'data',
    ];

    public function getData() {
        $data = array();
        foreach (explode("\r\n", $this->attributes['data']) as $key => $element) {
            $_data = explode(":", $element, 2);
            if(count($_data) == 2)
                $data += array(trim($_data[0]) => trim($_data[1]));
        }
        return $data;
    }
}
