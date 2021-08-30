<aside class="sidebar static">
    <div class="widget">
        <h4 class="widget-title">Recent Activity</h4>
        <ul class="activitiez">
            <li>
                <div class="activity-meta">
                    <i>10 hours Ago</i>
                    <span><a title="" href="#">Commented on Video posted </a></span>
                    <h6>by <a href="time-line.html">black demon.</a></h6>
                </div>
            </li>
            <li>
                <div class="activity-meta">
                    <i>30 Days Ago</i>
                    <span><a title="" href="#">Posted your status. “Hello guys, how are you?”</a></span>
                </div>
            </li>
            <li>
                <div class="activity-meta">
                    <i>2 Years Ago</i>
                    <span><a title="" href="#">Share a video on her timeline.</a></span>
                    <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                </div>
            </li>
        </ul>
    </div>
    <div class="widget stick-widget">
        <h4 class="widget-title">Add Information</h4>
        <ul class="naves">
            <li>
                <i class="ti-mouse-alt"></i>
                <a href="" data-target="#userEducation" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user education">Educations</a>
            </li>
            <li>
                <i class="ti-heart"></i>
                <a href=""data-target="#userWorkPlace" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user interest">Work Place</a>
            </li>
            <li>
                <i class="ti-heart"></i>
                <a href=""data-target="#userInterest" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit user interest">My interests</a>
            </li>
        </ul>


        <!--- Education--->
        <div class="modal" id="userEducation">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                        <h5 class="modal-title text-light"><i class="ti-info-alt"></i>Education</h5>
                        <button class="btn close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="successEducation ml-4 mt-4 mr-4 mb-0"></div>
                    <div class="modal-body">
                        <form id="userEducation" name="form" enctype="multipart/form-data">
                            @csrf
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--- work Place--->
        <div class="modal" id="userWorkPlace">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                        <h5 class="modal-title text-light"><i class="ti-info-alt"></i> Work</h5>
                        <button class="btn close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="successSaveWork ml-4 mt-4 mr-4 mb-0"></div>
                    <div class="modal-body">
                        <form id="saveWork" name="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" hidden>
                                <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Company" id="Company" required="required" />
                                <label class="control-label" for="input">Company</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Position" id="Position" required="required" />
                                <label class="control-label" for="input">Position</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="City" id="City" required="required" />
                                <label class="control-label" for="input">City / Town</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <textarea rows="2" name="Description" id="Description" required="required"></textarea>
                                <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
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
        <!--- userInterest--->
        <div class="modal" id="userInterest">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="modal-header" style="background: rgb(157, 136, 231);border-radius: 6px 6px 0px 0px;">
                        <h5 class="modal-title text-light"><i class="ti-info-alt"></i> My Interests</h5>
                        <button class="btn close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="successSMS ml-4 mt-4 mr-4 mb-0"></div>
                    <div class="modal-body">
                        <form id="saveInterest" name="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" hidden>
                                <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="userfirst" id="userfirst" required="required" />
                                <label class="control-label" for="input">First Interest</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="userSec" id="userSec" required="required" />
                                <label class="control-label" for="input">Second Interest</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="userthird" id="userthird" required="required" />
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



</aside>
