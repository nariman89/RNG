<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Article;
use Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {

    // $articles=Article::all();
	// return redirect('/layouts/showDetail', compact( $article->id));


	// }
	public function index()
    {
      $bookings=Booking::select('booking_id','name', 'email', 'date_start', 'date_end' );
        return view('/layouts/bookfinish', ['bookings' => $bookings]);  //

	}
	public function show(){
          $bookings =Booking::all();
        return view ('layouts/bookfinish', compact('$bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
    $monthly_email_date = Carbon::now()->startOfMonth();
		$booking = new Booking();
		 $booking->article_id = $request->article_id;
       $booking->name = $request->name;

       $booking->adress = $request->adress;
       $booking->city_name = $request->city_name;

		$booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date_start = $request->date_start;
        $booking->date_end = $request->date_end;
        $booking->save();

		return redirect()->back()->with('message', 'Thank you for your booking😎😎😎😎😎!
		Welcome back 😍');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    // public function show(Booking $booking)
    // {
	// 	$booking=Booking::all();
    //     return view('projects/myarticles', ['booking' => $booking]);

	// }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {

        $booking->name = $request->name;
        $booking->email = $request->email;
		$booking->phone = $request->phone;
		$booking->date_start = $request->date_start;
        $booking->date_end = $request->date_end;

        $booking->save();

	        return redirect('/layouts/bookfinish' . $booking->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
	}

}
