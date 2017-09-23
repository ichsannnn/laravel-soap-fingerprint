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

      // "HTTP\/1.0 200 OK\r\n
      // Server: ZK Web Server\r\n
      // Pragma: no-cache\r\n
      // Cache-control: no-cache\r\n
      // Content-Type: text\/xml\r\n
      // Connection: close\r\n\r\n\r\n\r\n
      // 1<\/PIN>2017-02-08 11:37:35<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>\r\n
      // 2<\/PIN>2017-02-08 13:11:17<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>\r\n
      // 2<\/PIN>2017-02-08 13:11:19<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>\r\n
      // 2<\/PIN>2017-02-08 13:11:21<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>\r\n
      // 1<\/PIN>2017-02-06 16:21:23<\/DateTime>0<\/Verified>4<\/Status>0<\/WorkCode><\/Row>\r\n
      // 1<\/PIN>2017-02-06 16:23:38<\/DateTime>0<\/Verified>2<\/Status>0<\/WorkCode><\/Row>\r\n
      // 11065<\/PIN>2017-02-07 05:43:55<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>\r\n
      // 11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>\r\n
      // 11061<\/PIN>2017-02-07"

      // $data      = $this->_ParseData($buffer[$a], "<Row>", "</Row>");
      // $pin       = $this->_ParseData($data, "<PIN>", "</PIN>");

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
          $soapRequest = "<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">".
                          $Key."</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";
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
          // echo $buffer[a] disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>"
          $data      = $this->_ParseData($buffer[$a], "<Row>", "</Row>");
          // echo $buffer[a] disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>"
          // echo $data disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode>"
          $pin       = $this->_ParseData($data, "<PIN>", "</PIN>");
          // echo $buffer[a] disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>"
          // echo $data disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode>"
          // echo $pin disini, hasilnya: "11078"
          $datetime  = $this->_ParseData($data, "<DateTime>", "</DateTime>");
          // echo $buffer[a] disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>"
          // echo $data disini, hasilnya: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode>"
          // echo $pin disini, hasilnya: "11078"
          // echo $datetime disini, hasilnya: "2017-02-07 06:12:07"
          //
          //
          // pake json encode
          // ini $buffer: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode><\/Row>"
          // ini $data: "11078<\/PIN>2017-02-07 06:12:07<\/DateTime>0<\/Verified>0<\/Status>0<\/WorkCode>"
          // ini $pin: "11078"
          // ini $datetime: "2017-02-07 06:12:07"
          //
          // gapake json encode
          // ini $buffer: 110782017-02-07 06:12:07000
          // ini $data: 110782017-02-07 06:12:07000
          // ini $pin: 11078
          // ini $datetime: 2017-02-07 06:12:07


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
        //Lopping di luar for
        //Langsung ke array $create, hapus UD::insert
         foreach (array_chunk($create, 5) as $key => $chunk_value) {
          //  echo ($key + 1) . '. ';
           foreach ($chunk_value as $value) {
             $absen = new UD;
             $absen->user_id = $value["user_id"];
             $absen->datetime = $value["datetime"];
             $absen->machine_id = $value["machine_id"];
             $absen->created_at = $value["created_at"];
             $absen->save();
            //  echo $value["user_id"] . '<br>';
            // echo json_encode($value) . '<br>';
           }
          //  echo '<br>';
         }
        //  echo count($create) . '<br>';
        // echo "bates per mesin";
        // UD::insert($create);

      }
      //return redirect()->route('index');
    }
}
