<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlateFormat extends Model
{
    use HasFactory;
    protected $table='license_plate_formats';
    protected $fillable=[
        'title',
        'image',
        'supports_letter',
        'print_contact',
        'number_font_size',
        'number_font_file',
        'number_x',
        'number_y',
        'letter_x',
        'letter_y',
        'contact_x',
        'contact_y',
        'letter_font_size',
        'contact_font_size',
        'stamp_x',
        'stamp_y',
        'contact_font_file',
        'status',
        'emirates',
        'slug',
    ];
}
