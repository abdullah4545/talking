@extends('frontEnd.master')

@section('homeContent')

<section>
    @include('frontEnd.userProfile.uincludes.utopbar')
</section><!-- top area -->

<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row" id="page-contents">


                        <div class="col-md-12">
                            <div class="central-meta">
                                <div class="about">
                                    <div class="personal">
                                        <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <div class="d-flex flex-row mt-2">
                                        <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" style="width: 35%;text-align: center;padding: 5px;">
                                            <li class="nav-item" style="padding: 12px;">
                                                <a href="#overView" style="padding: 12px;font-size: 17px;" class="nav-link active" data-toggle="tab" >Over View</a>
                                            </li>
                                            <li class="nav-item" style="padding: 12px;">
                                                <a href="#basic" style="padding: 12px;font-size: 17px;" class="nav-link" data-toggle="tab" >Basic info</a>
                                            </li>
                                            <li class="nav-item" style="padding: 12px;">
                                                <a href="#location" style="padding: 12px;font-size: 17px;" class="nav-link" data-toggle="tab" >location</a>
                                            </li>
                                            <li class="nav-item" style="padding: 12px;">
                                                <a href="#work" style="padding: 12px;font-size: 17px;" class="nav-link" data-toggle="tab" >Education</a>
                                            </li>
                                            <li class="nav-item" style="padding: 12px;">
                                                <a href="#lang" style="padding: 12px;font-size: 17px;" class="nav-link" data-toggle="tab" >Work</a>
                                            </li>
                                            <li class="nav-item" style="padding: 12px;">
                                                <a href="#interest" style="padding: 12px;font-size: 17px;" class="nav-link" data-toggle="tab"  >Interests</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="overView" >
                                                <ul class="basics">
                                                    @if(empty($overviewWork))
                                                        <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-agenda" style="margin-right: 24px;font-size: 20px;"></i>
                                                            {{''}}
                                                        </li>
                                                    @else
                                                        <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-agenda" style="margin-right: 24px;font-size: 20px;"></i>
                                                            Work at
                                                            <b style="color: black">
                                                                {{$overviewWork->Company}}
                                                            </b>
                                                                &nbsp;as&nbsp;
                                                                {{$overviewWork->Position}}

                                                        </li>
                                                    @endif

                                                    @if(empty($overviewEdu))
                                                        <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-paint-bucket " style="margin-right: 24px;font-size: 20px;"></i>
                                                            {{''}}
                                                        </li>
                                                    @else
                                                        <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-paint-bucket " style="margin-right: 24px;font-size: 20px;"></i>
                                                            Study at
                                                            <b style="color: black">
                                                                {{$overviewEdu->instuteName}},
                                                            </b>
                                                                &nbsp;
                                                                {{$overviewEdu->city}}

                                                        </li>
                                                    @endif
                                                    <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-home" style="margin-right: 24px;font-size: 20px;"></i>Lives in &nbsp;{{$userBasicInfo->city}},&nbsp;{{$userBasicInfo->country}}. </li>
                                                    <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-location-pin" style="margin-right: 24px;font-size: 20px;"></i>From &nbsp;{{$userBasicInfo->city}},&nbsp;{{$userBasicInfo->country}}. </li>
                                                    <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;"><i class="ti-user" style="margin-right: 24px;font-size: 20px;"></i><a href="">{{$userBasicInfo->userPhone}}<br> <span style="padding-left: 44px;color:lightgray;font-weight:normal;" >mobile</span> </a></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade show" id="basic" >
                                                <ul class="basics">
                                                    <li><i class="ti-user"></i>{{$userBasicInfo->userName}}</li>
                                                    <li><i class="ti-map-alt" style="margin-right: 24px;"></i>live in &nbsp;{{$userBasicInfo->city}} &nbsp;{{$userBasicInfo->country}}</li>
                                                    <li><i class="ti-mobile"></i>{{$userBasicInfo->userPhone}}</li>
                                                    <li><i class="ti-email"></i><a href="">{{$userBasicInfo->userEmail}}</a></li>
                                                    <li><i class="ti-map-alt"></i><a href="">{{$userBasicInfo->gender}}</a></li>
                                                    <li><i class="ti-user"></i><a href="">{{$userBasicInfo->birthday}}</a></li>
                                                </ul>
                                                <div class="buttonForBasisInfo">
                                                    <a href="" data-target="#userBasicInfo" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user basic"><button class="btn btn-primary"><i class=" ti-pencil-alt"></i></button></a>
                                                </div>
                                                <!--- User basic info--->
                                                <div class="modal" id="userBasicInfo">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="border-radius: 10px;">
                                                            <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                                                                <h5 class="modal-title text-light"><i class="ti-info-alt"></i> Edit work & Education</h5>
                                                                <button class="btn close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="successBasic ml-4 mt-4 mr-4 mb-0"></div>
                                                            <div class="modal-body">
                                                                <form id="edituUserBasicInfo" name="form" enctype="multipart/form-data" data-id="{{$userBasicInfo->id}}">
                                                                    @csrf

                                                                    <div class="form-group mb-0">
                                                                        <label for="name" style="color: #088dcd;" >Name</label>
                                                                        <input type="text" name="userName" style="color: #2a2a2a;" id="edituserName" value="{{$userBasicInfo->userName}}" required="required" readonly />
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                        <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label for="name" style="color: #088dcd;" >Your Email</label>
                                                                    <input type="text" name="userEmail" style="color: #2a2a2a;" id="edituserEmail" value="{{$userBasicInfo->userEmail}}" required="required" readonly />
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <input type="text" name="userPhone" id="edituserPhone" value="{{$userBasicInfo->userPhone}}" required="required"/>
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
                                                                    <input name="city" id="editcity" type="text"  value="{{$userBasicInfo->city}}" required="required"/>
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
                                                                    <textarea rows="2" name="textAbout" id="edittextAbout" required="required">{{$userBasicInfo->textAbout}}</textarea>
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
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="location" role="tabpanel">
                                                <div class="location-map">
                                                    <div id="map-canvas"></div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="work" role="tabpanel">
                                                <div class="educationUser">
                                                    <ul class="education">
                                                        @if(empty($userEducation))
                                                            <li><b style="color: black"></b>{{''}}</li>
                                                        @else
                                                            @foreach ($userEducation as $userEducation)

                                                                <li class="educations" id="educationLi{{$userEducation->id}}"  data-id="{{$userEducation->id}}" >
                                                                    <b style="color: black">
                                                                        {{$userEducation->studySubject}}
                                                                    </b>
                                                                        &nbsp;from&nbsp;
                                                                        {{$userEducation->instuteName}}

                                                                        <div class="btnEdu">
                                                                            <a href="" data-target="#editUserEducation" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user work">
                                                                                <button class="btn btn-primary" onclick="editEducation({{$userEducation->id}})" style="padding:3px;padding-left: 0px;padding-bottom: 0;width:26px;background:white"><i class=" ti-pencil-alt" style="font-size: 20px;margin-left: 3px;"></i></button>
                                                                           </a>
                                                                           <button onclick="deleteUserEducation({{$userEducation->id}})" class="btn btn-danger" style="padding:3px;padding-left: 0px;padding-bottom: 0;width:24px;background:white"><i class=" ti-trash " style="font-size: 20px"></i></button>
                                                                        </div>

                                                                </li>
                                                                <div class="modal" id="editUserEducation">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content" style="border-radius: 10px;">
                                                                            <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                                                                                <h5 class="modal-title text-light"><i class="ti-info-alt"></i>Education</h5>
                                                                                <button class="btn close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="successEducation ml-4 mt-4 mr-4 mb-0"></div>
                                                                            <div class="modal-body">
                                                                                <form id="editEducation" name="form" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="form-group" hidden>
                                                                                        <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}"/>
                                                                                    </div>
                                                                                    <div class="form-group mb-0">
                                                                                        <div class="radio">
                                                                                        <select name="qualification" id="editqualification">
                                                                                            <option>Select Education</option>
                                                                                            <option value="Graduate">School</option>
                                                                                            <option value="Masters">College</option>
                                                                                            <option value="Graduate">Graduate</option>
                                                                                            <option value="Masters">Masters</option>
                                                                                        </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                    <input type="text" name="studySubject" id="editstudySubject" required="required" />
                                                                                    <label class="control-label" for="input">Studying at</label><i class="mtrl-select"></i>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="text" name="instuteName"id="editinstuteName" required="required" />
                                                                                        <label class="control-label" for="input">Institute Name</label><i class="mtrl-select"></i>
                                                                                    </div>
                                                                                    <div class="form-group half">
                                                                                    <input type="text" name="studyFrom" id="editstudyFrom"  required="required"/>
                                                                                    <label class="control-label" for="input">From</label><i class="mtrl-select"></i>
                                                                                    </div>
                                                                                    <div class="form-group half">
                                                                                    <input type="text" name="studyTo" id="editstudyTo" required="required"/>
                                                                                    <label class="control-label" for="input">To</label><i class="mtrl-select"></i>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input name="city" id="editcityi" type="text" required="required"/>
                                                                                        <label class="control-label" for="input">City</label><i class="mtrl-select"></i>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <select name="country" id="editcountryi">
                                                                                            <option value="country">Select Country</option>
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
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="lang" role="tabpanel">
                                                <ul class="basics">
                                                    @if(empty($userWork))
                                                        <li><b style="color: black"></b>{{''}}</li>
                                                    @else
                                                        @foreach ($userWork as $userWork)
                                                        <div class="workPart p-2">
                                                            <li class="works" id="workLi{{$userWork->id}}"  data-id="{{$userWork->id}}" >
                                                                Work at
                                                                <b style="color: black">
                                                                    {{$userWork->Company}}
                                                                </b>
                                                                    &nbsp;as&nbsp;
                                                                    {{$userWork->Position}}

                                                                    <div class="btnwork">
                                                                        <a href="" data-target="#editUserWork" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user work">
                                                                            <button class="btn btn-primary" onclick="editUserWork({{$userWork->id}})" style="padding:3px;padding-left: 0px;padding-bottom: 0;width:26px;background:white"><i class=" ti-pencil-alt" style="font-size: 17px;margin-left: 3px;color:black"></i></button>
                                                                       </a>
                                                                       <button onclick="deleteUserWork({{$userWork->id}})" class="btn btn-danger" style="padding:3px;padding-left: 0px;padding-bottom: 0;width:24px;background:white"><i class=" ti-trash " style="font-size: 20px;color:black"></i></button>
                                                                    </div>

                                                            </li>
                                                            <!--- work Place--->
                                                            <div class="modal" id="editUserWork">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content" style="border-radius: 10px;">
                                                                        <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                                                                            <h5 class="modal-title text-light"><i class="ti-info-alt"></i> Work</h5>
                                                                            <button class="btn close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="successUpdateWork ml-4 mt-4 mr-4 mb-0"></div>
                                                                        <div class="modal-body">
                                                                            <form id="updateWork" name="form" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="form-group" hidden>
                                                                                    <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" data-id="{{$userWork->id}}"/>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="text" name="Company" id="editCompany" required="required" />
                                                                                    <label class="control-label" for="input">Company</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="text" name="Position" id="editPosition" required="required" />
                                                                                    <label class="control-label" for="input">Position</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="text" name="City"  id="editCity" required="required" />
                                                                                    <label class="control-label" for="input">City / Town</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <textarea rows="2" name="Description" id="editDescription" required="required">{{$userWork->Description}}</textarea>
                                                                                    <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="interest" role="tabpanel">
                                                <ul class="basics">
                                                    @if(empty($userInterest))
                                                        <li><b style="color: black"></b>{{''}}</li>
                                                    @else
                                                        @foreach ($userInterest as $userInterest)
                                                        <div class="educationPart p-2">
                                                            <li class="works" id="interestLi{{$userInterest->id}}"  data-id="{{$userInterest->id}}" >
                                                                I am interested in
                                                                <b style="color: black">
                                                                    {{$userInterest->userfirst}},&nbsp;{{$userInterest->userSec}},&nbsp;{{$userInterest->userthird}}
                                                                </b>

                                                                    <div class="btnwork">
                                                                        <a href="" data-target="#editUserInterest" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user work">
                                                                            <button class="btn btn-primary" onclick="editUserInterest({{$userInterest->id}})" style="padding:3px;padding-left: 0px;padding-bottom: 0;width:26px;background:white"><i class=" ti-pencil-alt" style="font-size: 17px;margin-left: 3px;color:black"></i></button>
                                                                       </a>
                                                                       <button onclick="deleteUserInterest({{$userInterest->id}})" class="btn btn-danger" style="padding:3px;padding-left: 0px;padding-bottom: 0;width:24px;background:white"><i class=" ti-trash " style="font-size: 20px;color:black"></i></button>
                                                                    </div>

                                                            </li>
                                                            <!--- User Interests--->
                                                            <div class="modal" id="editUserInterest">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content" style="border-radius: 10px;">
                                                                        <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                                                                            <h5 class="modal-title text-light"><i class="ti-info-alt"></i> Work</h5>
                                                                            <button class="btn close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="successUpdateInterest ml-4 mt-4 mr-4 mb-0"></div>
                                                                        <div class="modal-body">
                                                                            <form id="updateInterest" name="form" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="form-group" hidden>
                                                                                    <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" data-id="{{$userInterest->id}}"/>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="text" name="userfirst" id="edituserfirst" required="required" />
                                                                                    <label class="control-label" for="input">First Interest</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="text" name="userSec" id="edituserSec" required="required" />
                                                                                    <label class="control-label" for="input">Second Interest</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="text" name="userthird" id="edituserthird" required="required" />
                                                                                    <label class="control-label" for="input">Last Interest</label><i class="mtrl-select"></i>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- centerl meta -->

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="central-meta" style="border-radius: 12px;">
                        <div class="profilePic" style="padding-left: 15px;color: black;">
                            <h4 style="font-weight: bold;">Friends</h4>
                        </div>
                        <ul class="vedios" style="text-align: center;">



                        </ul>
                        <div class="lodmore text-center"> <b> No Friends Yet</b></div>
                    </div><!-- photos -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="central-meta" style="border-radius: 12px;">
                        <div class="profilePic" style="padding-left: 15px;color: black;">
                            <h4 style="font-weight: bold;">Photos</h4>
                        </div>
                        <ul class="photos" style="text-align: center;">

                            @foreach ($photos as $photo)
                                @if (empty($photo->file))
                                    <img src="" alt="" style="height: 180px">
                                @else

                                        <li id="" style="min-width: 18.9%;width: 18.9%;max-height: 200px">
                                            <a style="padding: 6px;" class="strip" href="{{asset($photo->file)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                <img src="{{asset('public/images/posts/images/'.$photo->file)}}" style="height: 180px" alt=""></a>
                                        </li>

                                @endif
                            @endforeach

                           
                        </ul>
                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                    </div><!-- photos -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="central-meta" style="border-radius: 12px;">
                        <div class="profilePic" style="padding-left: 15px;color: black;">
                            <h4 style="font-weight: bold;">Vedios</h4>
                        </div>
                        <ul class="vedios" style="text-align: center;padding: 0;">
                            @foreach ($userVideo as $userVideo)
                            
                                @if(empty($userVideo->postVideo))
                                    {{''}}
                                @else
                                <div id="postVid" style="width: 25%;float: left;">
                                    <li id="" style="width: 100%;list-style: none;">
                                        <a style="padding: 6px;" class="strip" href="{{asset('public/images/posts/videos/'.$userVideo->postVideo)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                            <video id="postVideo" src="{{asset('public/images/posts/videos/'.$userVideo->postVideo)}}" style="width: 100%;float: left;padding: 5px;" controls></video>
                                        </a>
                                    </li>
                                </div>
                                @endif
                           
                         @endforeach

                        </ul>
                        <div class="lodmore text-center"> <b> Loading ......</b></div>
                    </div><!-- videos -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function deleteUserEducation(id){
        if(confirm('Do you really want to delete this')){
            $.ajax({
                type:'DELETE',
                url: '/talking/delete-user-education/'+id,
                success: function(data){
                    $('#educationLi'+id).remove()
                },
                error:function(error){
                    console.log(error);
                }

            });
        }

    }
    function editEducation(id){

        $.ajax({
            type: 'GET',
            url: '/talking/edit-user-education/'+id,

            success: function(data){
                $('#editEducation').find('#editqualification').val(data.qualification);
                $('#editEducation').find('#editstudySubject').val(data.studySubject);
                $('#editEducation').find('#editinstuteName').val(data.instuteName);
                $('#editEducation').find('#editstudyFrom').val(data.studyFrom);
                $('#editEducation').find('#editstudyTo').val(data.studyTo);
                $('#editEducation').find('#editcityi').val(data.city);
                $('#editEducation').find('#editcountryi').val(data.country);

                $('#editEducation').attr('data-id', data.id);
            },
            error: function(error){

            }

        });


    }
    function deleteUserWork(id){
        if(confirm('Do you really want to delete this')){
            $.ajax({
                type:'DELETE',
                url: '/talking/delete-user-work/'+id,
                success: function(data){
                    $('#workLi'+id).remove()
                },
                error:function(error){
                    console.log(error);
                }

            });
        }

    }
    function editUserWork(id){

        $.ajax({
            type: 'GET',
            url: '/talking/edit-user-work/'+id,

            success: function(data){
                $('#updateWork').find('#editCompany').val(data.Company);
                $('#updateWork').find('#editPosition').val(data.Position);
                $('#updateWork').find('#editCity').val(data.City);
                $('#updateWork').find('#editDescription').val(data.Description);

                $('#updateWork').attr('data-id', data.id);
            },
            error: function(error){

            }

        });


    }

    function deleteUserInterest(id){
        if(confirm('Do you really want to delete this')){
            $.ajax({
                type:'DELETE',
                url: '/talking/delete-user-interest/'+id,
                success: function(data){
                },
                error:function(error){
                    console.log(error);
                }

            });
        }

    }
    function editUserInterest(id){

        $.ajax({
            type: 'GET',
            url: '/talking/edit-user-interest/'+id,

            success: function(data){
                $('#updateInterest').find('#edituserfirst').val(data.userfirst);
                $('#updateInterest').find('#edituserSec').val(data.userSec);
                $('#updateInterest').find('#edituserthird').val(data.userthird);

                $('#updateInterest').attr('data-id', data.id);
            },
            error: function(error){

            }

        });


    }

</script>

@endsection
