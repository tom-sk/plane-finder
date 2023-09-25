<?php

namespace App\Http\Requests;

use App\DataTransferObjects\PositionData;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => ['int', 'required', 'exists:flights,id',],
            "position" => ['int', 'required'],
        ];
    }

    public function toDto(): PositionData
    {
        return new PositionData(
            id: $this->validated('id'),
            position: $this->validated('position'),
        );
    }
}
