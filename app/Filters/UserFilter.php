<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;
class UserFilter extends ApiFilter {
    protected $safeParams = [
        'name' => ['eq'],
        'nickname' => ['eq'],
        'email' => ['eq']
    ];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];
//mapeo de los ordenadores
//hereda de ApiFilter las funciones

}