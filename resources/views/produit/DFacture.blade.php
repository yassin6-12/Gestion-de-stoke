<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">


        <title>invoice card - Bootdey.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body{margin-top:20px;
            background-color:#eee;
            }

            .card {
                box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            }
            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0,0,0,.125);
                border-radius: 1rem;
            }
        </style>
    </head>
    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Facture #DS0204 <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">Electro.</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> </p>
                                    <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Facturé à :</h5>
                                        <h5 class="font-size-15 mb-2">{{$dataClient['nom']}} {{$dataClient['prenom']}}</h5>
                                        <p class="mb-1">{{$dataClient['ville']}}</p>
                                        <p class="mb-1"></p>
                                        <p>{{$dataClient['phone']}}</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">N° de facture:</h5>
                                            <p>#DZ0112</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Date de facturation:</h5>
                                            <p>{{$date}}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">N° de commande:</h5>
                                            <p>#{{$commande}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="py-2">
                                <h5 class="font-size-15">Récapitulatif de la commande</h5>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">Num.</th>
                                                <th>Article</th>
                                                <th>Prix</th>
                                                <th>Quantité</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                                $sous_total = 0;
                                                $total = 0;
                                                $rabais = 0;
                                                $shipping_charge = 0;
                                                $tax = 0;
                                            @endphp
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th scope="row">{{$i+1}}</th>
                                                    <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{$product->nom}}</h5>
                                                    </div>
                                                    </td>
                                                    <td>$ {{$product->prix - ($product->prix * $product->remise/100)}}</td>
                                                    <td>{{$quantities[$i]}}</td>
                                                    <td class="text-end">$ {{($product->prix - ($product->prix * $product->remise/100)) * $quantities[$i]}}</td>
                                                </tr>
                                                @php
                                                    $sous_total += $product->prix * $quantities[$i];
                                                    $total += ($product->prix - ($product->prix * $product->remise/100)) * $quantities[$i];
                                                    $rabais += ($product->prix * $product->remise/100) * $quantities[$i];
                                                @endphp
                                            @endforeach

                                            <tr>
                                                <th scope="row" colspan="4" class="text-end">Sous-total</th>
                                                <td class="text-end">{{$sous_total}}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Rabais:</th>
                                                <td class="border-0 text-end">- ${{$rabais}}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                Shipping Charge :</th>
                                                <td class="border-0 text-end">${{$shipping_charge}}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax</th>
                                                <td class="border-0 text-end">${{$tax}}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end"><h4 class="m-0 fw-semibold">${{$total}}</h4></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                        <a href="{{route('produit.index')}}" class="btn btn-success me-1" id="valider-vente">Valider</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#valider-vente').click(function(){
                    localStorage.setItem('panier','[]');
                })
            })
        </script>
    </body>
</html>