function viewTable() {
    var table = $("#products_table").DataTable({
        responsive: true,
        "ajax": $('#products_data').attr('data_url'),
        "columns":[
            {data:'id', name: "ID"},
            {data:'Client', name:"Client"},
            {data:'Date', name:"Date"},
            {data:'options', name:"Options"}
        ]
    })
    return table;
}

function tableInvoiceProducts(){
    var table = $("#product_invoice_table").DataTable({
        responsive: true,
        "ajax": $('#products_invoice_data').attr('data_url'),
        "columns":[
            {data:'Options', name: "Options"},
            {data:'Product', name:"Product"},
            {data:'Price', name:"Unit Price"},
            {data:'Quantity', name:"Quantity"},
            {data:'Amount', name:"Total"}
        ]
    });
    return table;
}

async function openModal(url, btn, text){
    await openModalAsync(url, btn, text);
    $('#product_table').hide();
    $('.selectpicker').selectpicker();
    $('.datetimepicker').datetimepicker({
        showClose: true
    });
}

async function openModalEdit(url, btn, text){
    await openModalAsync(url, btn, text);
    // $('#product_invoice_table').hide();
    $('.selectpicker').selectpicker();
    $('.datetimepicker').datetimepicker({
        showClose: true
    });
    products_invoice = tableInvoiceProducts();
}

$(function(){
    var table = viewTable();
    var products_invoice;

    
    $(document).on('click','.btn_add',function(){
        var btn = $(this);
        var text = '<span><i class="icon-plus1"></i>New Invoice</span>';
        var url = $(this).attr('get_url');
        openModal(url,btn,text);
        
    });

    // Invoices functions

    $(document).on('click','.btn_save',function(){
        var btn = $(this);
        disable_btn(btn);
        var formData = new FormData(document.getElementById('DynamicForm'));
        console.log(formData)
        $.ajax({
            url: $('#DynamicForm').attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result, status, xhr){
                console.log(result);
                // hideModal();
                $('#client').prop('disabled',true);
                $('#client').selectpicker('refresh');
                $('#date').prop('disabled', true);
                Swal.fire(
                    'Correct',
                    'Invoice added',
                    'success'
                );
                $("#product_data").html(result.products_view);
                products_invoice = tableInvoiceProducts();
                $("#product_select").selectpicker();
                table.ajax.reload();
                btn.remove();
                $('#btn_close').html('<i class="icon-line2-close"></i> Close')
            },
            error: function(result,status,xhr){
                console.log(result);
                $errors = result['responseJSON']['errors'];
                Object.entries($errors).forEach(entry => {
                    const [key,value]=entry;
                    console.log(key);
                    document.getElementById(key).classList.add("error");
                });
                Swal.fire(
                    'Error',
                    'Please verify the required data',
                    'error'
                )
            enable_btn(btn, '<i class="icon-save2"></i>Save');
            }
        })
    });

    $(document).on('click','.btn_delete',function(){
        var btn = $(this);
        disable_btn(btn);
        Swal.fire({
            title: 'Do you want to delete this record?',
            type: 'warning',
            backdrop: false,
            showCancelButton: true,
            confirmButtonColor: '#960d24',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url: btn.attr('delete_url'),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result){
                        console.log(result);
                    }
                });
                Swal.fire(
                    'Deleted',
                    'Invoice deleted successfully',
                    'success'
                )
                table.ajax.reload();
            }else if(result.dismiss === Swal.DismissReason.cancel){
                enable_btn(btn,"<i class='icon-trash2'></i> Delete");
                Swal.fire(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })

    })

    $(document).on('click','.btn_edit', function(){
        var btn = $(this);
        var text = "<i class='icon-line-edit-2'></i> Edit";
        var url = $(this).attr('get_url');
        openModalEdit(url,btn,text);


    })

    $(document).on('click','.btn_update',function(){
        var btn = $(this);
        disable_btn(btn);
        var formData = new FormData(document.getElementById('DynamicForm'));
        console.log(formData)
        $.ajax({
            url: $('#DynamicForm').attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result, status, xhr){
                console.log(result);

                Swal.fire(
                    'Correct',
                    'Invoice added',
                    'success'
                );
                enable_btn(btn, '<i class="icon-save2"></i> Update');
                table.ajax.reload();

            },
            error: function(result,status,xhr){
                console.log(result);
                $errors = result['responseJSON']['errors'];
                Object.entries($errors).forEach(entry => {
                    const [key,value]=entry;
                    console.log(key);
                    document.getElementById(key).classList.add("error");
                });
                Swal.fire(
                    'Error',
                    'Please verify the required data',
                    'error'
                )
            enable_btn(btn, '<i class="icon-save2"></i>Save');
            }
        })
    });





    // Invoice details functions

    $(document).on('change','#product_select', function(){
        var price = $('#product_select option:selected').attr('data-subtext');
        $('#price').val(price);
    })

    // add a product in the invoice
    $(document).on('click','.btn_save_product',function(){
        var btn = $(this);
        disable_btn(btn);
        var formData = new FormData(document.getElementById('productForm'));
        // console.log(formData)
        $.ajax({
            url: $('#productForm').attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result, status, xhr){
                console.log(result);
                Swal.fire(
                    'Correct',
                    'Product added',
                    'success'
                );
                $('#product_select').val('default');
                $('#product_select').selectpicker('refresh');
                $('#price').val('');
                $('#quantity').val('');
                $('#product_invoice_table').DataTable().ajax.reload();
                // products_invoice.ajax.reload();

                enable_btn(btn, '<i class="icon-save2"></i>Add');
            },
            error: function(result,status,xhr){
                console.log(result);
                Swal.fire(
                    'Error',
                    'Please verify the required data',
                    'error'
                )
            enable_btn(btn, '<i class="icon-save2"></i>Add');
            }
        })
    });

    //delete a product from the invoice
    $(document).on('click','.btn_remove_product',function(event){
        event.preventDefault();
        var btn = $(this);
        disable_btn(btn);
        Swal.fire({
            title: 'Do you want to delete this record?',
            type: 'warning',
            backdrop: false,
            showCancelButton: true,
            confirmButtonColor: '#960d24',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url: btn.attr('delete_url'),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result){
                        console.log(result);
                    }
                });
                Swal.fire(
                    'Deleted',
                    'Product deleted successfully',
                    'success'
                )
            $('#product_invoice_table').DataTable().ajax.reload();
            }else if(result.dismiss === Swal.DismissReason.cancel){
                enable_btn(btn,"<i class='icon-trash2'></i>");
                Swal.fire(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })

    })

})