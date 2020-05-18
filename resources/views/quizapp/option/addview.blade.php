@include('header')
@include($module.'/style')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body ">
                <form role="form" action="{!!url('/')!!}/{{$module}}/option/add/{{$parent_id}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body row">
                        <div class="col-md-2">
                            <label class="control-label">Slide Number:</label>
                            <select  name="slide_num" class="form-control">
                                <option value="1">Slide 1</option>
                                <option value="2">Slide 2</option>
                                <option value="3">Slide 3</option>
                                <option value="4">Slide 4</option>
                                <option value="5">Slide 5</option>
                                <option value="6">Slide 6</option>
                                <option value="7">Slide 7</option>
                                <option value="8">Slide 8</option>
                                <option value="9">Slide 9</option>
                                <option value="10">Slide 10</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="heading">Heading:</label>
                            <input type="text" class="form-control" id="heading" name="heading" placeholder="Heading">
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Feature Image:</label>
                            <input type="file" name="single_image" class="image-preview" data-target="#single_image" size="10" />
                        </div>
                        <div class="col-md-2">
                            <img id="single_image" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  />
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label" for="option_title1">Option Title:</label>
                                <input type="text" class="form-control" id="option_title1" name="option_title[]" placeholder="Heading">
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">Option Image:</label>
                                <input type="file" name="option_image_0" class="image-preview" data-target="#option_image1" size="10" />
                            </div>
                            <div class="col-md-2">
                                <img id="option_image1" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  />
                            </div>
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label" for="option_title2">Option Title:</label>
                                <input type="text" class="form-control" id="option_title2" name="option_title[]" placeholder="Heading">
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">Option Image:</label>
                                <input type="file" name="option_image_1" class="image-preview" data-target="#option_image2" size="10" />
                            </div>
                            <div class="col-md-2">
                                <img id="option_image2" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  />
                            </div>
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label" for="option_title3">Option Title:</label>
                                <input type="text" class="form-control" id="option_title3" name="option_title[]" placeholder="Heading">
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">Option Image:</label>
                                <input type="file" name="option_image_2" class="image-preview" data-target="#option_image3" size="10" />
                            </div>
                            <div class="col-md-2">
                                <img id="option_image3" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  />
                            </div>
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label" for="option_title4">Option Title:</label>
                                <input type="text" class="form-control" id="option_title4" name="option_title[]" placeholder="Heading">
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">Option Image:</label>
                                <input type="file" name="option_image_3" class="image-preview" data-target="#option_image4" size="10" />
                            </div>
                            <div class="col-md-2">
                                <img id="option_image4" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('footer')
@include($module.'/script')