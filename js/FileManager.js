function Init_FileEdit(form){
		
  //Refreshes the message
  //alert('submitted!');
  $('#updatemessage').html('');
  UpdateStatus = AjaxUpdateFile(form);
  UpdateStatus.done(function(result){

    result = JSON.parse(result);
    GetFiles();
    OpenFileEdit(result['FileID']);
    $('#updatemessage').html(result['Message']);
    
  });

}

function Init_FileNew(form){
		
  $('#newfile_message').html('');
  UpdateStatus = AjaxNewFile(form);
  UpdateStatus.done(function(result){

    result = JSON.parse(result);
    GetFiles();
    if(result['Error'] == 1){

      $('#newfile_message').html(result['Message']+'<hr>');

    }else{
      $('#filename_new').val('');
      $('#author_new').val('');
      $('#abstract_new').val('');
      $('.modal-category-select-new').val(0);
      $('.modal-department-select-new').val(0);

      $('#ModalMessage').modal('show');
      $('#ModalMessageText').html(result['Message']); 

    }
    
    
  });

}

function Init_FileDelete(){

  input = {
    FileID:$('#FileID').val()
  }
  deleteStatus = AjaxDeleteFile(input);
  deleteStatus.done(function(data){

    data = JSON.parse(data);

    $('#FileEdit').modal('hide');
    GetFiles();
    $('#ModalMessage').modal('show');
    $('#ModalMessageText').html(data['Message']);

  })

}

function AjaxFiles(Activefilters = []){
  console.log(Activefilters);
  return $.ajax({
    url: base_url()+'index.php/Main/AjaxGetFiles',
    type: "POST",
    data:{filters:Activefilters}
  });
}

function AjaxUpdateFile(data){

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

function AjaxNewFile(data){

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

function AjaxEditFile(inputs = {}){
			
  return $.ajax({
    url: base_url()+'index.php/Main/AjaxUpdateFile',
    type: "POST",
    data:inputs
  });

}

function AjaxFileDetails(FileID){

  return $.ajax({
    url: base_url()+'index.php/Main/AjaxGetFileDetails',
    type: "POST",
    data:{FileID:FileID}
  });

}

function GetFiles(filter = []){

  //Gets all active filters
  FilterArray = {};
  $('.file-filter').each(function(i,obj){
    //$(obj).data('filter-type');
    console.log('filter type:'+$(obj).data('filter-type'));
    console.log('filter:'+$(obj).data('filter'));
    //FilterArray[$(obj).data('filter')] = $(obj).data('filter-type');
    FilterArray[i] = {
      SearchKey:$(obj).data('filter'),
      SearchType:$(obj).data('filter-type')
    }

  });
  filesData = AjaxFiles(FilterArray);
  $('.rdo-files-panel').html('');
  filesData.done(function(file_result){
    file_result = JSON.parse(file_result);
    if(file_result.length > 0){

      $.each(file_result,function(index,result){
        $('.rdo-files-panel')
        .append(
          $('<div>').attr({
            'class':'col-md-4 rdo-panels',
            'style':'margin-top:50px',
            'data-link':base_url()+'researches/'+result['file_upload_name']+'.pdf#toolbar=0&amp;navpanes=0&amp;scrollbar=0&amp;zoom=0&amp;pagemode=thumbs&amp;page=1',
            'data-file-id':result['rdo_file_id']
          }).append(
            $('<h1>').attr({'style':'font-size:100%; overflow-y:auto; height:50px;'}).text(result['file_title'])
          ).append(
            $('<div>').attr({'class':'container-rdo'}).append(
              $('<embed>').attr({'class':'rdo_thumb','height':'250px','name':'plugin','type':'application/pdf','style':'overflow:hidden; display: block; width: 100%; height: 250px;','src':base_url()+'researches/'+result['file_upload_name']+'.pdf#toolbar=0&amp;navpanes=0&amp;scrollbar=0&amp;zoom=0&amp;pagemode=thumbs&amp;page=1'})
            ).append(
              $('<div>').attr('class','overlay-rdo').append(
                $('<div>').attr({'class':'text-rdo','style':'overflow-y:auto; height:150px; width:90%;'}).append(
                  '"'+result['research_description']+'"<hr style="background-color: white">Researcher(s): <br>'+result['research_author']
                )
              )
            )
          )
        );
      })
    }
  });
}

function AddFilter(type='',id='',name=''){

  ActiveFilters = $('.active-filters').find('.file-filter[data-filter="'+id+'"][data-filter-type="'+type+'"]');
  typename = '';
  if(ActiveFilters.length == 0){

    if(type == filtertype['category']){
      typename = 'category';
    }else if(type == filtertype['department']){
      typename = 'department';
    }else if(type == filtertype['search']){
      typename = 'search';
    }
    else if(type == filtertype['unpublished']){
      typename = 'type';
    }
    $('.active-filters').append(
      $('<button>').attr({'class':'btn btn-primary btn-sm file-filter','data-filter-type':type,'data-filter':id}).append(
        $('<span>').attr({'style':'font-weight:bold'})
      ).append(
        typename+': '+name+' <i class="fa fa-times-circle pull-right"></i>'
      )
    );
    GetFiles();
    
  }else{

    $('#filter_message').fadeIn('fast').text('Filter Already Added');
    setTimeout(function() {

      $('#filter_message').fadeOut('fast');

    }, 1000);
  }
}

function RemoveFilter(obj){

  $(obj).remove();
  //alert($('.active-filters').find('.file-filter').length);
  FilterArray = {};
  $('.file-filter').each(function(i,obj){
    //$(obj).data('filter-type');
    console.log('filter type:'+$(obj).data('filter-type'));
    console.log('filter:'+$(obj).data('filter'));
    FilterArray[$(obj).data('filter')] = $(obj).data('filter-type');
  });
  GetFiles(FilterArray);

}

function GetLink(obj){

  pdfLink = $(obj).data('link');
  file_id = $(obj).data('file-id');
  
  if($('#FileEdit').length){
    
    OpenFileEdit(file_id);
    
  }else{

    window.open(pdfLink,'_blank');

  }
}

function OpenFileEdit(FileID = ''){

  //alert(FileID);
  $('#updatemessage').html('');
  FileDetails = AjaxFileDetails(FileID);
  FileDetails.done(function(data){

    data = JSON.parse(data);

    //Puts data into the input
    $('#editTitle').html(data[0]['file_title']);
    $('#FileID').val(data[0]['rdo_file_id']);
    $('#filename_edit').val(data[0]['file_title']);
    $('#author_edit').val(data[0]['research_author']);
    $('#abstract_edit').val(data[0]['research_description']);
    $('#ViewFile').val(data[0]['file_upload_name']+'.pdf');

    //Sets up the input labels
    $('[for="abstract_edit"]').addClass('active');
    $('[for="filename_edit"]').addClass('active');
    $('[for="author_edit"]').addClass('active');

    //Gets All categories and defaults the selected category of the item
    categoryData = AjaxCategories();
    categoryData.done(function(category_result){

      category_result = JSON.parse(category_result);
      //modal Choices: Category--
      $('.modal-category-select').html('');
      selectdefault = 'selected';

      $('.modal-category-select').html(
          $('<option>').attr({'disabled':'','value':'N/A'}).text('Select Category')
      ).append(
        $('<option>').attr({'value':'0'}).text('Uncategorized')
      );
      
      $.each(category_result,function(index,result){
        $('.modal-category-select').append(
          $('<option>').attr({'value':result['rdo_category_id']}).text(result['rdo_category'],)
        );
      });
      if(data[0]['rdo_category_id'] == null || data[0]['rdo_category_id'] == 'N/A'){
        $('.modal-category-select option[value="N/A"]').attr({selected:'selected'});
      }else{
        $('.modal-category-select option[value="'+data[0]['rdo_category_id']+'"]').attr({selected:'true'});
      }
      //modal Choices: Category--

    });

    //Gets All department and defaults the selected category of the item
    departmentData = AjaxDepartment();
    departmentData.done(function(department_result){

      department_result = JSON.parse(department_result);
      //modal Choices: Department--
      $('.modal-department-select').html('');
      $('.modal-department-select').html(

        $('<option>').attr({'disabled':'','selected':'selected'}).text('Select Department')

      ).append(

        $('<option>').attr({'value':'0'}).text('Uncategorized')

      );
      $.each(department_result,function(index,result){

        $('.modal-department-select').append(
          $('<option>').attr({'value':result['School_ID']}).text(result['School_Code'])
        );

      });
      //modal Choices: Department--
      if(data[0]['department_id'] == null || data[0]['department_id'] == 'N/A'){
        $('.modal-department-select option[value="N/A"]').attr({selected:'selected'});
      }else{
        $('.modal-department-select option[value="'+data[0]['department_id']+'"]').attr({selected:'true'});
      }
      

    });

    //Clears previousl selected file
    $('#pdf_upload').val(null);
    $('.pdf_filename').html($('#pdf_upload').val());

    //Shows modal
    $('#FileEdit').modal('show');

  });
  
}


