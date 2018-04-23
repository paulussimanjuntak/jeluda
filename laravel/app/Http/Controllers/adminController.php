<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use Charts;
use App\Models\Posting;
use App\Models\Comment;
use App\Models\User;
use App\Jobs\SendNotifJobs;    
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard(){
        $posting = Posting::with('kabupaten.provinsi','comment')->get(); 
        $comment = Comment::with('posting.kabupaten.provinsi','user')->get();
        $belum = Posting::all()->where('status','=','0');
        $user = User::withCount('comment','posting')->get();
        $sudah = Posting::all()->where('status','=','1');
        $chart = Charts::database(Posting::all(), 'bar', 'highcharts')
        ->title("Grafik Kiriman Budaya")
    	->elementLabel("Total")
        ->groupByMonth();
	
        return view('jelajah.admin',compact('posting','comment','belum','user','sudah','chart')); 
    }
    public function konfirmasi($id){
        $posting = Posting::findOrFail($id);
        $posting->status = 1;
        $posting->save();
        SendNotifJobs::dispatch($posting);
        Alert::success('posting berhasil di konfirmasi');
        return redirect('/admin');
    }
}
