<table class="table table-responsive" id="userDatas-table">
    <thead>
        <th>User Id</th>
        <th>Document Type</th>
        <th>Id Number</th>
        <th>Name</th>
        <th>Birthdate</th>
        <th>Phone Number</th>
        <th>Direction</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($userDatas as $userData)
        <tr>
            <td>{!! $userData->user_id !!}</td>
            <td>{!! $userData->document_type !!}</td>
            <td>{!! $userData->id_number !!}</td>
            <td>{!! $userData->name !!}</td>
            <td>{!! $userData->birthdate !!}</td>
            <td>{!! $userData->phone_number !!}</td>
            <td>{!! $userData->direction !!}</td>
            <td>
                {!! Form::open(['route' => ['userDatas.destroy', $userData->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userDatas.show', [$userData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userDatas.edit', [$userData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>