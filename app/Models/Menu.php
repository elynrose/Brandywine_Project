<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'menus';

    public const HAS_SUB_SELECT = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'has_sub',
        'parent_id',
        'ordering',
        'published',
        'url',
        'page_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function has_sub()
    {
        return $this->belongsTo(self::class, 'has_sub');
    }

    public function page()
    {
        return $this->belongsTo(ContentPage::class, 'page_id');
    }
}
