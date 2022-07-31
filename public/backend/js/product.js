
(function ($) {
    $(document).ready(function () {


        /*
        |--------------------------------------------------------------------------
        | 1. requred function
        |--------------------------------------------------------------------------
        */
        function fieldRequre(msg, type, margin = '-15px') {
            return `<p class="text-${type}" style="margin-top: ${margin};">${msg}</p>`;
        }





        // category select
        $(document).on('change', '.main_cat_select', function (e) {
            e.preventDefault();
            let main_cat_id = $(this).val();

            $.ajax({
                url: '/product-categorysecond-select/' + main_cat_id,
                success: function (data) {
                    $('.second_cat_select').html(data);

                }
            })
        })

        $(document).on('change', '.second_cat_select', function (e) {
            e.preventDefault();
            let second_cat_id = $(this).val();

            $.ajax({
                url: '/product-categoryThird-select/' + second_cat_id,
                success: function (data) {
                    $('.third_cat_select').html(data);
                }
            })
        })

        // add product  Hot deals
        const hot_deals_checkbox = document.getElementById('hot_deals_checkbox')
        const hot_deals_date = `<div class="card" style="">
                                    <div class="card-body">
                                        <h4 class="text-success">Select start and end date</h4>
                                        <hr>
                                        <label for="hot" class="">Start date</label><div class=" mb-0">
                                            <input type="date" class="form-control" name="hot[]"
                                                id="hot">
                                        </div>
                                        <label for="hot" class="">End date</label>
                                        <div class=" mb-0">
                                            <input type="date" class="form-control" name="hot[]"
                                                id="hot">
                                        </div>
                                    </div>
                                </div>`;
        hot_deals_checkbox.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                $('#hot_deals_date').html(hot_deals_date);
            } else {
                $('#hot_deals_date').html('');
            }
        })








        // Product upload
        $(document).on('submit', '#product_add_form', function (e) {
            e.preventDefault();

            let title = $('#product_add_form input[name="title"]').val();
            let long_desc = $('#product_add_form textarea[name="long_desc"]').val();
            let short_desc = $('#product_add_form textarea[name="short_desc"]').val();
            let tags = $('#product_add_form select[name="tags"]').val();
            let main_cat_id = $('#product_add_form select[name="main_cat_id"]').val();
            let product_brand = $('#product_add_form select[name="product_brand"]').val();
            let price = $('#product_add_form input[name="price"]').val();
            let image = $('#product_add_form input[name="image"]').val();

            if (title == '') {
                $('.title-msg').html(fieldRequre('Product title is requred !', 'danger'));
            } else {
                $('.title-msg').html('');
            }

            if (main_cat_id == '') {
                $('.main-cat-msg').html(fieldRequre('Product main category is requred !', 'danger'));
            } else {
                $('.main-cat-msg').html('');
            }

            if (product_brand == '') {
                $('.brand-msg').html(fieldRequre('Product brand is requred !', 'danger'));
            } else {
                $('.brand-msg').html('');
            }

            if (image != '') {
                $.ajax({
                    url: 'product-store',
                    method: 'post',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        if (data.title_check == 'exist') {
                            $('.title-check-msg').html(fieldRequre('Product title is already exist !', 'danger', '-15px'));
                        } else {
                            $('.title-check-msg').html('');
                            // $('#second_productCategory_table').DataTable().ajax.reload();
                            // $('#third_productCategory_add_modal').modal('hide');
                            $('#product_add_form')[0].reset();
                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "A new product added successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000
                                })
                            }
                            successAlert()


                        }
                    }
                });
            }


        })



        $(document).on('click', '.old_photo_remove', function (e) {
            e.preventDefault();

            this.parentElement.remove();

        })



        //product edit
        // function oldImg() {
        //     $.ajax({
        //         url: 'product-edit/',
        //         success: function (data) {
        //             console.log(data);
        //         }

        //     });
        // }

        // $(document).on('click', '.product_edit_btn', function () {
        //     alert();
        // })
















    })

})(jQuery)
