<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademyInfo extends Model
{
    use HasFactory;

    protected $table = 'academy_info';
    protected $fillable = [
        'education_office_name',
        'administrative_district_name',
        'academy_tutorial_name',
        'academy_name',
        'establishment_date',
        'registration_status_name',
        'total_capacity',
        'temporary_capacity',
        'field_name',
        'tutorial_series_name',
        'tutorial_course_list_name',
        'tutorial_course_name',
        'tuition_fee_per_person',
        'tuition_fee_public',
        'dormitory_academy',
        'postal_code',
        'road_name_address',
        'road_name_detail_address',
    ];
}
