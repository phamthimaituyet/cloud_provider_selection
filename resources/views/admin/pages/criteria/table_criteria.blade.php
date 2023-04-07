<div id="<?= $id ?>" class="w3-container criteria w3-animate-left">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Weight
                </th>
                <th>
                    Criteria Name
                </th>
                <th>
                    Factor Name
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($criterias as $criteria)
            <?php $condition = $id == 'All' ?  true : $criteria->parent_id == $parent_id?>
            @if ($condition)
            <tr>
                <td>
                    <p>{{$criteria->id}}</p>
                </td>
                <td>
                    <p>{{ $criteria->weight }}</p>
                </td>
                <td>
                    <p>{{$criteria->name}}</p>
                </td>
                <td>
                    <p>{{$criteria->getNameParent($criteria->parent_id)}}</p>
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
