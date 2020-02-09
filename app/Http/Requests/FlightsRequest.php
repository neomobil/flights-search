<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FlightsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'params' => 'required',
            'params.d1' => 'required|string|size:3',
            'params.o1' => 'required|string|size:3',
            'params.dd1' => [
                'required',
                'date',
                static function ($attribute, $value, $fail) {
                    $inputDay = Carbon::parse($value);
                    if ($inputDay->lt(Carbon::today())) {
                        $fail('The date of departure from first origin must be higher or equal than today');
                    }
                }
            ]
        ];
    }
}
