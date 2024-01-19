<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';
    use HasFactory;
    
        use HasFactory;
        protected $fillable = [
            'contact','dob','gender','city','courses','image',
        ];

        //@todo -- read about protected $guarded


        public function user(){
            return $this->belongsTo(User::class);
        
    }
}
