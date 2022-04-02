<?php
namespace App\Http\Request\Prospecto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProspectoRequest extends FormRequest {

  public function rules() {
    return [
      'observacion'=> 'required',
    ];
  }
}