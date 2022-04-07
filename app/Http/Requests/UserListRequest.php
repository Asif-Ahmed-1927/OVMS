<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserListRequest extends FormRequest
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
            'username' => 'required|min:3|max:30|regex:/[a-zA-Z0-9]/i',
            'first_name' => 'required|min:3|max:30|regex:/[a-zA-Z]/i',
            'last_name' => 'required|min:3|max:30|regex:/[a-zA-Z]/i',
            'date_of_birth' => 'required',
            'gender' => 'required|in:male,female,other',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'password' => 'required|min:6|max:30',
            'email' => 'required|email|max:50|min:10',
            'usertype' => 'required|in:User,Volunteer',
            'national_id' => 'required|digits:9',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => "Username can't be empty...",
            'username.min' => "Username must be minimum 3 characters...",
            'username.max' => "Username can't exceed 30 characters...",
            'username.regex' => "Username must be in alphanumeric...",

            'first_name.required' => "First Name can't be empty...",
            'first_name.min' => "First Name must be minimum 3 characters...",
            'first_name.max' => "First Name can't exceed 30 characters...",
            'first_name.regex' => "First Name must be in letter...",

            'last_name.required' => "Last Name can't be empty...",
            'last_name.min' => "Last Name must be minimum 3 characters...",
            'last_name.max' => "Last Name can't exceed 30 characters...",
            'last_name.regex' => "Last Name must be in letter...",

            'date_of_birth.required' => "Date of Birth must be selected...",

            'gender.required' => "Gender must be selected...",
            'gender.in' => "Gender: Male, Female or Others...",

            'phone.required' => "Phone Number can't be empty...",
            'phone.regex' => "Phone Number is invalid...",

            'address.required' => "Address can't be empty...",

            'password.required' => "Password can't be empty...",
            'password.min' => "Password must be minimum 6 characters...",
            'password.max' => "Password can't exceed 30 characters...",

            'email.required' => "Email can't be empty...",
            'email.email' => "Email format is invalid...",
            'email.unique' => "Email has already been taken...",
            'email.min' => "Email must be minimum 10 characters...",
            'email.max' => "Email can't exceed 50 characters...",

            'usertype.required' => "User Type category must be selected...",
            'usertype.in'  => "Select Usertype: User or Volunteer",

            'national_id.required' => "NID Number must be filled up...",
            'national_id.digits' => "NID Number is invalid...",

        ];
    }
}
