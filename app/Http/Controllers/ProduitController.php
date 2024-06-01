<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\view;
use App\Http\Controllers\save;
use App\Models\Categorie;
use App\Models\LigneVente;
use Illuminate\Validation\Rule;
// use WpOrg\Requests\Auth;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    public function showProducts()
{
    $products = Produit::paginate(10);
    return view('produit.edite', compact('products'));
}
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
        $produit= Produit::find($id);
        return view('produit.edite' ,['prd'=>$produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProduct(Request $request, $id)
    {
        $product = Produit::findOrFail($id);
        $product->nom = $request->input('product-name');
        $product->description = $request->input('product-description');
        $product->prix = $request->input('product-price');
        $product->qte_stock = $request->input('product-stock');
        $product->qte_min = $request->input('product-min');
        $product->remise = $request->input('product-discount');
        $product->save();

        return redirect()->route('EditeProduit')->with('updateprod', 'Produit mis à jour avec succès');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroyProduct($id)
    {
        $product = Produit::findOrFail($id);
        $product->delete();

        return redirect()->route('EditeProduit')->with('deletprod', 'Produit supprimé avec succès');
    }
    // method panier for produit.panier

    // methode ventes pour les details de vente de chaque produit
    public function ventes(){
        // tous les produits vendus
        $produitsVentes = LigneVente::select('id_produit')->distinct()->get();

        $produits = Produit::whereIn('id', $produitsVentes)->get();

        return view('/produit.ventes',[
            'produits' => $produits
        ]);
    }

    public function venteDetails($produit){
        $produit = Produit::find($produit);
        $detailsProduit = LigneVente::select('ligne_ventes.id as ligne_id','ligne_ventes.quantite', 'ligne_ventes.created_at as ligne_at', 'clients.nom_utilisateur')
            ->join('ventes', 'ligne_ventes.id_vente', '=', 'ventes.id')
            ->join('clients', 'ventes.id_client', '=', 'clients.id')
            ->where('ligne_ventes.id_produit',$produit->id)
            ->get();

        return view('/produit.venteDetails',[
            'produit'   => $produit,
            'detailsProduit'    => $detailsProduit
        ]);
    }

}
