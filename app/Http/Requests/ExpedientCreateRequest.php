<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedientCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name'              => ['required', 'regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Gender'            => 'required|alpha',
            'Age'               => 'required|numeric',
            'Birthday'          => 'required|date',
            'Height'            => 'numeric',
            'Weight'            => 'numeric',
            'Body_fat'          => 'numeric',
            'Marital_status'    => 'required|alpha',
            'Education'         => ['required','regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Position'          => ['regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Employer'          => ['regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Address'           => ['required','regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Phone'             => 'numeric|digits_between:7,10',
            'Degree'            => ['regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],

            'Abdominal'         => 'numeric',
            'Triceps'           => 'numeric',
            'Chest'             => 'numeric',
            'Mid_axillary'      => 'numeric',
            'Subcapsular'       => 'numeric',
            'Suprailiac'        => 'numeric',
            'Thigh'             => 'numeric',
            'Neck'              => 'numeric',
            'Shoulder'          => 'numeric',
            'Biceps'            => 'numeric',
            'Waist'             => 'numeric',
            'Hips'              => 'numeric',
            'Calf'              => 'numeric',
            'Chest_cm'          => 'numeric',
            'Thigh_cm'          => 'numeric',

            'Improved_health'       => 'numeric',
            'Improved_endurance'    => 'numeric',
            'Increased_strength'    => 'numeric',
            'Sport_specific'        => 'numeric',
            'Increased_muscle_mass' => 'numeric',
            'Fat_loss'              => 'numeric',
            'Increased_power'       => 'numeric',
            'Weight_gain'           => 'numeric',

            'Back_trouble'          => 'alpha',
            'Neck_trouble'          => 'alpha',
            'Joint_injury'          => 'alpha',
            'Carpal_tunnel'         => 'alpha',
            'Bleeding'              => 'alpha',
            'Enlarged_glands'       => 'alpha',
            'Rashes'                => 'alpha',
            'Unexplained_lumps'     => 'alpha',
            'Chronic_fatigue'       => 'alpha',
            'Night_sweats'          => 'alpha',
            'Undesired_weight_loss' => 'alpha',
            'Snoring'               => 'alpha',
            'Difficulty_sleeping'   => 'alpha',
            'Low_blood_sugar'       => 'alpha',

            'a0'        => 'required|alpha',
            'a1'        => 'required|alpha',
            'a1_5'      => ['regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'a2'        => 'required|alpha',
            'a3'        => 'required|alpha',
            'a4'        => 'required|alpha',
            'a5'        => 'required|alpha',
            'a6'        => 'required|alpha',
            'a6_5'      => ['regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'a7'        => 'required|alpha',
            'a7_5'      => ['regex:/^[.áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'a8'        => 'required|alpha',
            'a9'        => 'required|alpha',

            's1'        => 'required|alpha',
            's2'        => 'numeric',
            's2_age'    => 'numeric',
            's3'        => 'numeric',
            's3_age'    => 'numeric',
            's4'        => 'numeric',
            's4_age'    => 'numeric',
            's5'        => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            's6'        => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],

            'd1'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'd2'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'd3'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'd4'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'd5'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'd6'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'd7'                => ['regex:/^[0-9#(),.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Beef'              => 'numeric',
            'Fish'              => 'numeric',
            'Desserts'          => 'numeric',
            'Pork'              => 'numeric',
            'Fowl'              => 'numeric',
            'Fried_foods'       => 'numeric',
            'Milk'              => 'numeric',
            'Buttermilk'        => 'numeric',
            'Skim_milk'         => 'numeric',
            'Low_milk2'         => 'numeric',
            'Low_milk1'         => 'numeric',
            'Coffee'            => 'numeric',
            'Tea'               => 'numeric',
            'Soda'              => 'numeric',
            'Water'             => 'numeric',
            'd8'                => 'alpha',
            'd9'                => 'alpha',
            'd9_5'              => 'numeric',
            'd10'               => 'alpha',
            'd10_5'             => 'numeric',
        ];
    }
}
