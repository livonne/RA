<?php

namespace App\Http\Controllers;

use App\Models\Cuarto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * Class CuartoController
 * @package App\Http\Controllers
 */
class CuartoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['listaAPI', 'loginAPI']]);
    }

    public function index()
    {
        $cuartos = Cuarto::paginate();

        return view('cuarto.index', compact('cuartos'))
            ->with('i', (request()->input('page', 1) - 1) * $cuartos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuarto = new Cuarto();
        return view('cuarto.create', compact('cuarto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cuarto::$rules);

        $cuarto = Cuarto::create($request->all());

        return redirect()->route('cuartos.index')
            ->with('success', 'Cuarto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuarto = Cuarto::find($id);

        return view('cuarto.show', compact('cuarto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuarto = Cuarto::find($id);

        return view('cuarto.edit', compact('cuarto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cuarto $cuarto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuarto $cuarto)
    {
        request()->validate(Cuarto::$rules);

        $cuarto->update($request->all());

        return redirect()->route('cuartos.index')
            ->with('success', 'Cuarto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuarto = Cuarto::find($id)->delete();

        return redirect()->route('cuartos.index')
            ->with('success', 'Cuarto deleted successfully');
    }

    public function listaAPI(Request $request){
        if($request->user()!=null){
        $cuarto = Cuarto::all();
        return $cuarto;
    }
    return "Debes registrate";
    }

    public function loginAPI(Request $request){
        if( Auth::guard('web2')->attempt(['id' => $request->input('u'), 'password' => $request->input('p')]) ){
            $token = Str::random(60);
            Auth::guard('web2')->user()->forceFill(['api_token' => hash('sha256', $token)])->save();
            return '{"respuesta": "Usuario aceptado","cliente":'. Auth::guard('web2')->user() .' ,"token":"'. $token .'"}';
        }
        return '{"respuesta": "usuario no valido"}';
    }
}
