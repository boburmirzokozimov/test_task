<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    public function __construct(private array $queryParams)
    {
    }

    public function apply(Builder $builder): void
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    private function before(Builder $builder)
    {
    }

    abstract protected function getCallbacks(): array;

    protected function removeQueryParams(string  ...$keys): static
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }
        return $this;
    }
}
