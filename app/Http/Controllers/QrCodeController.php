<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;
use App\Models\QrCodeToken;
use ParagonIE\ConstantTime\Encoding;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Crypt;

class QrCodeController extends Controller
{
    public function index(Request $req)
    {
        // $start = Carbon::create(2019, 2, 25);

        // $end = Carbon::create(2022, 8, 25);

        // $diff = $start->diffInMonths($end);

        // for($i=0; $i<$diff; $i++){
        //     if($i == 0){
        //         $this->setQrCodeMonthly(date('Y-m-d', strtotime($start)));
        //     }
        //     $date = date('Y-m-d', strtotime($start->addMonth(1)));
        //     $this->setQrCodeMonthly($date);
        // }

        $fromDate = $req->from_date ? Carbon::parse($req->from_date)->format('Y-m-d') : '';
        $toDate = $req->to_date ? Carbon::parse($req->to_date)->format('Y-m-d') : $fromDate;
        $qrcodes = QrCodeToken::whereRestaurantId(Auth::user()->restaurant_id);
        if ($req->from_date && $req->to_date) {
            $qrcodes = $qrcodes->whereDate('start_date','>=',$fromDate)->whereDate('end_date','<=',$toDate);
        }elseif($req->from_date && !$req->to_date){
            $qrcodes = $qrcodes->whereDate('start_date','<=',$fromDate)->whereDate('end_date','>=',$fromDate);
        }
        $qrcodes = $qrcodes->paginate(10);
        $qrcodexml = [];
        foreach($qrcodes as $key=>$qr){
            $qr->status = '';
            if (Carbon::parse($qr['start_date'])->format('Y-m-d') <= Carbon::now()->format('Y-m-d') && Carbon::parse($qr['end_date'])->format('Y-m-d') >= Carbon::now()->format('Y-m-d')) {
               $qr->status = 'Ongoing';
            }else if(Carbon::parse($qr['start_date'])->format('Y-m-d') >= Carbon::now()->format('Y-m-d')){
                $qr->status = 'Upcoming';
            }else if(Carbon::parse($qr['end_date'])->format('Y-m-d') <= Carbon::now()->format('Y-m-d')){
                $qr->status = 'Expired';
            }
            $qr->start_date = Carbon::parse($qr['start_date'])->format('d, M Y');
            $qr->end_date = Carbon::parse($qr['end_date'])->format('d, M Y');

            $qrcodexml[$qr->id] = QrCode::size(50)->generate(url('/').'/?qrcode='.$qr->token)->toHtml();
        }

        return response()->json(['qrcodes' => $qrcodes , 'qrcodexml' => $qrcodexml]);
    }

    public function setqrCodeGenerate(Request $req)
    {
        $start = Carbon::create($req->start_qrcode);

        $end = Carbon::create($req->end_qrcode);

        $diff = $start->diffInMonths($end);

        $exsitsData = 0;

        for($i=0; $i<=$diff; $i++){
            if($i == 0){
                $date = date('Y-m-d', strtotime($start));
            }else{
                $date = date('Y-m-d', strtotime($start->addMonth(1)));
            }
            $qrcode = QrCodeToken::whereDate('start_date',$date)->doesntExist();
            if ($qrcode) {
                $this->setQrCodeMonthly($date);
                $exsitsData = 1;
            }
        }

        if($exsitsData == 0){
            return response()->json(['error' => 'Qr Code already added.']);
        }

        return response()->json(['success' => 'Qr Code added successfully.']);
    }

    public function setQrCodeMonthly($date)
    {
        if(Carbon::parse($date)->daysInMonth == '31') $duration = [8,8,8,7];
        else if(Carbon::parse($date)->daysInMonth == '30') $duration = [8,8,7,7];
        else if(Carbon::parse($date)->daysInMonth == '29') $duration = [8,7,7,7];
        else $duration = [7,7,7,7];

        foreach($duration as $key=>$dur){

            $cal_of_start = 0;
            if($key != 0) $cal_of_start = $key * $duration[$key - 1];
            $startDate = Carbon::parse($date)->startOfMonth()->addDays($cal_of_start);
            $startDuration = Carbon::parse($date)->startOfMonth()->addDays($cal_of_start);
            $cal_of_end = ($key + 1) * $dur - 1;
            $endDuration = $startDate->addDays($dur - 1);
            $data = random_bytes(32);
            $encode = Encoding::base64Encode($data);
            $qr = new QrCodeToken();
            $qr->start_date = date('Y-m-d', strtotime($startDuration));
            $qr->end_date = date('Y-m-d', strtotime($endDuration));
            $qr->restaurant_id = Auth::user()->restaurant_id;
            $qr->token = str_replace("+", "0", $encode);
            $qr->save();
        }
    }
    public function deleteQrCode(Request $req)
    {
        QrCodeToken::where('id', $req->id)->delete();

        return response()->json(['success' => 'Qr Code deleted successfully.']);
    }
    public function qrCodereGenerate(Request $req)
    {
        $qrcode = QrCodeToken::find($req->id);
        $data = random_bytes(32);
        $encode = Encoding::base64Encode($data);
        $qrcode->update(['token'=>str_replace("+", "0", $encode)]);
        return response()->json(['success' => 'Qr Code Regenerated successfully.']);
    }
    public function qrCodereDownload($id)
    {
        $qrcode = QrCodeToken::find($id);

        $qrCode = base64_encode(QrCode::size(150)->generate(url('/').'/?qrcode='.$qrcode->token));

        $pdf = PDF::loadView('qrcode', compact('qrCode'));

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return $pdf->download('qrcode.pdf');
    }

    public function checkQrcodeExists(Request $request)
    {
        $qrToken = $request->qrToken;

        $date = Carbon::now()->format('Y-m-d');

        $qrcode = QrCodeToken::whereToken($qrToken)->whereDate('start_date', '<=', $date)->whereDate('end_date', '>=', $date)->exists();

        return response()->json(['qrcode_exist' => $qrcode]);
    }
}
