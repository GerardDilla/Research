function Init_CategoryUpdate(){

  input = {
    CategoryID:$('#categoryEditID').val(),
    CategoryName:$('#cat_name_edit').val(),
  }
  updateStatus = AjaxUpdateCategory(input);
  updateStatus.done(function(data){

    data = JSON.parse(data);
    if(data['Error'] != 1){

      GetCategoryManagerList();
      GetCategories();
      $('#category_update_message').html(data['Message']);

    }else{

      $('#category_update_message').html(data['Message']);

    }

  });

}

function Init_CategoryNew(form){

  //$('#newfile_message').html('');
  newStatus = AjaxNewCategory(form);
  newStatus.done(function(result){

    result = JSON.parse(result);
    if(result['Error'] == 1){

      $('#new_category_error').html(result['Message']);

    }else{
      GetCategories();
      GetCategoryManagerList();
      $('#category_message').html(result['Message']);
      $('#newCategory').modal('hide');
    }

  });

}

function Init_CategoryDelete(CategoryID = ''){

  input = {
    CategoryID:CategoryID,
  }
  updateStatus = AjaxDeleteCategory(input);
  updateStatus.done(function(data){

    data = JSON.parse(data);
    if(data['Error'] != 1){

      GetCategoryManagerList();
      GetCategories();
      $('#newCategory').modal('hide');
      $('#category_message').html(data['Message']);

    }else{

      $('#category_message').html(data['Message']);

    }

  });

}

function AjaxCategories(searchkey = []){

  return $.ajax({
    url: base_url()+'index.php/Main/AjaxGetCategories',
    type:"GET",
    data:searchkey
  });

}

function AjaxDepartment(){

  return $.ajax({
    url: base_url()+'index.php/Main/AjaxGetDepartment'
  });

}

function AjaxUpdateCategory(inputs = {}){
			
  return $.ajax({
    url: base_url()+'index.php/Main/AjaxUpdateCategory',
    type: "POST",
    data:inputs
  });

}

function AjaxDeleteCategory(inputs = {}){
  
  return $.ajax({
    url: base_url()+'index.php/Main/AjaxDeleteCategory',
    type: "POST",
    data:inputs
  });

}

function AjaxNewCategory(data){

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

function AjaxCategoryDetails(CategoryID){

  return $.ajax({
    url: base_url()+'index.php/Main/AjaxGetCategoryDetails',
    type: "POST",
    data:CategoryID
  });

}

function GetCategories(){

  categoryData = AjaxCategories();
  categoryData.done(function(category_result){
    category_result = JSON.parse(category_result);
    if(category_result.length > 0){

      //Filter Choices--
      $('.category-filter-panel').html(
        $('<button>').attr({'type':'button','class':'dropdown-item rdo-drop-item category_filter','style':'cursor:pointer','data-category-id':'0','data-category-name':'Uncategorized'}).append(
          $('<table>').attr('width','100%').append(
            $('<thead>').append(
              $('<tr>')
              .append(
                $('<th>').attr('width','100%').text('Uncategorized')
              )
            )
          )
        )
      );
      $.each(category_result,function(index,result){

        /*
        <button type="button" data-category-id="" class="dropdown-item rdo-drop-item category_filter" href="#" style="">
          <table width="100%">
            <thead>
              <tr>
                <th width="70%">
                  Uncategorized
                </th>
                <th width="30%" style="text-align:right">
                  <span class="rdo_label" style="float:right; margin:auto;"> 0 </span> 
                </th>
              </tr>
            </thead>
          </table>
        </button>
        */

        $('.category-filter-panel').append(
          $('<button>').attr({'type':'button','class':'dropdown-item rdo-drop-item category_filter','style':'cursor:pointer','data-category-id':result['rdo_category_id'],'data-category-name':result['rdo_category']}).append(
            $('<table>').attr('width','100%').append(
              $('<thead>').append(
                $('<tr>')
                .append(
                  $('<th>').attr('width','100%').text(result['rdo_category'])
                )
              )
            )
          )
        );
        console.log(result['rdo_category']);
      })
      //Filter Choices--

    }
  });

}

function GetDepartment(){

  departmentData = AjaxDepartment();
  departmentData.done(function(department_result){
    department_result = JSON.parse(department_result);
    if(department_result.length > 0){

      $('.department-filter-panel').html(
        $('<button>').attr({'type':'button','class':'dropdown-item rdo-drop-item department_filter','style':'cursor:pointer','data-department-id':'0','data-department-name':'Uncategorized'}).append(
          $('<table>').attr('width','100%').append(
            $('<thead>').append(
              $('<tr>')
              .append(
                $('<th>').attr('width','100%').text('Uncategorized')
              )
            )
          )
        )
      );
      $.each(department_result,function(index,result){

        $('.department-filter-panel').append(
          $('<button>').attr({'type':'button','class':'dropdown-item rdo-drop-item department_filter','style':'cursor:pointer;','data-department-id':result['School_ID'],'data-department-name':result['School_Code']}).append(
            $('<table>').attr('width','100%').append(
              $('<thead>').append(
                $('<tr>')
                .append(
                  $('<th>').attr('width','100%').text(result['School_Code'])
                )
              )
            )
          )
        ).attr({'style':'width:100%'});
      })

      //modal Choices: Department--
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
    }
  });

}

function GetCategoryChoices(){

  categoryData = AjaxCategories();
  categoryData.done(function(category_result){

    category_result = JSON.parse(category_result);
    //modal Choices: Category--
    $.each(category_result,function(index,result){
      $('.modal-category-select-new').append(
        $('<option>').attr({'value':result['rdo_category_id']}).text(result['rdo_category'],)
      );
    });
    //modal Choices: Category--

  });

}

function GetCategoryManagerList(searchinput = ''){

  
  if(searchinput == ''){

    searchinput = $('.category_search').val();

  }
  categoryData = AjaxCategories({searchkey:searchinput});
  categoryData.done(function(category_result){

    $('#category_manage_list').html('');
    category_result = JSON.parse(category_result);
    //modal Choices: Category--
    $.each(category_result,function(index,result){
      $('#category_manage_list').append('\
        <tr>\
          <th scope="row">'+(index + 1)+'</th>\
          <td>'+result['rdo_category']+'</td>\
          <td>\
            <button type="button" class="btn btn-info editCategory" value="'+result['rdo_category_id']+'" data-categoryname="'+result['rdo_category']+'">\
              <i class="fa fa-pencil" aria-hidden="true"></i> Edit\
            </button>\
            <button type="button" class="btn btn-rdo removeCategory" value="'+result['rdo_category_id']+'">\
              <i class="fa fa-trash" aria-hidden="true"></i> Remove\
            </button>\
          </td>\
        </tr>\
      ');
    });
    //modal Choices: Category--
  });

}

function GetDepartmentChoices(){

  //Gets All department and defaults the selected category of the item
  departmentData = AjaxDepartment();
  departmentData.done(function(department_result){

    department_result = JSON.parse(department_result);
    $.each(department_result,function(index,result){

      $('.modal-department-select-new').append(
        $('<option>').attr({'value':result['School_ID']}).text(result['School_Code'])
      );

    });
  
    
  });

}

function OpenCategoryEdit(CategoryID = ''){

  CategoryData = AjaxCategoryDetails({CategoryID:CategoryID});
  CategoryData.done(function(data){

    data = JSON.parse(data);
    $('#category_update_message').html('');
    $('[for="cat_name_edit"]').addClass('active');
    $('#category_update_label').val(data[0]['rdo_category']);
    $('#cat_name_edit').val(data[0]['rdo_category']);
    $('#categoryEditID').val(data[0]['rdo_category_id']);
    $('#editCategory').modal('show');

  });
}



