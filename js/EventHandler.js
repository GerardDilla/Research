
filtertype = {
    'category':1,
    'department':2,
    'search':3,	
    'unpublished':4
};

$(document).ready(function(){

    //Event Handlers and triggers

    //--Auto Run

        GetCategories();

        GetFiles();

        GetDepartment();

        GetCategoryChoices();

        GetDepartmentChoices();

        GetCategoryManagerList();

        GetAccounts();

        GetExternalAccounts();

    //--Auto Run

    $('.category-filter-panel').on('click','.category_filter', function(){
        //alert($(this).data('category-id'));
        AddFilter(filtertype['category'],$(this).data('category-id'),$(this).data('category-name'));
    });

    $('.department-filter-panel').on('click','.department_filter', function(){
        //alert($(this).data('category-id'));
        AddFilter(filtertype['department'],$(this).data('department-id'),$(this).data('department-name'));
    });

    $('.active-filters').on('click','.file-filter',function(){
        RemoveFilter(this);
    });

    $('.rdo-files-panel').on('click','.rdo-panels',function(){
        GetLink(this);
    });

    $('#cert_form').submit(function(e){
        e.preventDefault(); 
        EditCertificate(this);
    }); 

    $('#AddPeerForm').submit(function(e){
        e.preventDefault(); 
        addPeerStatus = AddPeerAccount(this);
        addPeerStatus.done(function(data){

            $('.peer_message').html(data);

        });
    }); 

    $(document).keypress(function(event){
        if(event.keyCode == 13){
            if($('#rdo_search').is(":focus")){
                if($('#rdo_search').val() != ''){
                    AddFilter(filtertype['search'],$('#rdo_search').val(),$('#rdo_search').val());
                }
            }
        }
    });

    $('#unpublished').click(function(){
        AddFilter(filtertype['unpublished'],2,'Unpublished');
    });
    
    $('#pdf_upload').change(function(obj){
        
        if(obj.target.files.length != 0){
            fileName = obj.target.files[0].name;
            $('.pdf_filename').html('<p>'+fileName+'</p>');
        }else{
            $('.pdf_filename').html('NO FILE SELECTED');
        }

    });

    $('#new_pdf_upload').change(function(obj){
        
        if(obj.target.files.length != 0){
            fileName = obj.target.files[0].name;
            $('.new_pdf_filename').html('<p>'+fileName+'</p>');
        }else{
            $('.new_pdf_filename').html('NO FILE SELECTED');
        }

    });

    $('#updateFile').click(function(){

        $("#File_Edit_Upload").submit();
        
    });

    $("#New_File").on('submit',function(e){

        e.preventDefault();
        Init_FileNew(this);

    });
    
    $("#File_Edit_Upload").on('submit',function(e){

        e.preventDefault();
        Init_FileEdit(this);

    });

    $('#ViewFile').click(function(){

        file = $(this).val();
        window.open(base_url()+'researches/'+file,'_blank');

    });

    $('#DeleteEntry').click(function(){

        Init_FileDelete();
    });
    
    $('#category_manage_list').on('click','.editCategory',function(){

        CategoryID = $(this).val();
        OpenCategoryEdit($(this).val());
        
    });

    $('#category_search').change(function(){
        
        GetCategoryManagerList($(this).val())

    });

    $('.categoryEditSubmit').click(function(){

        Init_CategoryUpdate();

    });

    $('.categoryEditSubmit').click(function(){

        Init_CategoryUpdate();

    });
    
    $('.newCategoryButton').click(function(){

        $("#category_form_new").submit();

    });

    $("#category_form_new").on('submit',function(e){

        e.preventDefault();
        Init_CategoryNew(this);

    });

    $('#category_manage_list').on('click','.removeCategory',function(){

        CategoryID = $(this).val();
        var answer = confirm("Deleting this Category will set all Entries under this as 'Uncategorized'. Are you sure you want to Delete?");

        if (answer == true) {
            Init_CategoryDelete(CategoryID);
        } 
    });

    $('.addAccount_Button').click(function(){

        $("#addAdmin_form").submit();

    });

    $('#addAdmin_form').on('submit',function(e){

        e.preventDefault();
        Init_AccountNew(this);

    });

    $('#account_search').change(function(){

        GetAccounts({searchkey:$(this).val()});

    });

    $('#account_manage_list').on('click','.editAdmin',function(){

        
        OpenAdminEdit($(this).val());
        
    });

    $('.accountEditSubmit').click(function(){

        $('#editAdmin_form').submit();

    });

    $('#editAdmin_form').submit(function(e){

        e.preventDefault();
        Init_AccountEdit(this);

    });

    $('#editAdmin_form').on('change keyup paste', ':input', function(e) {
        $('.accountEditSubmit').show();
    });

    $('#external_account_search').change(function(){

        GetExternalAccounts({searchkey:$(this).val()});

    });

    $('#external_account_list').on('click','.editExternal',function(){
        
        OpenExternalEdit($(this).val());

    });

    $('#editExternal_form').on('change keyup paste', ':input', function(e) {
       
        $('.externalAccountEditSubmit').show();

    });
    
    $('.externalAccountEditSubmit').click(function(){

        $('#editExternal_form').submit();

    });

    $('#editExternal_form').submit(function(e){

        e.preventDefault();
        Init_ExternalAccountEdit(this);

    });

    $('#account_manage_list').on('click','.removeAdmin',function(){

        ExternalID = $(this).val();
        var answer = confirm("Are you sure you want to delete this account?");
        if(answer == true){

            Init_AdminDeativate(ExternalID);

        }

    });

    $('#external_account_list').on('click','.removeExternal',function(){

        ExternalID = $(this).val();
        var answer = confirm("Are you sure you want to delete this account?");
        if(answer == true){

            Init_ExternalDeativate(ExternalID);

        }
    });

    $('.AccountSettings').click(function(){

        $('#AccountSettingsModal').modal('show');


    });
    


});