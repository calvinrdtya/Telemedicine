<?php

namespace App\Http\Requests\Konsultasi;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class KonsultasiRequest extends FormRequest
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
    // $month = date('m');
    // $day = date('d');
    // $year = date('y');
    // $today = $year . '-'. $month . '-' . $day;
    // $today = Carbon::now()->toDateString();
    return [
      'nama_pasien' => 'required',
      'nama_dokter' => 'required',
      // 'spesialiasi_dokter' => 'required',
      'tgl_perjanjian' => 'required|date|after_or_equal:',
      'waktu_perjanjian' => 'required',
    //   'pasien_id' => 'required'
    ];
  }
}
