<?php

namespace App\Http\Requests;

use App\Models\Hero;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if($this->user()->hasRole('dataMenager')){
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
                'data_nascita' => ['required', 'date'],
                'indirizzo' => ['required', 'string', 'lowercase', 'max:255'],
                'codice_fiscale' => ['required', 'string', 'size:16','alpha_num', Rule::unique(Hero::class)->ignore($this->user()->hero->id)],
            ];
        }
        else{
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            ];
        }

        return $rules;
    }
}
