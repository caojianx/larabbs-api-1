<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email'=>'required|email',
            'introduction'=>'max:80',
            'avatar'=>'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'用户名不能为空',
            'name.between'=>'用户名在3到25字符之间',
            'name.regex'=>'用户名必须为字母数字横杆下划线',
            'name.unique'=>'用户名已被占用',
            'avatar.mimes'=>'头像必须是jpeg,bmp,png,gif格式的图片',
            'avatar.dimensions'=>'头像清晰度不够，宽和高必须200px以上',
        ];
    }
}
