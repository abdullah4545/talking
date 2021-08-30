<?php

namespace App\Http\Controllers;

use App\Models\TalkingInfo;
use Illuminate\Http\Request;

class TalkingInfoController extends Controller
{
    public function index(){
        $talkingInfo = TalkingInfo::all();
        return view('admin.content.talkingInfo.manageTalkingInfo',['talkingInfo'=>$talkingInfo]);
    }
    public function view(){
        return view('admin.content.talkingInfo.createTalkingInfo');
    }


    public function edit($id){
        $talkingInfoById = TalkingInfo::find($id);
        if($talkingInfoById){
            return response()->json($talkingInfoById, 200);
        }else{
            return response()->json('Slider Info Does Not Found');
        }
    }
    public function store(Request $request){
        $talkingInfoById = New TalkingInfo();
        $talkingInfoById->email=$request->email;
        $talkingInfoById->phoneNumber=$request->phoneNumber;
        $talkingInfoById->adress=$request->adress;
        $talkingInfoById->talkingDescription=$request->talkingDescription;
        $talkingInfoLogo = $request->file('file');

        $name = $talkingInfoLogo->getClientOriginalName();
        $uploadPath = ('public/images/talkinglogo/');
        $talkingInfoLogo->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;

        $talkingInfoById->file=$imageUrl;

        $talkingInfoById->save();

        return response()->json($talkingInfoById, 200);
    }

    public function update(Request $request, $id){
        $talkingInfoById = TalkingInfo::find($id);
        $talkingInfoById->email=$request->email;
        $talkingInfoById->phoneNumber=$request->phoneNumber;
        $talkingInfoById->adress=$request->adress;
        $talkingInfoById->talkingDescription=$request->talkingDescription;
        $talkingInfoLogo = $request->file('file');
        if ($talkingInfoLogo) {
            unlink($talkingInfoById->file);
            $name = $talkingInfoLogo->getClientOriginalName();
            $uploadPath = ('public/images/talkinglogo/');
            $talkingInfoLogo->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        } else {
            $imageUrl = $talkingInfoById->file;
        }
        $talkingInfoById->file=$imageUrl;

        $talkingInfoById->save();

        return response()->json($talkingInfoById, 200);
    }



}
