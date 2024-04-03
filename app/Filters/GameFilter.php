<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;
class GameFilter extends ApiFilter {
    protected $safeParams = [
        'dice1' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'dice2' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'won' => ['eq', 'ne'],
        'userId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne']
    ];
    protected $columnMap = [
        'userId' => 'user_id'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];


}