<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicServiceInfo extends Model
{
    use HasFactory;

    // 데이터베이스 테이블 이름 지정 (선택적)
    protected $table = 'PublicServiceInfo';

    // 자동 증가를 사용하지 않는 경우 (선택적)
    // public $incrementing = false;

    // Primary Key 필드 지정 (선택적)
    protected $primaryKey = 'id';

    // 모델에서 사용되는 데이터베이스 컬럼 명시 (선택적)
    protected $fillable = [
        'serviceName',
        'localGovCode',
        'managementNo',
        'approvalDate',
        'approvalCancelDate',
        'businessStatusCode',
        'businessStatusName',
        'detailBusinessStatusCode',
        'detailBusinessStatusName',
        'locationPhone',
        'locationArea',
        'locationPostalCode',
        'fullAddress',
        'roadAddress',
        'roadPostalCode',
        'businessName',
        'lastModifiedDate',
        'dataUpdateType',
        'dataUpdateDate',
        'businessType',
        'coordinateX',
        'coordinateY',
        'sanitationBusinessType'
    ];

    // 모델에서 사용되는 날짜 컬럼 명시 (선택적)
    protected $dates = ['approvalDate', 'approvalCancelDate', 'lastModifiedDate', 'dataUpdateDate'];
}
