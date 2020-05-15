<?php

namespace App\Filters;


class UserFilter
{
    protected $builder;

    protected $request;

    /**
     * UserFilter constructor.
     * @param $builder
     * @param $request
     */
    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply()
    {
        foreach ($this->filters() as $filter => $value) {
            $correctFilter = stristr($filter, '_', true);
            $correctFilter ?: $correctFilter=$filter;
            if (method_exists($this, $correctFilter)) {
                $this->$correctFilter($value);
            }
        };
        return $this->builder;
    }

    protected function name($value)
    {
        if (!$value) return;
        $this->builder->where('name', 'like', "%$value%");
    }

    protected function age($value)
    {
        if (!$value) return;
        $this->builder->whereIn('age', $value);
    }

    protected function hobby($value)
    {
        if (!$value) return;
        $this->builder->whereIn('hobby', $value);
    }

    protected function status($value)
    {
        if (!$value) return;
        $this->builder->where('status', $value);
    }

    protected function gender($value)
    {
        if (!$value) return;
        $this->builder->where('gender', $value);
    }

    protected function filters()
    {
        return $this->request->all();
    }
}