<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {

     $events = Event::paginate(5); 

     return view('welcome',['events' => $events]); 
    }

    public function create()
    {
        return view('events.create');
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }


    public function store(Request $request)
    {
       $event = new Event;

       $event->title = $request->title;
       $event->city = $request->city;
       $event->private = $request->private;
       $event->description = $request->description;

       //Image Upload
       if($request->hasFile('image') && $request->file('image')->isValid()){
          
           $requestImage = $request->image;
           
           $extension = $requestImage->extension();

           $imageName = md5($requestImage->getClientOriginalExtension(). strtotime("now")). "." . $extension;

           $requestImage->move(public_path('img/events'), $imageName);

           $event->image = $imageName;
        
       }

       $event->save();
      
       return redirect('/')->with('msg', 'Evento criado com sucesso!'); 
       
    }

   
}
