<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildcareCenter extends Model
{
    use HasFactory;

    // 테이블 이름
    protected $table = 'childcarecenter';

    // 자동 증가 아이디를 사용하지 않는 경우 false로 설정
    public $incrementing = true;

    // 모델에 해당하는 테이블의 "기본 키" 컬럼 이름
    protected $primaryKey = 'id';

    // 대량 할당 가능한 속성들
    protected $fillable = [
        'name',
        'type',
        'address',
        'capacity',
        'current_number'
    ];

    // 모델의 기본 키 컬럼의 "타입"
    protected $keyType = 'int';

    // 모델의 날짜 컬럼의 저장 형식
    protected $dateFormat = 'Y-m-d H:i:s';
}
