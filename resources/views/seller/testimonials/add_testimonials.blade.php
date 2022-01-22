@extends('masters.layout.default_layout')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-flag"></i>  Add Testimonials</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href="{{route('testimonials')}}"><i class="fa fa-eye"></i> Testimonials List</a>
            </ul>
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
                    <form action="{{route('testimonialsSave')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="row col-sm-12">
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Testimonals Type<span class="text-danger"> <b> * </b> </span></label>
                                    <select type="text" class="form-control" required name="type">
                                        <option value="">-- Please Select --</option>
                                        <option value="Student">Student</option>
                                        <option value="Expert">Expert</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Name<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="text" name="name" required placeholder="Name">
                                </div>
                            </div>

                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Designation<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="text" name="designation" required placeholder="Designation">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Company Name<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="text" name="company_name" required placeholder="Company Name">
                                </div>
                            </div> --}}

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 120 * 120 Pixel)</span>   </label>
                                    <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" autofocus required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Description<span class="text-danger"> <b> * </b> </label>
                                    <textarea class="form-control"  name="description" required placeholder="Description"></textarea>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->



@stop
