<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\view;
use App\Http\Controllers\save;
use App\Models\Categorie;
use App\Models\LigneVente;
use App\Models\User;
use App\Models\Vente;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;
// use WpOrg\Requests\Auth;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getCategories = Categorie::all();
        return view('produit.index',['get_cats'=>$getCategories]);
    }

    // public function panier()
    // {
    //     return view('produit.Panier');
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produit.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validation of input fields
        request()->validate([
            'product_name'          =>['required','min:3'],
            'product_price'         =>['required'],
            'produit_stock_qt'      =>['required'],
            'produit_min_qt'        =>['required'],
            'category_of_produit'   =>[Rule::notIn('0')],
            'images'                  =>['required'],
        ]); 

        $images = NULL;

      if($request->hasFile('images')){

            $uploadPath = 'uploads/gallery/';

            $files = $request->file('images');
            $arrayImages = array();
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = time().'-'.rand(0,99).'.'.$extension;
                $file->move($uploadPath,$filename);
                $filename = "uploads/gallery/".$filename;
                array_push($arrayImages,$filename);
            }

            $images = json_encode($arrayImages);
        
            $produit = new Produit();
            $produit->nom           = $request->input('product_name');
            $produit->prix          = $request->input('product_price');
            $produit->description   = $request->input('product_description');
            $produit->qte_stock     = $request->input('produit_stock_qt');
            $produit->qte_min       = $request->input('produit_min_qt');
            $produit->categorie_id  = $request->input('category_of_produit');
            if(!empty($request->input('produit_remise'))){
                $produit->remise   = intval($request->input('produit_remise'));
            }else{
                $produit->remise   = 0;
            }
            $produit->images        = $images;
            $produit->save();

            return to_route('produit.index');
      }
      else{
        
        return to_route('Produit.create');
      }
        
        
        /*Gallery::create([
            'name'  => $name,
            'images' => $json,
        ]);*/
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($nom)
    {
        $produitsOfCat  = Produit::join('categories','produits.categorie_id','=','categories.id')->where('categories.nom',$nom)->select('Produits.*')->get();
        return view('Produit.show',['produits'=>$produitsOfCat,'nomCat'=>$nom]);
    }
    public function showProduit($cat,$produit){
        $getProduit = Produit::findOrFail($produit);
        return view('Produit.produit',['nomCat'=>$cat,'produit'=>$getProduit]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return view('SupprimerProduit');
    }
    // method panier for produit.panier
    public function panier(Request $request){

        $idProduits = json_decode($request->query('id_products'));
        $products = Produit::whereIn('id',$idProduits)->get();

        return view('/produit.Panier',['produits'=>$products]);

    }
    public function facture(Request $request){

        $products = json_decode($request->input('products'));
        $products = Produit::whereIn('id',$products)->get();
        $quantities = json_decode($request->input('quantities'));

        $clients = User::where('type_user','client')->get();

        // get the last facture id from vente table
        $lastFacture = 0;

        return view('/produit.facture',['products'=>$products,'quantities'=>$quantities,'clients'=>$clients,'lastFactureid'=>$lastFacture]);

    }
    public function dfacture(Request $request){

        $idProducts = json_decode($request->input('products'));
        $products   = Produit::whereIn('id',$idProducts)->get();
        $quantities = json_decode($request->input('quantities'));

        $client = $request->input('client');
        $nom    = $request->input('nom');
        $prenom = $request->input('prenom');
        $ville  = $request->input('ville');
        $phone  = $request->input('phone');
        $email  = $request->input('email');
        $dataClient = array('idClient'=>$client,'nom'=>$nom,'prenom'=>$prenom,'ville'=>$ville,'phone'=>$phone,'email'=>$email);

        // add vente to DB
        $vente = new Vente();
        $vente->id_gestionaire  = Auth::user()->id;
        $vente->id_client       = $client;
        $vente->save();

        // get the id of this vente
        $getIdVente = $vente->id;

        // add ligne vente to DB
        $i = 0;
        foreach($products as $product){
            $ligneVente = new LigneVente();
            $ligneVente->id_vente       = $getIdVente;
            $ligneVente->id_produit     = $product->id;
            $ligneVente->quantite       = $quantities[$i];
            $ligneVente->save();
            $i++;
        }

        return view('/produit.Dfacture',['products'=>$products,'quantities'=>$quantities,'dataClient'=>$dataClient,'date'=>$vente->created_at,'commande'=>$vente->id]);
    }
}
