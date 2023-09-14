<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kindergarten extends Model
{
    use HasFactory;

    protected $table = 'kindergarten'; // 데이터베이스에서 사용하는 테이블 이름

    // 대량 할당을 위해 사용되는 모델의 필드
    protected $fillable = [
        'EducationOfficeName',
        'EducationSupportOfficeName',
        'KindergartenName',
        'EstablishmentType',
        'RepresentativeName',
        'PrincipalName',
        'EstablishmentDate',
        'OpeningDate',
        'Address',
        'PhoneNumber',
        'Website',
        'OperatingHours',
        'ClassCount3YearsOld',
        'ClassCount4YearsOld',
        'ClassCount5YearsOld',
        'MixedClassCount',
        'SpecialClassCount',
        'TotalApprovedCapacity',
        'Capacity3YearsOld',
        'Capacity4YearsOld',
        'Capacity5YearsOld',
        'MixedRecruitmentCapacity',
        'SpecialClassRecruitmentCapacity',
        'NumberOfChildren3YearsOld',
        'NumberOfChildren4YearsOld',
        'NumberOfChildren5YearsOld',
        'NumberOfMixedChildren',
        'NumberOfSpecialChildren',
    ];

    public $timestamps = false; // created_at, updated_at 필드를 사용하지 않음
}
