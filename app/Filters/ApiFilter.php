<?php

namespace App\Filters;

use Illuminate\http\Request;

class ApiFilter {

  protected $allowedParams = [];

  protected $columnMap = [];

  protected $operatorMap = [ 
    'eq' => '=',
    'lt' => '<',
    'gt' => '>',
    'lte' => '<=',
    'gte' => '>='
  ];

  public function transform(Request $request) {
    $eloQuery=[];

    foreach ($this->allowedParams as $parm => $operators) {
      $query = $request->query($parm);
      if (!isset($query)) {
        continue;
      }

      $column = $this->columnMap[$parm] ?? $parm;

      foreach ($operators as $operator) {
        if (isset($query[$operator])) {
          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
      }

    }

    return $eloQuery;

  }
}