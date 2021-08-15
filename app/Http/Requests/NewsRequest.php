<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NewsRequest extends FormRequest
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
        $method = Request::method();

        switch($method)
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required',
                    'description' => 'required',
                    'link' => 'required',
                    'publication_date' => 'required',
                    'publisher_name' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required',
                    'description' => 'required',
                    'link' => 'required',
                    'publication_date' => 'required',
                    'publisher_name' => 'required',
                ];
            }
            case 'PATCH':
            {
                return [];
            }
            default: break;
        }
    }
}
