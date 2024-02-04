<?php

namespace App\Http\Resources;

use App\Models\Allowence;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveCheckResource extends JsonResource
{
    public static $wrap=false;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'leave_date'=>$this->date,
            'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
