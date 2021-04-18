//* Ckeditor
window.onload = function () {
    CKEDITOR.replace('ckeditor');
};



// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function () {
    var fileUpload = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileUpload);
});


function checkEmpty() {
    var option = $('.check').val();
    if (option == 1) {
        var countAddProduct = $('.countAddProduct').val();
        var name_sets = $('.name_sets').val();
        var img_ProductSet = $('.img_ProductSet').val();
        var descriptionSet = $('.descriptionSet').val();
        var check = 0;
        var sttProduct = -1;
        for (let i = 0; i < countAddProduct; i++) {
            if ($('.product_name' + i).val() == '') {
                check = 1;
                sttProduct = i;
                break;
            }
            if ($('.imgInp' + i).val() == '') {
                check = 2;
                sttProduct = i;
                break;
            }
            if ($('.price' + i).val() == '') {
                check = 3;
                sttProduct = i;
                break;
            }
            // if($('.description'+i).val() == ''){
            //     check = 4;
            //     sttProduct = i+1;
            //     break;
            // }
        }

        if (name_sets == '' || name_sets == null) {
            check = 5;
        } else if (img_ProductSet == '' || img_ProductSet == null) {
            check = 6;
        }


        switch (check) {
            case 1:
                // alert('Bạn chưa nhập tên sản phẩm thứ '+sttProduct);
                $('.product_name' + sttProduct).focus();
                break;
            case 2:
                // alert('Bạn chưa chọn ảnh sản phẩm thứ '+sttProduct);
                $('.imgInp' + sttProduct).focus();
                break;
            case 3:
                // alert('Bạn chưa nhập giá sản phẩm thứ '+sttProduct);
                $('.price' + sttProduct).focus();
                break;
                // case 4:
                //     alert('Bạn chưa viết mô tả sản phẩm thứ '+sttProduct);
                //     // $('.description'+sttProduct).focus();
                //     break;
            case 5:
                $('.name_sets').focus();
                break;
            case 6:
                $('.img_ProductSet').focus();
                break;
            default:
                break;
        }
    }
    else if (option == 2){
        var check = 0;
        var product_name = $('#product_name').val();
        var imgInp = $('#imgInp').val();
        var price = $('#price').val();
        if (product_name == '') {
            $('#product_name').focus();
            check = 1;
        }
         else if (imgInp == '') {
            $('#imgInp').focus();
            check = 1;
        }
        else if (price == '') {
            $('#price').focus();
            check = 1;
        }
    }
    if (check == 0) {
        return true;
    } else {
        return false;
    }
}