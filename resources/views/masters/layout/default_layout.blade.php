<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @if(isset($page_title))
        {{$page_title}}
        @endif
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/masters/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


    <!--Js-->


</head>

<body class="app sidebar-mini rtl">
    @include('masters.layout.header')
    @yield('content')

    <!-- Essential javascripts for application to work-->
    <script type="text/javascript" src="{{URL::asset('public/masters/js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/main.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/js/common.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/js/sweetalert.min.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{URL::asset('public/masters/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/chart.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/masters/js/plugins/bootstrap-datepicker.min.js')}}"></script>





    <!--CkEditores-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
    </script>


    <!-- Select2 -->
    <script src="{{URL::asset('public/masters/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('#sl').click(function() {
            $('#tl').loadingBtn();
            $('#tb').loadingBtn({
                text: "Signing In"
            });
        });

        $('#el').click(function() {
            $('#tl').loadingBtnComplete();
            $('#tb').loadingBtnComplete({
                html: "Sign In"
            });
        });

        $('#demoDate').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

        $('#demoSelect').select2();

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });

    </script>

    <!--<script type="text/javascript">
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86]
                }
            ]
        };
        var pdata = [{
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Complete"
            },
            {
                value: 50,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "In-Progress"
            }
        ]

        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);

    </script>-->

    <!-- Google analytics script-->

</body>

</html>
