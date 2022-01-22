@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-flag"></i> Seller  List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('newSeller')}}"><i class="fa fa-plus"></i> New Seller </a>
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
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="example" class="table  table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>

                                    <th>  Details </th>
                                    <th> Image </th>

                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($seller as $data)
                                <tr>
                                    <td>{{$i}}.</td>

                                    <td>
                                        <table>
                                            <tr>
                                                <th>Name </th>
                                                <td>:</td>
                                                <td>{{$data->name}}</td>
                                            </tr>
                                             <tr>
                                                <th>Email </th>
                                                <td>:</td>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Company </th>
                                                <td>:</td>
                                                <td>{{$data->company}}</td>
                                            </tr>

                                        </table>
                                    </td>
                                     <td><img src="{{URL::asset('public/upload/home/seller/'.$data->image)}}" width="150px"></td>




                                    <td class="text-center">
                                        <a href="{{route('sellerEdit',$data->id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                                        <a href="{{route('testimonialsDelete',$data->id)}}" onClick="return confirm('Are you sure?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span></a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
