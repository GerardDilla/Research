function Init_AccountNew(form){

    $('#newfile_message').html('');
    addStatus = AjaxAddAccount(form);
    addStatus.done(function(result){

        result = JSON.parse(result);
        if(result['Error'] == 1){

            $('#addAccount_message').html(result['Message']);
            
        }else{
            
            $('#addAccount_message').html(result['Message']);
            $('#add_rdo_admin_username').val('');
            $('#add_rdo_admin_name').val(''); 
            $('#add_rdo_admin_pass1').val('');
            $('#add_rdo_admin_pass2').val('');
            GetAccounts();
            
        }
        
        
    });

}

function Init_AccountEdit(form){
    
    $('#admin_update_message').html('');
    editStatus = EditAccount(form);
    editStatus.done(function(result){

        result = JSON.parse(result);
        if(result['Error'] == 1){

            $('#admin_update_message').html(result['Message']);
            
        }else{
            
            $('#admin_update_message').html(result['Message']);
            $('#edit_rdo_admin_pass1').val('');
            $('#edit_rdo_admin_pass2').val('');
            GetAccounts();
            
        }
        
        
    });

}

function Init_AccountDeativate(form){
    
    editStatus = EditAccount(form);
    editStatus.done(function(result){

        result = JSON.parse(result);
        if(result['Error'] == 1){

            $('ModalMessage').modal('show');
            $('#admin_update_message').html(result['Message']);
            
        }else{
            
            $('#admin_update_message').html(result['Message']);
            $('#edit_rdo_admin_pass1').val('');
            $('#edit_rdo_admin_pass2').val('');
            GetAccounts();
            
        }
        
        
    });

}

function Init_AdminDeativate(AdminID){
    
    input = {
        rdo_admin_id:AdminID
    }
    deleteStatus = AjaxDeleteAdmin(input);
    deleteStatus.done(function(result){

        result = JSON.parse(result);
        $('#ModalMessage').modal('show');
        if(result['Error'] == 1){

            $('#ModalMessageText').html(result['Message']);
            
        }else{
            
            $('#ModalMessageText').html(result['Message']);
            GetAccounts();
            
        }
        
    });

}

function Init_ExternalDeativate(ID){
    
    input = {
        ID:ID
    }
    deleteStatus = AjaxDeleteExternal(input);
    deleteStatus.done(function(result){

        result = JSON.parse(result);
        $('#ModalMessage').modal('show');
        if(result['Error'] == 1){

            $('#ModalMessageText').html(result['Message']);
            
        }else{
            
            $('#ModalMessageText').html(result['Message']);
            GetExternalAccounts();
            
        }
        
    });

}


function Init_ExternalAccountEdit(form){
    
    $('#external_update_message').html('');
    editStatus = EditAccount(form);
    editStatus.done(function(result){

        result = JSON.parse(result);
        if(result['Error'] == 1){

            $('#external_update_message').html(result['Message']);
            
        }else{
            
            $('#external_update_message').html(result['Message']);
            $('#edit_rdo_external_pass1').val('');
            $('#edit_rdo_external_pass2').val('');
            GetExternalAccounts();
            
        }
        
        
    });

}

function AjaxAddAccount(data){

    return $.ajax({
        url: $(data).attr('action'),
        type: $(data).attr('method'),
        data:new FormData(data),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
    });

}

function AjaxDeleteFile(inputs = {}){
    
    return $.ajax({
        url: base_url()+'index.php/Main/AjaxDeactivateEntry',
        type: "POST",
        data:inputs
    });

}

function AjaxAccountDetails(AccountID){

    return $.ajax({
        url: base_url()+'index.php/Main/AjaxGetAccountDetails',
        type: "POST",
        data:AccountID
    });

}

function AjaxExternalAccountDetails(AccountID){

    return $.ajax({
        url: base_url()+'index.php/Main/AjaxGetExternalAccountDetails',
        type: "POST",
        data:AccountID
    });

}

function AjaxGetAccounts(searchkey = []){


    return $.ajax({
        url: base_url()+'index.php/Main/AjaxGetAccounts',
        type: "GET",
        data:searchkey
    });

}

function AjaxDeleteAdmin(inputs = {}){
    
    return $.ajax({
        url: base_url()+'index.php/Main/AjaxDeactivateAdmin',
        type: "POST",
        data:inputs
    });

}

function AjaxDeleteExternal(inputs = {}){
    
    return $.ajax({
        url: base_url()+'index.php/Main/AjaxDeactivateExternal',
        type: "POST",
        data:inputs
    });

}

function AjaxGetExternalAccounts(searchkey = []){


    return $.ajax({
        url: base_url()+'index.php/Main/AjaxGetExternalAccounts',
        type: "GET",
        data:searchkey
    });

}

function OpenAdminEdit(AdminID = ''){

    $('#editAccount').modal('show');
    $('.accountEditSubmit').hide();
    $('#admin_update_message').html('');
    accountStatus = AjaxAccountDetails({id:AdminID});
    accountStatus.done(function(data){
        data = JSON.parse(data);

        //Put data into inputs
        $('#edit_admin_ID').val(AdminID);
        $('#edit_current_admin_username').val(data[0]['rdo_username']);
        $('#edit_rdo_admin_username').val(data[0]['rdo_username']);
        $('#edit_rdo_admin_name').val(data[0]['rdo_fullname']);
        $('[for="edit_rdo_admin_username"]').addClass('active');
        $('[for="edit_rdo_admin_name"]').addClass('active');


    });

}

function OpenExternalEdit(AdminID = ''){

    //alert(AdminID);

    $('#editExternalAccount').modal('show');
    $('.externalAccountEditSubmit').hide();
    
    $('#external_update_message').html('');
    accountStatus = AjaxExternalAccountDetails({id:AdminID});
    accountStatus.done(function(data){
        data = JSON.parse(data);

        //Put data into inputs 
        $('#edit_external_ID').val(AdminID);
        $('#edit_current_external_username').val(data[0]['username']);
        $('#edit_rdo_external_username').val(data[0]['username']);
        $('#edit_rdo_external_name').val(data[0]['fullname']);
        $('[for="edit_rdo_external_username"]').addClass('active');
        $('[for="edit_rdo_external_name"]').addClass('active');


    });
    
    

}

function AddPeerAccount(form){

    return $.ajax({
        url: $(form).attr('action'),
        type: $(form).attr('method'),
        data:new FormData(form),
        processData:false,
        contentType:false,
        cache:false,
        async:false
    });

}

function EditAccount(form){

    return $.ajax({
        url: $(form).attr('action'),
        type: $(form).attr('method'),
        data:new FormData(form),
        processData:false,
        contentType:false,
        cache:false,
        async:false
    });

}

function GetAccounts(searchkey = []){

    accountlist = AjaxGetAccounts(searchkey);
    accountlist.done(function(data){
        
        data = JSON.parse(data);
        $('#account_manage_list').html('');
        
        $.each(data,function(index,result){

        $('#account_manage_list').append('\
            <tr>\
            <th scope="row">'+(index + 1)+'</th>\
            <td>'+result['rdo_fullname']+'</td>\
            <td>'+result['rdo_username']+'</td>\
            <td>\
                <button type="button" class="btn btn-info editAdmin" value="'+result['rdo_admin_id']+'">\
                <i class="fa fa-pencil" aria-hidden="true"></i> Update\
                </button>\
                <button type="button" class="btn btn-rdo removeAdmin" value="'+result['rdo_admin_id']+'">\
                <i class="fa fa-trash" aria-hidden="true"></i> Remove\
                </button>\
            </td>\
            </tr>\
        ');

        });

    });

}

function GetExternalAccounts(searchkey = []){

    externalAccountlist = AjaxGetExternalAccounts(searchkey);
    externalAccountlist.done(function(data){
        
        data = JSON.parse(data);
        $('#external_account_list').html('');
        
        $.each(data,function(index,result){

        $('#external_account_list').append('\
            <tr>\
            <th scope="row">'+(index + 1)+'</th>\
            <td>'+result['fullname']+'</td>\
            <td>'+result['username']+'</td>\
            <td>\
                <button type="button" class="btn btn-info editExternal" value="'+result['ID']+'">\
                <i class="fa fa-pencil" aria-hidden="true"></i> Update\
                </button>\
                <button type="button" class="btn btn-rdo removeExternal" value="'+result['ID']+'">\
                <i class="fa fa-trash" aria-hidden="true"></i> Remove\
                </button>\
            </td>\
            </tr>\
        ');

        });

    });

}

function OpenAccountSettings(){

    accountdetails = AjaxGetAccountSettingDetails();
    accountdetails.done(function(result){



    });

}
function AjaxGetAccountSettingDetails(){

    return $.ajax({
        url: base_url()+'index.php/Main/AjaxGetExternalAccounts',
        type: "GET"
    });


}
