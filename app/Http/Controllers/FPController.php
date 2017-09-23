<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\FingerprintMachine as FP;

class FPController extends Controller
{
    public function index()
    {
      $fp = FP::orderBy('ip')->paginate(10);
      return view('fp.index', ['data' => $fp]);
    }

    public function create()
    {
      return view('fp.create');
    }

    public function store(Request $r)
    {
      $fp = new FP;
      $fp->ip = $r->input('ip');
      $fp->comkey = $r->input('comkey');
      // $fp->port = $r->input('port');
      $fp->save();
      return redirect()->route('fingerprint_index');
    }

    public function edit($id)
    {
      $mesin = FP::find($id);
      return view('fp.edit', ['data' => $mesin]);
    }

    public function update(Request $r)
    {
      $id = $r->input('id');
      $fp = FP::find($id);
      $fp->ip = $r->input('ip');
      $fp->comkey = $r->input('comkey');
      // $fp->port = $r->input('port');
      $fp->save();
      return redirect()->route('fingerprint_index');
    }

    public function delete($id)
    {
      FP::find($id)->delete();
      return redirect()->route('fingerprint_index');
    }
}
