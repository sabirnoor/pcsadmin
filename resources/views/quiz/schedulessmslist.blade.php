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
								<th>Quiz Title</th>
								<th>Total Student</th>
							</tr>
						</thead>

						<tbody>
							<?php
$i = ($allScheduleListCount->currentpage() - 1) * $allScheduleListCount->perpage() + 1;
if ($allScheduleListCount) {
	foreach ($allScheduleListCount as $key => $value) {

		?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{date('d M Y',strtotime($value->scheduledate))}}</td>
								<td>{{$value->quiz_title}}</td>
								<td>{{$value->totalcunt}}</td>
							</tr>
							<?php
}
}
?>
						</tbody>
					</table>
					{{$allScheduleListCount->links()}}
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
