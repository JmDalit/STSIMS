<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\OtpRequests;

class OtpRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required'],
            'otp' => ['required', 'digits:6']
        ];
    }

    public function messages(): array
    {
        return [
            'otp.digits' => 'The OTP must be exactly 6 digits.'
        ];
    }


    public function userAuth(): void
    {
        $user = User::where('email', $this->input('email'))->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or null value',
            ]);
        }

        $check = OtpRequests::where('user_id', $user->id)->where('status', 'new')->where('generated_token', $this->input('otp'))->first();

        if (!$check) {
            throw ValidationException::withMessages([
                'otp' => 'That OTP doesn’t match.',
            ]);
        }

        if ($check && $check->expires_at < now()) {
            throw ValidationException::withMessages([
                'otp' => 'This OTP is no longer valid.',
            ]);
        }
    }
}
