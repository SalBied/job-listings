<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;
    // we can change the class name to make it match the singular form of the table
    // or
    protected $table ='job_listings';

  //  protected $fillable = ['employer_id', 'title', 'salary']; // these two items may be MassAssigned

    protected $guarded = []; // fileds that should be guarded against mass assignment
    // we reference this as a property not as a method
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
