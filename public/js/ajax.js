/***
 * Admin Js
 ***/
var baseurl = 'http://localhost/hpldev/public/';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//alert(appBaseUrl);
$(document).ready(function () {
    $('#category').on('change',function(e){
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'admin/ajax-subcat',
            data: {catid:catid},
            success:function(data){
             $("#subcategory").html(data);
            }
        });
    });
    $('#subcategory').on('change',function(e){
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'admin/ajax-product-range',
            data: {catid:catid},
            success:function(data){
                $("#productrange").html(data);
            }
        });
    });
});