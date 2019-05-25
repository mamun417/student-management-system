<?php

namespace App\Http\Controllers;

use App\AllClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $class = AllClass::latest()->get();
        return view('class.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes',
        ]);

        $create = AllClass::create($request->all());

        if ($create){
            return redirect(route('class.index'))->with('success', 'Class create successfully');
        }
        return back()->with('warning', 'Class could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AllClass $class
     * @return Response
     */
    public function edit(AllClass $class)
    {
        return view('class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AllClass $class
     * @return void
     */
    public function update(Request $request, AllClass $class)
    {
        $request->validate([
            'name' => 'required|unique:classes,name,'. $class->id,
        ]);

        $update = $class->update($request->all());

        if ($update){
            return redirect(route('class.index'))->with('success', 'Class update successfully');
        }
        return back()->with('warning', 'Class could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AllClass $class
     * @return Response
     * @throws \Exception
     */
    public function destroy(AllClass $class)
    {
        return 'fd';


        if ($class->delete()){
            return back()->with('success', 'Class delete successfully');
        }
        return back()->with('warning', 'Class could not be delete');
    }
}
