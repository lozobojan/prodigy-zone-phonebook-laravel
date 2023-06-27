<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'city_id', 'user_id', 'photo'];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function deletePhotoFromUploads(){
        if(!is_null($this->photo)){
            Storage::delete($this->photo);
        }
    }

    // accessor
    public function getPhotoPathAttribute(){
        return asset($this->photo ? "storage/{$this->photo}" : "storage/placeholder.png");
    }

    public function getNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }
}
