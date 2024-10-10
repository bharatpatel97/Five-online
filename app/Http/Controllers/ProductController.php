<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use GeoIp2\Database\Reader;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$ip = '8.8.8.8'; // Example public IP for testing
        //$ip = request()->ip();

        $ip = '172.69.178.53'; //India
        //$ip = '1.0.0.255'; //Australia
        //$ip = '100.42.23.255'; //Canada
        //$ip = '1.0.3.255'; //China
        //$ip = '103.117.171.255'; //American Samoa

        $response = Http::get("http://ip-api.com/json/{$ip}");

        if ($response->successful() && $response->json()['status'] === 'success') {
            $countryCode = $response->json()['countryCode'];
        } else {
            $countryCode = '';
        }

        if($countryCode != ''){
            $products = Products::where('country', $countryCode)->get();
        }
        else{
            $products = [];
        }

        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'price'   => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'country' => 'required',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5120',
        ]);

        $productImage = '';

        if ($request->hasFile('image')) {
            $destinationPath = 'uploads/images/';
            $file = $request->file('image');
            $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationPath), $filename);
            $productImage = $destinationPath . $filename;
        }

        $products = new Products();
        $products->fill($request->all());

        if ($productImage != '') {
            $products->image = $productImage;
        }

        $products->save();
        return redirect(route('product.index'))->with('message','Product hase been store successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name'     => 'required',
            'price'   => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'country' => 'required',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5120',
        ]);

        $productImage = '';

        if ($request->hasFile('image')) {
            $destinationPath = 'uploads/images/';
            $file = $request->file('image');
            $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationPath), $filename);
            $productImage = $destinationPath . $filename;
        }

        $products = Products::find($id);
        $products->fill($request->all());

        if ($productImage != '') {
            $products->image = $productImage;
        }

        $products->save();

        return redirect(route('product.index'))->with('message','Products hase been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect(route('product.index'))->with('message','Products hase been delete successfully.');
    }
}
