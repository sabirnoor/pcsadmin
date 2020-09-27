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
            <li class="active">schedule SMS</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">


        <div class="row">
            <div class="col-xs-12">
               <div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Schedule List</h3>
				<!-- div.table-responsive -->
				<!-- div.dataTables_borderWrap -->
				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Schedule Date</th>
								<th>Class</th>
								<th>Quiz Title</th>
								<th>Student Name</th>
								<th>Branch</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<?php
$i = ($allScheduleList->currentpage() - 1) * $allScheduleList->perpage() + 1;
if ($allScheduleList) {
	foreach ($allScheduleList as $key => $value) {

		?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{date('d M Y',strtotime($value->scheduledate))}}</td>
								<td>{{$value->class}}</td>
								<td>{{$value->quiz_title}}</td>
								<td>{{$value->student_name}}</td>
								<td>{{$value->branch}}</td>
								<td></td>
							</tr>
							<?php
}
}
?>
						</tbody>
					</table>
					{{$allScheduleList->links()}}
				</div>

			</div>
		</div>



		<div class="hr hr32 hr-dotted"></div>




                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

<script>

</script>
@endsection
