<?php
$action = Request::segment(1);
?>
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'PCS Admin') }}</title>

        <meta name="description" content="Mailbox with some customizations as described in docs" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
		
		<link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.min.css') }}" />
		
		
        <link rel="stylesheet" href="{{ asset('public/assets/css/fonts.googleapis.com.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

        <link rel="stylesheet" href="{{ asset('public/assets/css/ace-skins.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/css/ace-rtl.min.css') }}" />
        <script src="{{ asset('public/assets/js/ace-extra.min.js') }}"></script>


    </head>
    <body class="no-skin">
       @include('layouts.header')

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {
            }
            </script>
            @include('layouts.left-menu')
            <div class="main-content">
                @yield('content')
            </div><!-- /.main-content -->
            @include('layouts.footer')

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="{{ asset('public/assets/js/jquery-2.1.4.min.js') }}"></script>

        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='{{ asset('public/assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
        </script>
        <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
		
		<script src="{{ asset('public/assets/js/jquery-ui.min.js') }}"></script>
        
        <script src="{{ asset('public/assets/js/jquery-ui.custom.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.sparkline.index.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.flot.pie.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.flot.resize.min.js') }}"></script>
		
		<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('public/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('public/assets/js/dataTables.buttons.min.js') }}"></script>
		
		<script src="{{ asset('public/assets/js/dataTables.select.min.js') }}"></script>
        <!-- ace scripts -->
        <script src="{{ asset('public/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/ace.min.js') }}"></script>
        <?php if($action == 'ourmotto' || $action == 'ourmotto' || $action == 'events' || $action == 'aboutus' || $action == 'newspaper' || $action == 'newsevents' || $action == 'director_desk' || $action == 'academics' || $action == 'contact_us'){ ?>
        <script src="{{ asset('public/ckeditor/ckeditor.js') }}"/></script>
        <?php } ?>
        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function ($) {
                


                $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('.tab-content')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();

                    var off2 = $source.offset();
                    //var w2 = $source.width();

                    if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                        return 'right';
                    return 'left';
                }


                $('.dialogs,.comments').ace_scroll({
                    size: 300
                });


                //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
                //so disable dragging when clicking on label
                var agent = navigator.userAgent.toLowerCase();
                if (ace.vars['touch'] && ace.vars['android']) {
                    $('#tasks').on('touchstart', function (e) {
                        var li = $(e.target).closest('#tasks li');
                        if (li.length == 0)
                            return;
                        var label = li.find('label.inline').get(0);
                        if (label == e.target || $.contains(label, e.target))
                            e.stopImmediatePropagation();
                    });
                }

                $('#tasks').sortable({
                    opacity: 0.8,
                    revert: true,
                    forceHelperSize: true,
                    placeholder: 'draggable-placeholder',
                    forcePlaceholderSize: true,
                    tolerance: 'pointer',
                    stop: function (event, ui) {
                        //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                        $(ui.item).css('z-index', 'auto');
                    }
                }
                );
                $('#tasks').disableSelection();
                $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
                    if (this.checked)
                        $(this).closest('li').addClass('selected');
                    else
                        $(this).closest('li').removeClass('selected');
                });


                //show the dropdowns on top or bottom depending on window height and menu position
                $('#task-tab .dropdown-hover').on('mouseenter', function (e) {
                    var offset = $(this).offset();

                    var $w = $(window)
                    if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                        $(this).addClass('dropup');
                    else
                        $(this).removeClass('dropup');
                });
				
				$( "#noticedate" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					dateFormat: 'dd-mm-yy',
					changeMonth: true,
					changeYear: true
				});
				
				$( ".dateofbirth" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					dateFormat: 'dd-mm-yy',
					changeMonth: true,
					changeYear: true,
					maxDate:0
				});

            });
			
			$(document).ready(function() {
				$('#dynamic-table').DataTable({
					"ordering": false
				});
			});
			$('.numeric').keypress(function (event) {
				if (event.which !== 8 && isNaN(String.fromCharCode(event.which))) {
					event.preventDefault();
				}
			});
        </script>
        <?php if($action == 'ourmotto' || $action == 'ourmotto' || $action == 'aboutus' || $action == 'events' || $action == 'newspaper' || $action == 'newsevents' || $action == 'director_desk' || $action == 'academics' || $action == 'contact_us'){ ?>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        </script>
        <?php } ?>
    </body>
   
</html>
