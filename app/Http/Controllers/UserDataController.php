<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FingerprintMachine as FP;
use App\UserData as UD;

class UserDataController extends Controller
{
    public function __construct()
    {
      ini_set('max_execution_time', 0);
    }

    public function _ParseData($data, $p1, $p2)
    {
      $data = " ".$data;
      $hasil = "";
      $awal = strpos($data, $p1);
      if ($awal != "") {
        $akhir = strpos(strstr($data, $p1), $p2);
        if ($akhir != "") {
          $hasil = substr($data, $awal + strlen($p1), $akhir - strlen($p1));
        } else {
          return "akhir kosong";
        }
      }

      return $hasil;
    }

    public function _checkExists($pin, $datetime)
    {
      $userData = UD::where('user_id', $pin)->where('datetime', $datetime)->get();
      return $userData;
    }

    public function index()
    {
      $absensi = UD::orderBy('created_at')->paginate(10);
      return view('user.index', ['data' => $absensi]);
    }

    public function sinkronisasi()
    {
      $fp = FP::where('status', 1)->orderBy('ip')->get();

      if (count($fp) == 0) {
        return "tidak ada mesin absensi!";
      }

      foreach ($fp as $key => $value) {
        $IP = $value->ip;
        $Key = $value->comkey;
        // $Port = $value->port;

        if ($IP == "") {
          $IP = $value->ip;
        }
        if ($Key == "") {
          $Key = $value->comkey;
        }
        // if ($Port == "") {
        //   $Key = $value->port;
        // }

        $connect = @fsockopen($IP, '80', $errno, $errstr, 1);
        // $connect = @fsockopen($IP, $Port, $errno, $errstr, 1);
        if($connect) {
          $soapRequest = "<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";
          $newLine = "\r\n";
          fputs($connect, "POST /iWsService HTTP/1.0".$newLine);
          fputs($connect, "Content-Type: text/xml".$newLine);
          fputs($connect, "Content-Length: ".strlen($soapRequest).$newLine.$newLine);
          fputs($connect, $soapRequest.$newLine);
          $buffer = "";
          while ($response = fgets($connect, 1024)) {
            $buffer = $buffer.$response;
          }
        } else {
          return "Koneksi Gagal";
        }

        $buffer = $this->_ParseData($buffer, "<GetAttLogResponse>", "</GetAttLogResponse>");
        $buffer = explode("\r\n", $buffer);

        $create = [];
        for ($a=1; $a < count($buffer); $a++) {
          $data      = $this->_ParseData($buffer[$a], "<Row>", "</Row>");
          $pin       = $this->_ParseData($data, "<PIN>", "</PIN>");
          $datetime  = $this->_ParseData($data, "<DateTime>", "</DateTime>");

          if ($data != "") {
            if (!count($this->_checkExists($pin, $datetime)) > 0) {
              $create[] = [
                'user_id' => $pin,
                'datetime' => $datetime,
                'machine_id' => $value->id,
                'created_at' => $datetime
              ];
            }
          }
        }

        UD::insert($create);
      }
      return redirect()->route('index');
    }
}
