<?php

declare(strict_types=1);

namespace Asseco\Comments\App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required',
            'commentable_type' => 'required|string',
            'commentable_id' => 'required',
        ];
    }

    /**
     * Dynamically set validator from 'required' to 'sometimes' if resource is being updated.
     *
     * @param  Validator  $validator
     */
    public function withValidator(Validator $validator)
    {
        $requiredOnCreate = [
            'body', 'commentable_type', 'commentable_id',
        ];

        $validator->sometimes($requiredOnCreate, 'sometimes', function () {
            return $this->comment !== null;
        });
    }
}
