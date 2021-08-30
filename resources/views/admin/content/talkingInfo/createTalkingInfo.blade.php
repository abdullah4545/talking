@extends('admin.master')

@section('adminMainContent')

    <div class="hTxt text-center">
        <h4 class="hTxtH4">Add Talking Information</h4>
    </div>

    <div class="successSMS" style="margin-left: 60px;margin-right: 60px;"></div>

    <div class="webInfoForm" style="margin-left: 60px;margin-right: 60px;">
        <form id="talkingInfo" name="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="InputEmail" class="control-label">Enter Email</label>
                <div class="webEmail">
                    <input type="email" class="form-control" name="email" id="talkingInfoEmail">
                </div>
            </div>
            <div class="form-group">
                <label for="InputNumber" class="control-label">Enter Number</label>
                <div class="webNumber">
                    <input type="text" class="form-control" name="phoneNumber" id="talkingInfoNumber">

                </div>
            </div>
            <div class="form-group">
                <label for="InputAdress" class="control-label">Enter Adress</label>
                <div class="webAdress">
                    <input type="text" class="form-control" name="adress" id="talkingInfoAdress">

                </div>
            </div>
            <div class="form-group">
                <label for="webDescription" class="control-label">Talking Description</label>
                <div class="webDescription">
                    <textarea class="form-control" name="talkingDescription" id="talkingDescription" row="8"></textarea>

                </div>
            </div>
            <div class="form-group">
                <label for="logo" class="control-label">Choose Web Logo</label>
                <div class="weblogoFile">
                    <input type="file" name="file" id="file" >
                </div>
            </div>
            <div class="form-group">
                <div class="submitBtnmanufacture">
                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>


@endsection
