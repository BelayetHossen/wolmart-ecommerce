@extends('backend.layouts.app')


@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">New product</h3>
                            </div>

                        </div>
                    </div>
                    <hr>


                    <form action="{{ url('/product-update/'.$data->id.'') }}" id="product_edit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset>


                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group mb-3">
                                        <label for="title">Product title</label>
                                        <input id="title" class="form-control" name="title" type="text" value="{{ $data->title }}">
                                    </div>
                                    <span class="title-msg"></span>
                                    <span class="title-check-msg"></span>

                                    <div class="form-group mb-3">
                                        <label for="product_add_desc">Product Description <small>(Make a long
                                                description)</small></label>
                                        <textarea name="long_desc" id="product_add_desc">{{ $data->long_desc }}</textarea>
                                    </div>
                                    <span class="long-desc-msg"></span>
                                    <script>
                                        CKEDITOR.replace('product_add_desc');
                                    </script>

                                    <div class="form-group mb-3">
                                        <label for="short_desc">Short Description <small>(Up to 200
                                                charecters)</small></label>
                                        <textarea name="short_desc" id="short_desc" maxlength="200" class="form-control">{{ $data->short_desc }}</textarea>
                                    </div>
                                    <span class="short-desc-msg"></span>



                                    {{-- <div class="form-group mb-3">
                                        <label for="images">Gallery image</label>
                                        <input name="photo[]" type="file" multiple>
                                    </div> --}}

                                    <div class="mb-3">
                                        <label for="image">Product Gallery</label>
                                        <div class="gallery-upload-wrap">
                                            <label class="select-image">
                                                <span class="upload-text">Select Product photos</span>
                                                <input name="photos[]" type="file" class="image-file" multiple=""
                                                    style=" display: none;">
                                            </label>

                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <label for="">Show Gallery</label>
                                        @foreach ($images as $img)
                                        <div class="col-md-2 my-2">
                                            <img style="width: 100%" src="{{ $path.'/'.$img }}" alt="">

                                                <a href="#" class="btn btn-danger btn-sm old_photo_remove" style="margin-left: 8px; margin-top: 10px;">Remove</a>
                                                <input type="hidden" name="galleryPhotos[]" value="{{ $img }}">

                                        </div>
                                        @endforeach
                                        <div id="selected-images">
                                            
                                        </div>
                                        
                                    </div>
                                    





                                    <script type="text/javascript">
                                        $(document).ready(function() {

                                            $(".image-file").on("change", function(e) {
                                                let file = e.target.files,
                                                    imagefiles = $(".image-file")[0].files;
                                                let i = 0;
                                                $.each(imagefiles, function(index, value) {
                                                    let f = file[i];
                                                    let fileReader = new FileReader();
                                                    fileReader.onload = (function(e) {

                                                        $(`
                                                        <div class="col-md-2 my-2">
                                                        <img style="width: 100%" src="${e
                                                            .target.result}" alt="">

                                                            <a href="#" class="btn btn-danger btn-sm old_photo_remove" style="margin-left: 8px; margin-top: 10px;">Remove</a>
                                                            <input type="hidden" name="galleryPhotos[]" value="${value.name}">

                                                        </div>
                                                        `).insertAfter("#selected-images");
                                                        $(".remove").click(function() {
                                                            $(this).parent(".pip").remove();
                                                        });

                                                       
                                                    });
                                                    fileReader.readAsDataURL(f);
                                                    i++;
                                                });
                                            });
                                        });
                                    </script>

                                    {{-- <script>
                                        $('document').ready(function(e) {
                                            $('.add').click(function(e) {
                                                var imageDiv = $(".boxDiv").length;
                                                if (imageDiv == '') {
                                                    alert('Please upload image'); // Check here image selected or not
                                                    return false;
                                                } else if (imageDiv > 5) {
                                                    alert(
                                                        'You can upload only 5 images'); //You can select only 5 images at a time to upload
                                                    return false;
                                                } else if (imageDiv != '' && imageDiv <
                                                    6) { // image should not be blank or not greater than 5
                                                    $("#upload_image").submit();
                                                }
                                            });
                                        });
                                    </script> --}}









                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label for="tags">Tags</label>
                                        <select name="tags[]" class="form-control" id="tags" select2
                                            select2-hidden-accessible multiple="multiple" style="width: 100%">
                                            @foreach ($tags as $tag)

                                                

                                                <option value="{{ $tag->id }}" class="select2-selection__choice">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <script>
                                        var values = $('#tags option[selected="true"]').map(function() {
                                            return $(this).val();
                                        }).get();

                                        // you have no need of .trigger("change") if you dont want to trigger an event
                                        $('#tags').select2({
                                            placeholder: "Please select"
                                        });
                                    </script>

                                    <div class="form-group mb-3">
                                        <label for="main_cat_id">Main category</label>
                                        <select name="main_cat_id" class="form-control main_cat_select">
                                            <option value="">-Select a main category-</option>
                                            @foreach ($cats_1 as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <span class="main-cat-msg"></span>


                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="second_cat_id">Second category</label>
                                            <select id="" name="second_cat_id"
                                                class="form-control second_cat_select">



                                            </select>
                                        </div>
                                        <span class="second-cat-msg"></span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="third_cat_id">Third category</label>
                                            <select id="third_cat_id" name="third_cat_id"
                                                class="form-control third_cat_select">



                                            </select>
                                        </div>
                                        <span class="third-cat-msg"></span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product_brand">Brand</label>
                                        <select id="product_brand" name="product_brand" class="form-control">
                                            <option value="">-Product brand-</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <span class="brand-msg"></span>

                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="">৳</span>
                                            </div>
                                            <input type="number" class="form-control" name="price">
                                        </div>
                                    </div>
                                    <span class="price-msg"></span>


                                    <div class="mb-3">
                                        <label for="sell_price">Sell price</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="">৳</span>
                                            </div>
                                            <input type="number" class="form-control" name="sell_price">
                                        </div>
                                    </div>
                                    <span class="sell-price-msg"></span>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">
                                                <input type="checkbox" name="featured" value=1>
                                            </div>
                                        </div>
                                        <label for="featured" class="form-control"> Make featured</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">
                                                <input id="hot_deals_checkbox" type="checkbox" name="" value=true>
                                            </div>
                                        </div>
                                        <label for="photo" class="form-control"> Hot Deals</label>

                                    </div>

                                    <div class="mb-3" id="hot_deals_date">

                                    </div>


                                </div>


                            </div>




                        </fieldset>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary add">Update product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
