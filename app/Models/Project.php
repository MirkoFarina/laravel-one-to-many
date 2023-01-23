<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'client_name',
        'summary',
        'cover_image',
        'image_original_name',
        'type_id'
    ];

    public static function generator_slug ($title){
        $slug = Str::slug($title,'-');
        $original_slug = $slug;
        $c = 1;

        $slug_exists = Project::where('slug', $slug)->first();

        while($slug_exists) {
            $slug = $original_slug . '-' . $c;
            $slug_exists = Project::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
