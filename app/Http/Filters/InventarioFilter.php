<?php

namespace App\Http\Filters;

class InventarioFilter extends ApiFilter
{
    protected $safeParams=[
        'prestamoId' => ['eq', 'gt', 'lt'],
        'marca' => ['eq', 'ne'],
        'modelo' => ['eq', 'ne'],
        'tipo' => ['eq', 'ne'],
        'identificador' => ['eq', 'ne'],
        'estado' => ['eq'],
        'unidad' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];
    protected $columnMap=[
        'prestamoId' => 'prestamo_id',
    ];
    protected $operatoMap=[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];
}


