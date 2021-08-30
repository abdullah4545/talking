@extends('admin.master')

@section('adminMainContent')

    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Manufacture List</h4>
                <button class="btn btn-info">Manage</button>
            </div>

            <div class="card-body">
                <!-- Striped Tables -->
                <table class="table table-striped mt-4">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Logo</th>
                            <th scope="col" style="text-align:center;">Email</th>
                            <th scope="col" style="text-align:center;">Number</th>
                            <th scope="col" style="text-align:center;">Adress</th>
                            <th scope="col" style="text-align:center;">Action</th>
                        </tr>
                    </thead>

                    <tbody class="talkingInfoTable">
                        @foreach($talkingInfo as $talkingInfo)
                            <tr class="text-center" data-id="{{ $talkingInfo->id }}" id="talkingInfo{{$talkingInfo->id}}">
                                <th>{{ $talkingInfo->id }}</th>
                                <td id="logo">
                                    <div class="imgTable" style="width:100px;height:100px;border:1px solid">
                                        <img id="logoImg" style="width:100px;height:100px;border:1px solid" src="{{ asset($talkingInfo->file)}}" alt="" style="">
                                    </div>
                                </td>
                                <td id="talkingEmail">{{ $talkingInfo->email }}</td>
                                <td id="talkingNumber">{{ $talkingInfo->phoneNumber }}</td>
                                <td id="talkingAdress">{{ $talkingInfo->adress }}</td>
                                <td style="width:200px">
                                    <button type="button" class="btn btn-secondary talkingInfoEdit" data-target="#editModalTalkingInfo" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit Menu"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>

           <!---edit model--->
            <div class="modal" id="editModalTalkingInfo">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background: lightgray;border-radius: 6px 6px 0px 0px;">
                            <h5 class="modal-title">Please Re-enter Your Website Info</h5>
                            <button class="btn close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="editTalkingInfo" name="form" enctype="multipart/form-data">
                                @csrf
                                <div class="updateMessage"></div>
                                <div class="form-group">
                                    <label for="InputEmail" class="control-label">Enter Email</label>
                                    <div class="webEmail">
                                        <input type="email" class="form-control" name="email" id="editTalkingInfoEmail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputNumber" class="control-label">Enter Number</label>
                                    <div class="webNumber">
                                        <input type="text" class="form-control" name="phoneNumber" id="editTalkingInfoNumber">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputAdress" class="control-label">Enter Adress</label>
                                    <div class="webAdress">
                                        <input type="text" class="form-control" name="adress" id="editTalkingInfoAdress">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="webDescription" class="control-label">Talking Description</label>
                                    <div class="webDescription">
                                        <textarea class="form-control" name="talkingDescription" id="editTalkingDescription" row="8"></textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="logo" class="control-label">Choose Web Logo</label>
                                    <div class="weblogoFile">
                                        <input type="file" name="file" id="editFile" >
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Update Info</button>
                                </div>
                            </form>


                        </div>




                    </div>
                </div>
            </div>






        </div>

    </section>




@endsection
