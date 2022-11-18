<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbsensiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
            'id' => $this -> id,
            'jam_masuk' => $this -> jam_masuk,
            'jam_keluar' => $this -> jam_keluar,
            'tanggal' => $this -> tanggal,
            'bulan' => $this -> bulan,
            'tahun' => $this -> tahun,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
       ];
    }
}
