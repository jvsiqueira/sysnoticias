<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Noticia;
use PHPUnit\Framework\TestStatus\Notice;

class NoticiaController extends Controller
{
    public function list()
    {
        $search = request('procurar');

        $user = auth()->user();
        //$user->noticiasUser();

        if ($search) {
            # code...
            $noticias = Noticia::where([
                ['user_id', '=', $user->id],
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $noticias = Noticia::where([
                ['user_id', '=', $user->id]
            ])->get();
        }


        // $noticias = Noticia::all();

        return view('noticias.list', ['noticias' => $noticias, 'search' => $search]);
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function save(Request $request)
    {
        $noticia  = new Noticia();

        $user = auth()->user();

        $noticia->title = $request->title;
        $noticia->description = $request->description;
        $noticia->user_id = $user->id;
        $noticia->status = $request->status;

        if ($request->status != 1) {
            $noticia->status = 0;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/noticias'), $imageName);

            $noticia->image = $imageName;
        }

        $noticia->save();

        return redirect('/noticias')->with('msgA', 1);
    }

    public function edit($id)
    {
        $user = auth()->user();

        $noticia = Noticia::findOrFail($id);

        if ($user->id != $noticia->user->id) {
            return redirect('/noticias.list');
        }

        return view('/noticias.edit', ['noticia' => $noticia]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/noticias'), $imageName);

            $data['image'] = $imageName;
        }

        Noticia::findOrFail($request->id)->update($data);

        return redirect('/noticias')->with('msgA', 3);
    }

    public function destroy($id)
    {
        Noticia::findOrFail($id)->delete();

        return redirect('/noticias')->with('msgA', 2);
    }
}
