<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Competitor;
use App\Registration;
use Image;
use Mail;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::with('competitor', 'competitor_secondary', 'category')->paginate(10);          
        return view('registrations.index', compact('registrations'));
    }

    public function publicIndex(){
        $registrations = Registration::with('competitor', 'competitor_secondary', 'category')->get();          
        return view('registrations.public_index', compact('registrations'));   
    }

    public function confirmaInscricao($id){
        $registration = Registration::find($id);
        $registration->confirmed_at = date('Y-m-d H:i:s');
        $registration->save();

        return redirect()->action('RegistrationController@index')->with('success' ,'Inscrição Confirmada com Sucesso!');  
    }

    public function desconfirmaInscricao($id){
        $registration = Registration::find($id);
        $registration->confirmed_at = NULL;
        $registration->save();

        return redirect()->action('RegistrationController@index')->with('success' ,'Inscrição Desconfirmada com Sucesso!');  
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function selectCategory(){
        $categories = Category::all()->pluck('name', 'id')->prepend('SELECIONE', '');
        return view('registrations.select_category', compact('categories'));
    }

    public function create(Request $request){
        $category = Category::find($request->category_id);
        if(isset($category->id))
            return view('registrations.create', compact('category'));
        else
            return redirect()->action('RegistrationController@selectCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $competitor = new Competitor();
        $competitor->name = $request->name1;
        $competitor->motorcycle = $request->motorcycle1;
        $competitor->team = $request->team1;
        $competitor->sponsors = $request->sponsors1;
    
        $image = $request->file('image1');
        $filename  = md5(microtime()) . '.' . $image->getClientOriginalExtension();
        $path2 = NULL;
        $path = $path1 = public_path('upload-img/' . $filename);
        Image::make($image->getRealPath())->resize(130, 140)->save($path);        
        $competitor->image = $filename;

        $competitor->save();

        $registration = new Registration();
        $registration->category_id = $request->category_id;
        $registration->competitor_id = $competitor->id;


        if($request->category_id == 5){
            $competitor2 = new Competitor();
            $competitor2->name = $request->name2;
            $competitor2->motorcycle = $request->motorcycle2;
            $competitor2->team = $request->team2;
            $competitor2->sponsors = $request->sponsors2;

            $image = $request->file('image2');
            $filename  = md5(microtime()) . '.' . $image->getClientOriginalExtension();

            $path = $path2 = public_path('upload-img/' . $filename);
            Image::make($image->getRealPath())->resize(130, 140)->save($path);        
            $competitor2->image = $filename;

            $competitor2->save();

            $registration->competitor_secondary_id = $competitor2->id;
        }   

        $category = Category::find($request->category_id);

        $registration->save(); 

        Mail::send('registrations.mail.register', compact('category', 'competitor', 'competitor2'), function($message) use ($path1, $path2) {
            $message
                ->to('leomuniz1@hotmail.com', 'Léo Muniz')
                ->subject('Enduro - Novo Cadastro')
                ->attach($path1)
                ->from('maxsam@maxsam.com.br','Formulário de Cadastro - Enduro');

            if($path2 != NULL)
                $message->attach($path2);
        });      
        
        return redirect()->action('RegistrationController@publicIndex')->with('success' ,'Cadastro Efetuado com Sucesso!');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 1;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
