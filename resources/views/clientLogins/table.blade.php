 <div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="clientLogins-table">
                <thead>
                    <th>Email</th>
                    <th>Password</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($clientLogins as $clientLogin)
                    <tr>
                        <td>{!! $clientLogin->email !!}</td>
                        <td class="col-md-6">
                            <div class="input-group">
                              <input type="password" class="form-control" id="password{!! $clientLogin->id !!}" value="{!! $clientLogin->password !!}" disabled>
                              <div class="input-group-addon" title="Show Password" onclick="return showPassword('#password{!! $clientLogin->id !!}');" style="border:none; cursor:pointer;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                              </div>
                            </div>
                        </td>
                        <td class="text-center border-right">
                            {!! Form::open(['route' => ['clientLogins.destroy', $clientLogin->id], 'method' => 'delete', 'id' => 'form-delete-'.$clientLogin->id]) !!}
                            <a href="{!! route('clientLogins.edit', [$clientLogin->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>
                            <div class='btn-group'>
                                {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs deleteBtn', 'id-to-delete' => $clientLogin->id, 'onclick' => 'return false;', 'id' => 'submitBtn', 'data-toggle' => 'modal', 'data-target' => '#confirm-submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('core-templates::common.paginate', ['records' => $clientLogins])
        </div>
    </div>
</div>
