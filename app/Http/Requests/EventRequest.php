<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'location' => 'required',
            'tickets_available' => 'required|numeric',
            'price' => 'required|decimal:2',
            'registration_starts_at' => 'required|date',
            'registration_ends_at' => 'required|date',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date',
        ];
    }
}
