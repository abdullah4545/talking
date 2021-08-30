
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


//save talking info
$('#talkingInfo').submit(function(e){
    e.preventDefault();

    $.ajax({
        type:'POST',
        url:'/talking/store-talkingInfo',
        processData: false,
        contentType: false,
        data:new FormData(this),


        success:function(data){
            let message = ('.successSMS');
            $(message).append(`<div class="alert alert-success">Web information save successfylly</div>`);


            $('#talkingInfoEmail').val('');
            $('#talkingInfoNumber').val('');
            $('#talkingInfoAdress').val('');
            $('#talkingDescription').val('');
            $('#file').val('');

        },
        error:function(error){
            console.log(error);
        },
    });


});


//edit Web Info
$(document).on('click', '.talkingInfoEdit', function(){
    let talkingInfoId = $(this).closest('tr').data('id');

    $.ajax({
       type:'GET',
       url:'/talking/edit-talkingInfo/'+talkingInfoId,

       success:function(data){
            $('#editTalkingInfo').find('#editTalkingInfoEmail').val(data.email);
            $('#editTalkingInfo').find('#editTalkingInfoNumber').val(data.phoneNumber);
            $('#editTalkingInfo').find('#editTalkingInfoAdress').val(data.adress);
            $('#editTalkingInfo').find('#editTalkingDescription').val(data.talkingDescription);
            $('#editTalkingInfo').attr('data-id', data.id);
       },
       error:function(error){
            console.log(error);
       }


    });


});

//update talking info
$('#editTalkingInfo').submit(function(e){
    e.preventDefault();

    let talkingId=$('#editTalkingInfo').data('id');

    $.ajax({
        type:'POST',
        url:'/talking/update-talkingInfo/'+talkingId,
        processData: false,
        contentType: false,
        data:new FormData(this),


        success:function(data){
            let message = ('.updateMessage');
            $(message).append(`<div class="alert alert-success">Manufacture information Update successfylly</div>`);


            $('#editTalkingInfoEmail').val('');
            $('#editTalkingInfoNumber').val('');
            $('#editTalkingInfoAdress').val('');
            $('#editTalkingDescription').val('');
            $('#editFile').val('');

            let updateRow = $('.talkingInfoTable').find('tr[data-id="'+talkingId+'"]');
            $(updateRow).find('td#talkingEmail').text(data.email);
            $(updateRow).find('td#talkingNumber').text(data.phoneNumber);
            $(updateRow).find('td#talkingAdress').text(data.adress);
            $(updateRow).find('#logoImg').attr('src', data.file);
        },
        error:function(error){
            console.log(error);
        },
    });


});









});


