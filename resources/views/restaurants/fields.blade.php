<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('restaurants.index') !!}" class="btn btn-default pull-right">Discard</a>
                    </div>
                    <div class="col-md-6">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-left']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Restaurants Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6 pull-right">
                    <a href="javascript: void(0);" id="show_1" tabindex="-1">Show</a>
                <!--/div>
                <div class="col-md-6"-->
                    <a href="javascript: void(0);" id="hide_1" tabindex="-1">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div id="rest-details">
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- https://codepen.io/jonnitto/pen/OVmvPB -->
				<!-- Restaurant Name Field -->
				{!! Form::text('restaurant_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Restaurant Name</label>
			</div>
			<div class="col-md-8 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
				<!-- Status Field -->
				{!! Form::hidden('status', false) !!}
				{!! Form::checkbox('status', '1', null, ['id' => 'is-active', 'class' => 'styled']) !!} 
				<label for="is-active" class="checkbox-inline">
					is Active?
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<input id="activation_date" class="form-control" placeholder="" name="activation_date" type="text" value="{!! isset($restaurant->activation_date) ? $restaurant->activation_date : '' !!}">
				<label tabindex="-1">Activation Date</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Restaurant Location Code Field -->
				{!! Form::text('restaurant_location_code', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Location Code</label>
			</div>
			<div class="col-md-9 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Restaurant Location Field -->
				{!! Form::text('restaurant_location', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Location</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Restaurant Location Lati Field -->
				{!! Form::text('restaurant_location_lati', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Latitude</label>
			</div>
			<div class="col-md-3 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Restaurant Location Long Field -->
				{!! Form::text('restaurant_location_long', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Longitude</label>
			</div>
		</div>
		<div class="col-md-12 line-break"></div>
	</div>
</div>
<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Restaurant Contact Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6 pull-right">
                    <a href="javascript: void(0);" id="show_2" tabindex="-1">Show</a>
                <!--/div>
                <div class="col-md-6"-->
                    <a href="javascript: void(0);" id="hide_2" tabindex="-1">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div id="contact-details">
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Contact Person Title Field -->
				{!! Form::text('contact_person_title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Contact Person Title</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Contact Person First Name Field -->
				{!! Form::text('contact_person_first_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Contact Person First Name</label>
			</div>
			<div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Contact Person Last Name Field -->
				{!! Form::text('contact_person_last_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Contact Person Last Name</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Contact Person Email Field -->
				{!! Form::text('contact_person_email', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Contact Person Email</label>
			</div>
			<div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Contact Person Phone Field -->
				{!! Form::text('contact_person_phone', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Contact Person Phone</label>
			</div>
			<div class="col-md-2 row-spacer-top-bot mui-textfield mui-textfield--float-label">
				<!-- Contact Person Phone Ext Field -->
				{!! Form::text('contact_person_phone_ext', null, ['class' => 'form-control', 'placeholder' => '']) !!}
				<label tabindex="-1">Ext</label>
			</div>
		</div>
		<div class="col-md-12 line-break"></div>
	</div>
</div>

<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Linked Fryer(s) & Machine(s)</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6 pull-right">
                    <a href="javascript: void(0);" id="show_3" tabindex="-1">Show</a>
                <!--/div>
                <div class="col-md-6"-->
                    <a href="javascript: void(0);" id="hide_3" tabindex="-1">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div id="linked-fryer">
		<div class="row">
			<div id="fryers" class="col-md-4 row-spacer-top-bot">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5">
							<div class="row">
								<h5>Linked Fryer(s)</h5>
							</div>
						</div>
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-12 checkbox checkbox-warning">
									<input id="show-linked-fryer" onclick="return showLinkedFryer();" type="checkbox">
									<label for="show-linked-fryer" class="checkbox-inline pull-right" style="padding-left:5px;">
										Show linked only
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-spacer-top-bot mui-textfield mui-textfield--float-label">
						{!! Form::text('fryer_search', null, ['class' => 'form-control search', 'placeholder' => '']) !!}
						<label tabindex="-1">Filter Fryer</label>
					</div>
				</div>
				<div class="col-md-12 link-to-checkboxes-bg">
					<div class="row link-to-checkboxes custom-scrollbar list">
						@foreach($fryers as $fryer)
							<div class="col-md-12 checkbox checkbox-warning">
								{!! Form::hidden('fryer['.$fryer->custom_index.']', false) !!}
								{!! Form::checkbox('fryer['.$fryer->custom_index.']', $fryer->id, $fryer->id_exists, ['id' => 'is-active-fryer'.$fryer->id, 'class' => 'fryer-item-checkbox']) !!}
								<label for="is-active-fryer{!! $fryer->id !!}" id="fryer{!! $fryer->id !!}" class="checkbox-inline fryer-name">
									{!! $fryer->fryer_name !!}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-1">
			</div>
			<div id="machines" class="col-md-4 row-spacer-top-bot">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5">
							<div class="row">
								<h5>Linked Machine(s)</h5>
							</div>
						</div>
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-12 checkbox checkbox-warning">
									<input id="show-linked-machine" onclick="return showLinkedMachine();" type="checkbox">
									<label for="show-linked-machine" class="checkbox-inline pull-right" style="padding-left:5px;">
										Show linked only
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-spacer-top-bot mui-textfield mui-textfield--float-label">
						{!! Form::text('machine_search', null, ['class' => 'form-control search', 'placeholder' => '']) !!}
						<label tabindex="-1">Filter Machine</label>
					</div>
				</div>
				<div class="col-md-12 link-to-checkboxes-bg">
					<div id="linked-machines" class="row link-to-checkboxes custom-scrollbar list">
						@foreach($machines as $machine)
							<div class="col-md-12 checkbox checkbox-warning">
								{!! Form::hidden('machine['.$machine->custom_index.']', false) !!}
								{!! Form::checkbox('machine['.$machine->custom_index.']', $machine->id, $machine->id_exists, ['id' => 'is-active-machine'.$machine->id, 'class' => 'machine-item-checkbox']) !!}
								<label for="is-active-machine{!! $machine->id !!}" id="machine{!! $machine->id !!}" class="checkbox-inline machine-name">
									{!! $machine->machine_name !!}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@section('scripts')
    <!-- SOURCE http://www.listjs.com/docs/list-api -->
    <link href="{!! asset('css/jquery.datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('js/jquery.datetimepicker.full.min.js') !!}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>
    <script type="text/javascript">
        var fryerOptions = {
            valueNames: ['fryer-name']
        }
        var fryerList = new List('fryers', fryerOptions);

        var machineOptions = {
            valueNames: ['machine-name']
        }
        var machineList = new List('machines', machineOptions);

        $("#activation_date").datetimepicker({
          format:'Y-m-d H:i:s',
        });

        function showLinkedFryer() {
            if($("#show-linked-fryer").is(':checked'))
            {
                $(".fryer-item-checkbox").each(function(){
                    if(!$(this).is(':checked'))
                        $(this).parent().removeClass("hide-important").addClass("hide-important");
                });
            }
            else
            {
                $(".fryer-item-checkbox").each(function(){
                    $(this).parent().removeClass("hide-important");
                });
            }
        }

        function showLinkedMachine()
        {
            if($("#show-linked-machine").is(':checked'))
            {
                $(".machine-item-checkbox").each(function(){
                    if(!$(this).is(':checked'))
                        $(this).parent().removeClass("hide-important").addClass("hide-important");
                });
            }
            else
            {
                $(".machine-item-checkbox").each(function(){
                    $(this).parent().removeClass("hide-important");
                });
            }
        }
        
        window.onload = function(e) {
            $("#show_1").hide();
            $("#show_2").hide();
            $("#show_3").hide();
        }
        
        $("#hide_1").click(function(){
			$("#show_1").show();
			$("#hide_1").hide();
			$("#rest-details").hide(500);
		});
		
		$("#show_1").click(function(){
			$("#show_1").hide();
			$("#hide_1").show();
			$("#rest-details").show(500);
		});
		
		$("#hide_2").click(function(){
			$("#show_2").show();
			$("#hide_2").hide();
			$("#contact-details").hide(500);
		});
		
		$("#show_2").click(function(){
			$("#show_2").hide();
			$("#hide_2").show();
			$("#contact-details").show(500);
		});
		
		$("#hide_3").click(function(){
			$("#show_3").show();
			$("#hide_3").hide();
			$("#linked-fryer").hide(500);
		});
		
		$("#show_3").click(function(){
			$("#show_3").hide();
			$("#hide_3").show();
			$("#linked-fryer").show(500);
		});
    </script>
@endsection
