<?php

namespace App\Traits;

use App\Models\MasterDataVoucher;
use App\Models\TransactionDonate;
use App\Models\TransactionPromote;
use App\Models\TransactionSubscribe;
use App\Models\TransactionTopUp;
use App\Models\TransactionWithdraw;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Balance{

    public function userBalance($userId){
        try{
            // 
            // return ($income_topup+$income_donate)-($outcome_donate+$outcome_withdraw+$outcome_promote+$outcome_subscribe);

        }catch (\Exception $e){
            return 0;
        }
    }

    public function checkVoucher($userId,$voucher,$type){
        try {
            //Check if Voucher Available
            $mdVoucher = MasterDataVoucher::where('VoucherCode',$voucher)->where('Type',$type)->first();
            if($mdVoucher === null){
                return 'Voucher not Found.';
            }else{
                if($mdVoucher->VoucherExpired < Carbon::now()){
                    return 'Voucher Expired';
                }

                $trSubscribe = TransactionSubscribe::where('PromoCode',$voucher)->where('fidUser',$userId)->first();
                if($trSubscribe !== null){
                    return 'Voucher Already Used.';
                }

                return $mdVoucher;
            }

        }catch (\Exception $e){
            return 'Server Error.';
        }
    }

}