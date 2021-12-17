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
        $total =0;
        $i=0;
        foreach($members as $key=>$mem){
            $sub = Subscription::find($mem['subscription_id']);
            $members[$key]['sub_name'] = $sub['name'];
            $members[$key]['sub_price'] = $sub['price'];
            $total += $sub['price'];
            $i++;
        }
        usort($members, function($a, $b) {
            return $b['sub_price'] - $a['sub_price'];
        });
        $average = $total/$i;
        return view('memberList',['members'=>$members,'average'=>$average]);
    }
}
