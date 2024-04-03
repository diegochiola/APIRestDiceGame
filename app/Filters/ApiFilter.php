<?php
namespace App\Filters;
use Illuminate\Http\Request;
class ApiFilter{
       //creamos los array protected vacios
    protected $safeParams = [];//parametros por los que queremos fikltrar

    protected $columnMap = [];  //mapear columnas como queremos que se filtren

    protected $operatorMap = []; //mapeo de los ordenadores

   //clase de la que se extenderan las demas clases
    public function transform(Request $request) {
        $eloQuery = [];
        foreach ($this->safeParams as $param =>$operators) {
            $query = $request->query($param);
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$param] ?? $param;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}