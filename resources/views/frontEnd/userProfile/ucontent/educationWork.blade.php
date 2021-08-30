@extends('frontEnd.userProfile.profile')

@section('contentMeta')
<div class="central-meta">
    <div class="editing-info">
        <h5 class="f-title"><i class="ti-info-alt"></i> Edit work & Education</h5>

        <div class="showEducation">
            @foreach ($educations as $education)
                <div class="eduBtn pr-2" style="float: left">
                    <button class="btn btn-secondary">{{ $education->studySubject }}</button>
                </div>
            @endforeach
        </div>
        <div class="successSMS mt-4"></div>

        <form id="userEducation" name="form" enctype="multipart/form-data">
            <div class="form-group" hidden>
                <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" />
            </div>
            <div class="form-group mb-0">
                <div class="radio">
                  <select name="qualification" id="qualification">
                      <option>Select Education</option>
                      <option value="Graduate">School</option>
                      <option value="Masters">College</option>
                      <option value="Graduate">Graduate</option>
                      <option value="Masters">Masters</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
              <input type="text" name="studySubject" id="studySubject" required="required" />
              <label class="control-label" for="input">Studying at</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <input type="text" name="instuteName" id="instuteName" required="required" />
                <label class="control-label" for="input">Institute Name</label><i class="mtrl-select"></i>
              </div>
            <div class="form-group half">
              <input type="text" name="studyFrom" id="studyFrom"  required="required"/>
              <label class="control-label" for="input">From</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group half">
              <input type="text" name="studyTo" id="studyTo" required="required"/>
              <label class="control-label" for="input">To</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <input name="city" id="city" type="text" required="required"/>
                <label class="control-label" for="input">City</label><i class="mtrl-select"></i>
              </div>
            <div class="form-group">
                <select name="country" id="country">
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
            <div class="submit-btns">
                <button type="button" onclick="clearEducationInfo()" class="btn"><span>Cancel</span></button>
                <button type="submit" class="btn"><span>Save</span></button>
            </div>
        </form>
    </div>
</div>
<script>
    function clearEducationInfo(){
        $('#qualification').val('');
        $('#studySubject').val('');
        $('#instuteName').val('');
        $('#studyFrom').val('');
        $('#studyTo').val('');
        $('#city').val('');
        $('#country').val('');
    }
</script>
@endsection
