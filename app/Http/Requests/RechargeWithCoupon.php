<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class RechargeWithCoupon extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!auth()->check()) {
            return false;
        }

        logger($this->get('code'));

        $coupon = Coupon::where('code', $this->get('code'))->firstOrFail();

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
            'code'=>['required', Rule::exists('coupons')->where(function ($query) {
                $query->where('code', request('code'))->where('amount','>',0);
            }),]
        ];
    }
}
