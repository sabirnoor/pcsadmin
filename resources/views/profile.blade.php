@extends('layouts.layout')

@section('content')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Profile</li>
        </ul><!-- /.breadcrumb -->

        
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Profile
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Update Profile
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
			<!-- <div class="col-sm-6">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Default</h4>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<form>
								<fieldset>
									<label>Label name</label>

									<input type="text" placeholder="Type something…">
									<span class="help-block">Example block-level help text here.</span>

									<label class="pull-right">
										<input type="checkbox" class="ace">
										<span class="lbl"> check me out</span>
									</label>
								</fieldset>

								<div class="form-actions center">
									<button type="button" class="btn btn-sm btn-success">
										Submit
										<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>-->
			
			<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Change Password</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
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
						<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="changepassword" method="post" role="form" action="{{url('profile/')}}">
							{{csrf_field()}}
							<!-- <legend>Form</legend> -->
							<fieldset>
							<span class="help-block">Password minimum 6 character (string)</span>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> Current Password </label>
								<div class="col-sm-9">
									<input type="password" id="cpassword" name="cpassword" value="" placeholder="Current Password" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> New Password </label>
								<div class="col-sm-9">
									<input type="password" id="password" name="password" value="" placeholder="New Password" class="col-xs-10 col-sm-5" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> Confirm Password </label>
								<div class="col-sm-9">
									<input type="password" id="password_confirmation" name="password_confirmation" value="" placeholder="Confirm Password" class="col-xs-10 col-sm-5" />
								</div>
							</div>
						</fieldset>
							<div class="form-actions center">
								<button type="submit" class="btn btn-sm btn-success">
									Submit
									<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
           
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
