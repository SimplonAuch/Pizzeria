@extends('template.header')

@section('content')
<div class="container">
    <div class="col s8 offest-s2 ">
        <div class="margin">
            Bonjour <?= $customer['first_name'] ?> <?= $customer['last_name'] ?>  voici le detail de votre commande :  
        </div>
        <table class="striped"> 
            <thead>
            <tr>
                <th>Pizza</th>
                <th>Taille</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            @foreach($summary as $pizza)
                <tr>
                    <td>
                        <?= $pizza['name'] ?> €
                    </td>
                    <td>
                        <?= $pizza['size'] ?> cm
                    </td>
                    <td>
                        <?= $pizza['price']/100 ?> €
                    </td>
                </tr>
            @endforeach
                <tr>
                   <td></td>
                   <td>Total :</td>
                   <td>
                        <?= $order['total_price']/100 ?> €
                   </td> 
                </tr>
            </tbody>
        </table>
    </div>
    <div class="margin">
       Vous pouvez la récuperer à <?= date('H', strtotime($order['delivery_at'])) ?>h<?= date('i', strtotime($order['delivery_at']))?>.
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