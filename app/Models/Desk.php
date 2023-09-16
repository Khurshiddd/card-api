<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class Desk extends Model
{
    use HasFactory;
    protected $table = 'desks';

    public static function findOrFail($id)
    {
        return DB::table('desks')->find($id);
    }
    public function lists(): HasMany
    {
        return $this->hasMany(DeskList::class);
    }
}
