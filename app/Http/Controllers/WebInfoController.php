<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use App\Rules\Required;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WebInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webInfo = WebInfo::first();
        return view('admin.admin')->with('webInfo', $webInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'receiveEmail' => [new Required],
            'tel1' => [new Required],
            'tel2' => [new Required],
            'hotline' => [new Required],
            'facebook' => [new Required],
            'reason' => [new Required],
            'promotion' => [new Required],
            'tutorial' => [new Required],
            'address' => [new Required],
            // 'logo' => [new Required],
            // 'banner_ad' => [new Required],
        ]);
        $webInfo = WebInfo::first();
        if($webInfo){
            $webInfo->receiveEmail = $request->input('receiveEmail');
            $webInfo->tel1 = $request->input('tel1');
            $webInfo->tel2 = $request->input('tel2');
            $webInfo->hotline = $request->input('hotline');
            $webInfo->facebook = $request->input('facebook');
            $webInfo->reason = $request->input('reason');
            $webInfo->promotion = $request->input('promotion');
            $webInfo->tutorial = $request->input('tutorial');
            $webInfo->address = $request->input('address');
            $webInfo->title = $request->input('title');
            $webInfo->description = $request->input('description');
            $webInfo->info = $request->input('info');
            $webInfo->site_name = $request->input('site_name');
            $webInfo->keywords = $request->input('keywords');
            $webInfo->sale = $request->input('sale');
            $webInfo->gift = $request->input('gift');
            $webInfo->link_map = $request->input('link_map');
            if($request->hasFile('image_web')){
                $image_url = public_path('upload/images/webinfo').'/'. $webInfo->image_web;

                if($webInfo->image_web) {
                    if(File::exists($image_url)){
                        unlink($image_url);
                    }
                }
                $name = pathinfo($request->image_web->getClientOriginalName(), PATHINFO_FILENAME);
                $image_web = Str::slug($name) . '.' . $request->image_web->extension();

                $request->image_web->move(public_path('upload/images/webinfo'), $image_web);
                $webInfo->image_web = $image_web;
            }
            if($request->hasFile('logo')){
                $image_url = public_path('upload/images/webinfo').'/'. $webInfo->logo;

                if($webInfo->logo) {
                    if(File::exists($image_url)){
                        unlink($image_url);
                    }
                }
                $logo = time() . '.' . $request->logo->extension();

                $request->logo->move(public_path('upload/images/webinfo'), $logo);
                $webInfo->logo = $logo;
            }
            if($request->hasFile('banner_ad')){
                $image_url = public_path('upload/images/webinfo').'/'. $webInfo->banner_ad;

                if($webInfo->banner_ad) {
                    if(File::exists($image_url)){
                        unlink($image_url);
                    }
                }
                $banner_ad = time() . '.' . $request->banner_ad->extension();

                $request->banner_ad->move(public_path('upload/images/webinfo'), $banner_ad);
                $webInfo->banner_ad = $banner_ad;
            }

            $webInfo->update();
        }else {
            $webInfo = new WebInfo();
            $webInfo->receiveEmail = $request->input('receiveEmail');
            $webInfo->tel1 = $request->input('tel1');
            $webInfo->tel2 = $request->input('tel2');
            $webInfo->hotline = $request->input('hotline');
            $webInfo->facebook = $request->input('facebook');
            $webInfo->reason = $request->input('reason');
            $webInfo->promotion = $request->input('promotion');
            $webInfo->tutorial = $request->input('tutorial');
            $webInfo->address = $request->input('address');
            $webInfo->title = $request->input('title');
            $webInfo->description = $request->input('description');
            $webInfo->info = $request->input('info');
            $webInfo->site_name = $request->input('site_name');
            $webInfo->keywords = $request->input('keywords');
            $webInfo->sale = $request->input('sale');
            $webInfo->gift = $request->input('gift');
            $webInfo->link_map = $request->input('link_map');
            if($request->hasFile('image_web')){
                $image_url = public_path('upload/images/webinfo').'/'. $webInfo->image_web;

                if($webInfo->image_web) {
                    if(File::exists($image_url)){
                        unlink($image_url);
                    }
                }
                $image_web = time() . '.' . $request->image_web->extension();

                $request->image_web->move(public_path('upload/images/webinfo'), $image_web);
                $webInfo->image_web = $image_web;
            }
            if($request->hasFile('logo')){
                $image_url = public_path('upload/images/webinfo').'/'. $webInfo->logo;

                if($webInfo->logo) {
                    if(File::exists($image_url)){
                        unlink($image_url);
                    }
                }
                $logo = time() . '.' . $request->logo->extension();

                $request->logo->move(public_path('upload/images/webinfo'), $logo);
                $webInfo->logo = $logo;
            }
            if($request->hasFile('banner_ad')){
                $image_url = public_path('upload/images/webinfo').'/'. $webInfo->banner_ad;

                if($webInfo->banner_ad) {
                    if(File::exists($image_url)){
                        unlink($image_url);
                    }
                }
                $banner_ad = time() . '.' . $request->banner_ad->extension();

                $request->banner_ad->move(public_path('upload/images/webinfo'), $banner_ad);
                $webInfo->banner_ad = $banner_ad;
            }

            $webInfo->save();
        }
        return redirect()->route('admin.webinfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function show(WebInfo $webInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(WebInfo $webInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebInfo $webInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebInfo $webInfo)
    {
        //
    }
}
