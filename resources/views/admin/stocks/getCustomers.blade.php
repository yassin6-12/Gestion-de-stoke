@foreach ($getCustomers as $customer)
    <option value="{{$customer->id}}">{{$customer->nom_utilisateur}}</option>
@endforeach