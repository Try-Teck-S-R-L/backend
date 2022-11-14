<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\DB;

class ValidacionesEdad implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $categoria = DB::table('categorias')
            ->select('idCategoria')
            ->join('equipos', 'equipos.idCategoria', '=', 'categoria.idCategoria')
            ->where('equipos.idCategoria', '=', 'categoria.idCategoria')
            ->get();
        if ($categoria = '1' && $value > '35' && $value < '45') {
            return true;
        } elseif ($categoria = '2' && $value = '45') {
            return true;
        } elseif ($categoria = '3' && $value > '45' && $value < '55') {
            return true;
        } else {
            $fail('tu edad no pertenece a esta categoria');
        }
    }
}
