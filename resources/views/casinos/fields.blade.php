<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{!! $moduleTitle !!}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-6">
                        <a href="{!! route('casinos.index') !!}" class="btn btn-default pull-right">Discard</a>
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
            <h3>Casinos Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6 pull-right">
                    <a href="javascript: void(0);" id="show_1">Show</a>
                <!--/div>
                <div class="col-md-6"-->
                    <a href="javascript: void(0);" id="hide_1">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div id="casino-details">
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Casino Trade Name Field -->
				{!! Form::text('casino_trade_name', null, ['class' => 'form-control', 'placeholder' => 'Casino Trade Name']) !!}
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
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Casino Email Field -->
				{!! Form::email('casino_email', null, ['class' => 'form-control', 'placeholder' => 'Casino Email']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 row-spacer-top-bot">
				<!-- Casino Ein Field -->
				{!! Form::text('casino_ein', null, ['class' => 'form-control', 'placeholder' => 'EIN']) !!}
			</div>
			<div class="col-md-10 row-spacer-top-bot">
				<!-- Account Payable Name Field -->
				{!! Form::text('account_payable_name', null, ['class' => 'form-control', 'placeholder' => 'Account Payable Name']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 row-spacer-top-bot">
				<!-- Casino Address1 Field -->
				{!! Form::text('casino_address1', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 row-spacer-top-bot">
				<!-- Casino Address2 Field -->
				{!! Form::text('casino_address2', null, ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 row-spacer-top-bot">
				<!-- Casino City Field -->
				{!! Form::text('casino_city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
			</div>
			<div class="col-md-3 row-spacer-top-bot">
				<!-- Casino State Field -->
				{!! Form::select('casino_state', Config::get('constants.state_en'), null, ['class' => 'select-form-control']) !!}
			</div>
			<div class="col-md-3 row-spacer-top-bot">
				<!-- Casino Zipcode Field -->
				{!! Form::text('casino_zipcode', null, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 row-spacer-top-bot">
				<!-- Casino Phone Field -->
				{!! Form::text('casino_phone', null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
			</div>
			<div class="col-md-2 row-spacer-top-bot">
				<!-- Casino Phone Ext Field -->
				{!! Form::text('casino_phone_ext', null, ['class' => 'form-control', 'placeholder' => 'Ext']) !!}
			</div>
		</div>
		<div class="col-md-12 line-break"></div>
	</div>
</div>
<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Casino Contact Details</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6 pull-right">
                    <a href="javascript: void(0);" id="show_2">Show</a>
                <!--/div>
                <div class="col-md-6"-->
                    <a href="javascript: void(0);" id="hide_2">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div id="contact-details">
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Contact Person Title Field -->
				{!! Form::text('contact_person_title', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Title']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Contact Person First Name Field -->
				{!! Form::text('contact_person_first_name', null, ['class' => 'form-control', 'placeholder' => 'Contact Person First Name']) !!}
			</div>
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Contact Person Last Name Field -->
				{!! Form::text('contact_person_last_name', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Last Name']) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Contact Person Email Field -->
				{!! Form::text('contact_person_email', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Email']) !!}
			</div>
			<div class="col-md-4 row-spacer-top-bot">
				<!-- Contact Person Phone Field -->
				{!! Form::text('contact_person_phone', null, ['class' => 'form-control', 'placeholder' => 'Contact Person Phone']) !!}
			</div>
			<div class="col-md-2 row-spacer-top-bot">
				<!-- Contact Person Phone Ext Field -->
				{!! Form::text('contact_person_phone_ext', null, ['class' => 'form-control', 'placeholder' => 'Ext']) !!}
			</div>
		</div>
		<div class="col-md-12 line-break"></div>
	</div>
</div>

<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Linked Restaurants</h3>
        </div>
        <div class="col-md-2">
            <div class="row top-right-btn">
                <div class="col-md-6 pull-right">
                    <a href="javascript: void(0);" id="show_3">Show</a>
                <!--/div>
                <div class="col-md-6"-->
                    <a href="javascript: void(0);" id="hide_3">Hide</a>
                </div>
            </div>
        </div>
    </div>
    <div id="linked-rest">
		<div class="row row-spacer-top-bot">
			<div id="restaurants" class="col-md-4">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5">
							<div class="row">
								<h5>Restaurants Linked</h5>
							</div>
						</div>
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-12 checkbox checkbox-warning">
									<input id="show-linked-restaurant" onclick="return showLinkedRestaurant();" type="checkbox">
									<label for="show-linked-restaurant" class="checkbox-inline pull-right" style="padding-left:5px;">
										Show linked only
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-spacer-top-bot">
						{!! Form::text('restaurant_search', null, ['class' => 'form-control search', 'placeholder' => 'Filter Restaurant']) !!}
					</div>
				</div>
				<div class="col-md-12 link-to-checkboxes-bg">
					<div class="row link-to-checkboxes custom-scrollbar list">
						@foreach($restaurants as $restaurant)
							<div class="col-md-12 checkbox checkbox-warning">
								{!! Form::hidden('restaurant['.$restaurant->custom_index.']', false) !!}
								{!! Form::checkbox('restaurant['.$restaurant->custom_index.']', $restaurant->id, $restaurant->id_exists, ['id' => 'is-active'.$restaurant->id, 'class' => 'restaurant-item-checkbox']) !!} 
								<label for="is-active{!! $restaurant->id !!}" id="restaurants-id" class="checkbox-inline restaurant-name">
									{!! $restaurant->restaurant_name !!}
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>
    <script type="text/javascript">
        var restaurantOptions = {
            valueNames: ['restaurant-name']
        }
        var casinoList = new List('restaurants', restaurantOptions);

        function showLinkedRestaurant() {
            if($("#show-linked-restaurant").is(':checked'))
            {
                $(".restaurant-item-checkbox").each(function(){
                    if(!$(this).is(':checked'))
                        $(this).parent().removeClass("hide-important").addClass("hide-important");
                });
            }
            else
            {
                $(".restaurant-item-checkbox").each(function(){
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
			$("#casino-details").hide(500);
		});
		
		$("#show_1").click(function(){
			$("#show_1").hide();
			$("#hide_1").show();
			$("#casino-details").show(500);
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
			$("#linked-rest").hide(500);
		});
		
		$("#show_3").click(function(){
			$("#show_3").hide();
			$("#hide_3").show();
			$("#linked-rest").show(500);
		});
    </script>
@endsection
