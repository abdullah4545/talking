@extends('frontEnd.userProfile.profile')

@section('contentMeta')
<div class="central-meta">
    <div class="editing-info">
        <h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>
            <!---success Sms--->
        <div class="successSMS"></div>


        <form id="edituUserBasicInfo" name="form" enctype="multipart/form-data" data-id="{{$userBasicInfoById->id}}">
            @csrf

            <div class="form-group mb-0">
                <label for="name" style="color: #088dcd;" >Name</label>
                <input type="text" name="userName" style="color: #2a2a2a;" id="edituserName" value="{{$userBasicInfoById->userName}}" required="required" readonly />
            </div>
            <div class="form-group" hidden>
                <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" />
            </div>
            <div class="form-group">
              <label for="name" style="color: #088dcd;" >Your Email</label>
              <input type="text" name="userEmail" style="color: #2a2a2a;" id="edituserEmail" value="{{$userBasicInfoById->userEmail}}" required="required" readonly />
            </div>
            <div class="form-group">
              <input type="text" name="userPhone" id="edituserPhone" value="{{$userBasicInfoById->userPhone}}" required="required"/>
              <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <span style="padding-left: 2px;font-size: 14px;">Birth Date</span>
                <input type="date" id="editbirthday" name="birthday">
            </div>
            <div class="form-group">
              <div class="radio">
                <select name="gender" id="editgender">
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <input name="city" id="editcity" type="text"  value="{{$userBasicInfoById->city}}" required="required"/>
              <label class="control-label" for="input">City</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
              <select name="country" id="editcountry">
                  <option value="country">Country</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Ƭand Islands">Ƭand Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
              </select>
            </div>
            <div class="form-group">
              <textarea rows="2" name="textAbout" id="edittextAbout" required="required">{{$userBasicInfoById->textAbout}}</textarea>
              <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <div class="submitBtnmanufacture">
                    <button type="submit" name="btn" class="btn  btn-block" style="background: #088dcd">Update Info</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
