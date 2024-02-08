<?php

namespace Module\Campaign\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignFromRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1',
            'description' => 'required|string|min:1',
            'max_code' => 'required|integer|min:1',
        ];
    }
}
