<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{{ $moduleTitle }}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-12">
                        <a href="{!! route('clientLogins.index') !!}" class="btn btn-default pull-left">Discard</a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row row-spacer-top-bot">
        <div class="col-md-10">
            <h3>Client Login Details</h3>
        </div>
    </div>
    <div class="row">
        @include('core-templates::common.errors')
    </div>
    <div class="row">
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Email Field -->
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Email</label>
        </div>
        <div class="col-md-4 row-spacer-top-bot mui-textfield mui-textfield--float-label">
            <!-- Password Field -->
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
			<label tabindex="-1">Password</label>
        </div>
        <div class="col-md-4 row-spacer-top-bot checkbox checkbox-warning cb-padding-top">
            <!-- Status Field -->
            {!! Form::hidden('status', false) !!}
            {!! Form::checkbox('status', '1', null, ['id' => 'is-active', 'class' => 'styled']) !!} 
            <label for="is-active" class="checkbox-inline">
                is Active?
            </label>
        </div>
    </div>
    <div class="row">
        <div id="corporations" class="col-md-4 row-spacer-top-bot">
            <div class="col-md-12">
                <div class="row">
                    <h5>Select Corporation(s):</h5>
                </div>
                <div class="row row-spacer-top-bot mui-textfield mui-textfield--float-label">
                    {!! Form::text('corporation_search', null, ['class' => 'form-control search', 'placeholder' => '']) !!}
					<label tabindex="-1">Filter Corporation</label>
                </div>
            </div>
            <div class="col-md-12 link-to-checkboxes-bg">
                <div id="linked-corporations" class="row link-to-checkboxes custom-scrollbar list">
                    @foreach($corporations as $corporation)
                        <div class="col-md-12 checkbox checkbox-warning">
                            {!! Form::hidden('corporations['.$corporation->custom_index.']', false) !!}
                            {!! Form::checkbox('corporations['.$corporation->custom_index.']', $corporation->id, $corporation->id_exists, ['id' => 'is-active'.$corporation->id, 'class' => 'corp-item-checkbox', 'onclick' => 'return showCasino();', 'class-data-collection' => '.casino-list'.$corporation->id]) !!}
                            <label for="is-active{!! $corporation->id !!}" id="corporation{!! $corporation->id !!}" class="checkbox-inline corp-name">
                                {!! $corporation->corporation_name !!}
                            </label>
                            <div class="hide">
                            @foreach($corporation->casinoLinks as $val)
                                <input type="hidden" class="casino-list{!! $corporation->id !!}" value="#casino-checkbox-container{!! $val->casino->id !!}">
                            @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div id="casinos" class="col-md-4 row-spacer-top-bot">
            <div class="col-md-12">
                <div class="row">
                    <h5>Select Casino(s):</h5>
                </div>
                <div class="row row-spacer-top-bot mui-textfield mui-textfield--float-label">
                    {!! Form::text('casino_search', null, ['class' => 'form-control search', 'placeholder' => '']) !!}
					<label tabindex="-1">Filter Casino</label>
                </div>
            </div>
            <div class="col-md-12 link-to-checkboxes-bg">
                <div id="linked-casinos" class="row link-to-checkboxes custom-scrollbar list">
                    @foreach ($casinos as $casino)
                        <div id="casino-checkbox-container{!! $casino->id !!}" class="col-md-12 checkbox checkbox-warning hide-important">
                            {!! Form::hidden('casinos['.$casino->custom_index.']', false) !!}
                            {!! Form::checkbox('casinos['.$casino->custom_index.']', $casino->id, $casino->id_exists, ['id' => 'is-casino'.$casino->id]) !!}
                            <label for="is-casino{!! $casino->id !!}" id="casino{!! $casino->id !!}" class="checkbox-inline casino-name">
                                {!! $casino->casino_trade_name !!}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <!-- SOURCE http://www.listjs.com/docs/list-api -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>
    <script type="text/javascript">
    var corpOptions = {
      valueNames: [ 'corp-name' ]
    };
    var corporationList = new List('corporations', corpOptions);

    var casinoOptions = {
        valueNames: ['casino-name']
    }
    var casinoList = new List('casinos', casinoOptions);

    // CHECKBOX
    function showCasino() 
    {
        notSelectedCorpHideCasino();
    }


    function notSelectedCorpHideCasino(){
        $(".corp-item-checkbox").each(function(){
            var casino_class = $(this).attr('class-data-collection');
            //console.log(casino_class);
            if(!$(this).is(':checked')) {
                $(casino_class).each(function(){
                    var value = $(this).val();
                    $(value +"> input[type='checkbox']").removeAttr('checked');
                    $(value).removeClass("hide-important").addClass("hide-important");
                });
            }
        }).promise().done(function() {
            selectedCorpShowCasino();
        });;
    }
    function selectedCorpShowCasino() {
        $(".corp-item-checkbox").each(function(){
            var casino_class = $(this).attr('class-data-collection');
            if($(this).is(':checked')) {
                $(casino_class).each(function(){
                    var value = $(this).val();
                    $(value).removeClass("hide-important");
                });
            }
        });
    }

    window.onload = function(e) {
        selectedCorpShowCasino();
    }
    </script>
@endsection
