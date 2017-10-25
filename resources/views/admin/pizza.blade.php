@extends('template.header')

@section('content')
<div class="container">
    <div class="col s8 offest-s2 ">   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($error_message)
            <div class="alert alert-danger">
                <?= $error_message ?>
            </div>
        @endif
        <table class="striped">
            <thead>
            <tr>
                <th>Pizzas</th>
                <th>Ingrédients</th>
                <th>31 cm</th>
                <th>40 cm</th>
                <th>Editer</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menu as $pizza)
                <tr>
                    <td>
                        <?= $pizza['name'] ?>
                    </td>
                    <td>
                        @foreach($pizza['compose'] as $value)
                                <?= $value->name ?>,
                        @endforeach
                    </td>
                    <td>
                        <?= $pizza['price_little']/100 ?> €
                    </td>
                    <td>
                        <?= $pizza['price_big']/100 ?> €
                    </td>
                    <td>
                        <a href="">X</a>
                    </td>
                    <td>
                        @if($pizza['status'])
                            <a href="<?="/admin/changeStatus/".$pizza['pizza_id']?>">active</a>
                        @else
                            <a href="<?="/admin/changeStatus/".$pizza['pizza_id']?>">inactive</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    <footer class="footer">
        <div class="footer-parent"> 
            <div>
                Aliquam dapibus commodo nisl, rhoncus finibus turpis. Nam sit amet dui at dolor egestas cursus. Sed ut ullamcorper ante. Mauris nisi ligula, consequat condimentum dolor quis, congue convallis mauris. In ultrices felis vel accumsan sollicitudin. Sed tincidunt, ipsum id finibus viverra, purus risus semper ipsum, ultricies porta dui velit vitae elit. Mauris vehicula condimentum scelerisque. Vestibulum luctus enim eget nisl mattis malesuada eget et dolor. Mauris rutrum odio a dictum egestas. Nam purus dolor, consequat ut luctus ut, hendrerit non ligula.
            </div>
            <div>
                Aliquam dapibus commodo nisl, rhoncus finibus turpis. Nam sit amet dui at dolor egestas cursus. Sed ut ullamcorper ante. Mauris nisi ligula, consequat condimentum dolor quis, congue convallis mauris. In ultrices felis vel accumsan sollicitudin. Sed tincidunt, ipsum id finibus viverra, purus risus semper ipsum, ultricies porta dui velit vitae elit. Mauris vehicula condimentum scelerisque. Vestibulum luctus enim eget nisl mattis malesuada eget et dolor. Mauris rutrum odio a dictum egestas. Nam purus dolor, consequat ut luctus ut, hendrerit non ligula.
            </div>
            <div>
                Aliquam dapibus commodo nisl, rhoncus finibus turpis. Nam sit amet dui at dolor egestas cursus. Sed ut ullamcorper ante. Mauris nisi ligula, consequat condimentum dolor quis, congue convallis mauris. In ultrices felis vel accumsan sollicitudin. Sed tincidunt, ipsum id finibus viverra, purus risus semper ipsum, ultricies porta dui velit vitae elit. Mauris vehicula condimentum scelerisque. Vestibulum luctus enim eget nisl mattis malesuada eget et dolor. Mauris rutrum odio a dictum egestas. Nam purus dolor, consequat ut luctus ut, hendrerit non ligula.
            </div>
        </div>
    </footer>
@endsection