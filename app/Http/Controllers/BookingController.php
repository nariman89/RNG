<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Article;
use Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    protected $validation_rules = [
        'name' => 'required|min:2',
		'adress' => 'required|min:2',
		'phone' => 'required|integer',
        'email'=> 'required|email',
        'city'=> 'required|min:1',
		

	];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(){
        //
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
        $booking = new Booking();
        $validData = $request->validate($this->validation_rules);
		$booking->article_id = $validate->article_id;
        $booking->name = $validate['name'];
        $booking->adress = $validate['adress'];
        $booking->city = $validate['city'];
		$booking->email = $validate['email'];
        $booking->phone = $validate['phone'];
        $booking->date_start = $request->date_start;
        $booking->date_end = $request->date_end;
        $booking->save();
	        return redirect('/bookings/bookfinish/' . $booking->id)->with('message', 'Thank you for your booking😎😎😎😎😎!
		Welcome back 😍');;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
		$booking=Booking::all();
        return view('bookings/bookfinish', ['booking' => $booking]);

	}



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

	        return redirect('/bookings/bookfinish' . $booking->id);

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
