@extends('layouts.layout')

@section('content')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{url('/')}}">Dashboard</a>
            </li>
            <li class="active">Academics</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">


        <div class="row">
            <div class="col-xs-12">
                @if (session('msgerror'))
                <div class="alert alert-danger light no-margin">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon-cross2"></i> {{ session('msgerror') }}
                </div>
                <hr>
                @endif
                @if (session('msgsuccess'))
                <div class="alert alert-success light no-margin">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon-check_circle"></i> {{ session('msgsuccess') }}
                </div>
                <hr>
                @endif
                
                <form class="form-horizontal" method="post" role="form" action="{{url('academics')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="page_name" value="academics">
                    <div class="form-group">
                        <label for="form-field-1"> Academics </label>
                        <textarea name="contents" id="editor1" rows="10" cols="80">
                            @if(isset($details->contents))
                           {{$details->contents}}
                           @endif
                       </textarea>

                    </div>
<!--                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Text Field </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>-->
                    <div class="space-4"></div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                            </button>
                        </div>
                    </div>
                </form>

               

                <div class="hr hr32 hr-dotted"></div>



                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

@endsection
