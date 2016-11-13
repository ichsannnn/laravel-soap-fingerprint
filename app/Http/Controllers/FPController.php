<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\FingerprintMachine as FP;

class FPController extends Controller
{
    public function getView()
    {
      return view('fp.index');
    }

    public function postFP(Request $r)
    {
      $fp = new FP;
      $fp->ip = $r->input('machine_ip');
      $fp->comkey = $r->input('machine_com');

      $fp->save();
      return redirect(url('setting/fingerprint'));
    }
}
