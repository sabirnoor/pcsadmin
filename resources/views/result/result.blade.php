@extends('layouts.layout')

@section('content')
<?php //echo '<pre>';print_r($UploadflashList);die; ?>
<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{url('/')}}">Dashboard</a>
            </li>
            <li class="active">Exam Result</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">


        <div class="row">
            <div class="col-xs-6">
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
                
				
				<table class="table table-striped table-bordered">
							<thead>
								<!--<tr>
									<th></th>
									<th></th>
								</tr-->
							</thead>
							<tbody>
								<tr class="footableOdd">								
									<td class="text-right">Result:</td>
									<td><?php echo $result_params['final_status']; ?></td>
								</tr>								
								
								<tr class="footableOdd">								
									<td class="text-right">Score:</td>
									<td><?php echo $result_params['user_score']; ?>/<?php echo $result_params['quiz_full_marks']; ?></td>
								</tr>
								
								<tr class="footableOdd">								
									<td class="text-right">Percentage:</td>
									<td><?php echo $result_params['percentage']; ?>%</td>
								</tr>
								
								<tr class="footableOdd">								
									<td class="text-right">Total Questions:</td>
									<td><?php echo $result_params['quiz_full_marks']; ?></td>
								</tr>
								
								<tr class="footableOdd">								
									<td class="text-right">Correct Answers:</td>
									<td><?php echo $result_params['correct_answer']; ?></td>
								</tr>
								
								<tr class="footableOdd">								
									<td class="text-right">Wrong Answers:</td>
									<td><?php echo $result_params['wrong_answer']; ?></td>
								</tr>
								
								
								
								
							</tbody>
						</table>

               


                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

@endsection
