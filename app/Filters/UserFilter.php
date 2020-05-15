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
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        };
        return $this->builder;
    }

    protected function name(string $value)
    {
        if (!$value) return;
        $this->builder->where('name', 'like', "%$value%");
    }

    protected function filters()
    {
        return $this->request->all();
    }
}