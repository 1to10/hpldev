<?php
namespace App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
class PostFormRequest extends Request {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:blogs|max:255',
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'short_description' => 'required',
            'description' => 'required',
        ];
    }
}