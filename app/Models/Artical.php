<?php

namespace App\Models;

use App\Models\Tanent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Artical extends Model
{
    /** @use HasFactory<\Database\Factories\ArticalFactory> */
    use HasFactory;
    protected $guarded = [];

    public function tanent()
    {
        return $this->belongsTo(Tanent::class);
    }

    public function scopeTeams(Builder $query): void
    {
        $query->where("tanent_id", Auth::user()->tanent_id);
    }
}
