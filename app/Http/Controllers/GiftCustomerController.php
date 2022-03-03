<?php

namespace App\Http\Controllers;

use App\Models\GiftCustomer;
use App\Rules\Required;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GiftCustomerController extends Controller
{
    public function index(){
        $gifts = GiftCustomer::with('product')
                    ->orderBy('created_at', 'DESC')->paginate(8);

        return view('admin.gift.index', compact('gifts'));
    }

    public function edit($id){
        $gift = GiftCustomer::with('product')->find($id);

        return view('admin.gift.edit', compact('gift'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tel' => new Required,
        ]);
        $gift = GiftCustomer::find($id);
        if($gift){
            $gift->status = $request->status;
            $gift->tel = $request->tel;
            $gift->update();
        }

        return redirect()->route('admin.gift.index');
    }
    public function destroy($id) {
        $gift = GiftCustomer::find($id);
        $gift->delete();
        return redirect()->route('admin.gift.index');
    }
    public function registerGift(Request $request){
        $gift = new GiftCustomer();

        $gift->tel = $request->tel;
        $gift->status = false;
        $gift->product_id = $request->product_id;

        $gift->save();

        Alert::success('Chúc mừng', 'Bạn đã nhận ưu đãi thành công');

        return redirect()->back();
    }

    public function classify($type) {
        $gifts = GiftCustomer::where('status', $type)->orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')->paginate(8);
        return view('admin.gift.classify', compact('gifts'))->with('type', $type);
    }
}
