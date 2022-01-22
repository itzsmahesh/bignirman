@extends('masters.layout.default_layout')
@section('content')


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tree"></i> About Us</h1>
        </div>
    </div>
    <div class="row bg-white py-3">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </p>
                @endif
                @endforeach
            </div>
            <div class="card-box">
                <form action="{{route('about_us_save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($about as $data)
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Main Image<span class="text-danger"></span></label>
                                <input type="file" name="main_img" id="pincode" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                <img src="{{URL::asset('public/upload/about/'.$data->main_img)}}" width="130px">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Journey Image<span class="text-danger"></span></label>
                                <input type="file" name="journey_img" id="pincode" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                <img src="{{URL::asset('public/upload/about/'.$data->journey_img)}}" width="130px">
                            </div>
                        </div>
                        
                    <hr>


                   
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Main Text<span class="text-danger"> <b> * </b> </span></label>
                                <textarea id="summary-ckeditor3" name="main_text" class="summernote" required><?php echo $data->main_text;?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Journey Text <span class="text-danger"> <b> * </b> </span></label>
                                <textarea id="summary-ckeditor1" name="journey_text" class="summernote" required><?php echo $data->journey_text; ?></textarea>
                            </div>
                        </div>
                        
                        

                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->



@stop
