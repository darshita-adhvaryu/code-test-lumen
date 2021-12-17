<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Subscription;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list(){
        $members = Member::all()->toArray();
        foreach($members as $key=>$mem){
            $sub = Subscription::find($mem['subscription_id']);
            $members[$key]['sub_name'] = $sub['name'];
            $members[$key]['sub_price'] = $sub['price'];
        }
        return response()->json(['error' => false, 'data' => $members]);
    }
}
