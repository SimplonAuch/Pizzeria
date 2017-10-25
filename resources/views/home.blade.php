@extends('template.header')

@section('content')
    <div class="carousel carousel-slider" style='max-height:700px' style=>
        <a class="carousel-item" href="#two!"><img src={{ URL::asset("img/carrousel_2.jpg")}}></a>
        <a class="carousel-item" href="#three!"><img src={{ URL::asset("img/carrousel_3.jpg")}}></a>
        <a class="carousel-item" href="#four!"><img src={{ URL::asset("img/carrousel_4.jpg")}}></a>
    </div>
    <div class="container">
        <h3 class="center-align black-color">Nos pizzas</h3>
        <div class="col s8 offest-s2">
       
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
            <form method="post" id='pizza' action="/makeOrder">
                <table class="striped">
                    <thead>
                    <tr>
                        <th>Pizzas</th>
                        <th>Ingrédients</th>
                        <th>31 cm</th>
                        <th>40 cm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menu as $pizza)
                        @if($pizza['status'])
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
                                <input name="l_{{$pizza['pizza_id']}}" type="checkbox" id="l_{{$pizza['pizza_id']}}" />
                                <label for="l_{{$pizza['pizza_id']}}">
                                    <?= $pizza['price_little']/100 ?> €
                                </label>
                            </td>
                            <td>
                                <input name="b_{{$pizza['pizza_id']}}" type="checkbox" id="b_{{$pizza['pizza_id']}}" />
                                <label for="b_{{$pizza['pizza_id']}}">
                                    <?= $pizza['price_big']/100 ?> €
                                </label>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="first_name" id="first_name" type="text" class="validate"/>
                        <label for="first_name">Prenom</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="last_name" id="last_name" type="text" class="validate"/>
                        <label for="last_name">Nom de famille</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="hours">
                            <option value="" disabled selected>Définir l'heure</option>
                            <option value="1">Dans 10 minutes</option>
                            <option value="20">Dans 20 minutes</option>
                            <option value="30">Dans 30 minutes </option>
                            <option value="40">Dans 40 minutes </option>
                            <option value="50">Dans 50 minutes </option>
                            <option value="60">Dans 1 heure </option>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" for="phone" class="validate" name="phone" />
                        <label for="phone">Numero de téléphone</label>
                    </div>
                </div>
                {{ csrf_field() }}
                <button class="btn waves-effect waves-light btn-cmd" type="submit" name="action">
                    Commander
                </button>
            </form>
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