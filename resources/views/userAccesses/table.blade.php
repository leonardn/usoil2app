<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive list-table" id="corporations-table">
                <thead>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>

                @foreach($wpusers as $user)
                    <tr>
                        <td>{!! $user['user_name'] !!}</td>
                        <td>{!! $user['first_name'] .' '. $user['last_name'] !!}</td>
                        <td>{!! $user['user_email'] !!}</td>
                        <td class="text-center border-right">
                            <a href="{!! route('userAccesses.create', $parameters = array('user_id' =>$user['wp_user_id'])) !!}" class='btn btn-default btn-xs'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Add User Access
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
