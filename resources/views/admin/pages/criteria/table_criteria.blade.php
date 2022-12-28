<div id="<?= $id ?>" class="w3-container criteria w3-animate-left">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    ID
                </th>
                <th style="width: 15%">
                    Criteria Name
                </th>
                <th style="width: 15%">
                    Factor Name
                </th>
                <th style="width: 40%">
                    Products Name
                </th>
                <th style="width: 8%">
                    Value
                </th>
                <th style="width: 17%">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($criterias as $criteria)
            <?php $condition = $id == 'All' ?  $criteria->parent_id != NULL : $criteria->parent_id == $parent_id?>
            @if ($condition)
            <tr>
                <td>
                    <p>{{$criteria->id}}</p>
                </td>
                <td>
                    <p>{{$criteria->name}}</p>
                </td>
                <td>
                    <p>{{$criteria->getNameParent($criteria->parent_id)}}</p>
                </td>
                <td>
                    @foreach($criteria->products as $product)
                    {{$product->name}} <br />
                    @endforeach
                </td>
                <td>
                    @foreach($criteria->products as $product)
                    {{$product->pivot->value}} <br />
                    @endforeach
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
