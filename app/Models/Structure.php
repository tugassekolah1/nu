<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    public function member() {
    return $this->belongsTo(Member::class);
}

public function position() {
    return $this->belongsTo(Position::class);
}
}
