<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;
    protected $fillable = [
        "image",
        'is_active',
        "project_id"
];
        public function project()
        {
            return $this->belongsTo(Project::class);
        }

        public function scopeIsActive($query){
            return $query->where("is_active", true);
        }

        public function scopeParent($query , $parent_id){
            return $query->where("project_id", $parent_id);
        }

}
