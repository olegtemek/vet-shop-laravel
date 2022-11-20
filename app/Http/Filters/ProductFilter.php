<?php

namespace App\Http\Filters;

class ProductFilter extends QueryFilter
{
  public function filters_id($ids)
  {
    return $this->builder->whereHas('filters', function ($q) use ($ids) {
      $q->whereIn('filter_id', $ids);
    });
  }
}
