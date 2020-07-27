<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vnpayController extends Controller
{
    //
    /*
    public function requestVnpay(Request $request)
    {

        $response = \VNPay::purchase([
            'vnp_TxnRef' => time(),
            'vnp_OrderType' => 200000,
            'vnp_OrderInfo' => time(),
            'vnp_IpAddr' => '127.0.0.1',
            'vnp_Amount' => 1000000,
            'vnp_ReturnUrl' => "https://watchstore.vn/kiem-tra-thanh-toan",
        ])->send();

        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();

            return redirect($redirectUrl);
        }

    }*/

    public function complete_purchase(Request $request)
    {

       try{
        $complete=$request->attributes->get('completePurchaseResponse');
        //thanh toán thành công
        if($complete->isSuccessful())
        {

           /*
           in tiền
            print $complete->vnp_Amount;
            */
            /* mã hóa đơn */
           /* print $complete->vnp_TxnRef;*/
           /* var_dump($complete->getData()); // toàn bộ data do VNPay gửi sang.3
            //khi khách hủy bỏ giao dịch*/
            $order=orders::where('codeOder','=',$complete->vnp_TxnRef)->firstOrFail();
            $order->status=2;
            $order->save();
            return redirect()->route('home')->with("message",["type"=>"success","msg"=>"Quý khách đã thanh toán đơn hành thành công"]);



        }else if($complete->isCancelled())
        {
            return redirect()->route('home')->with("message",["type"=>"danger","msg"=>"Quý khách đã hủy thành toán đơn hàng"]);
        }else
        {
            return redirect()->route('home')->with("message",["type"=>"danger","msg"=>"Thanh Toán Không Thành Công"]);
        }
       }catch(Exception $e)
       {
          return redirect()->back()->with("message",["type"=>"danger","msg"=>"Phát Sinh Lỗi Liên Hệ Với Nhân Viên Cửa Hàng"]);

       }
    }

}
