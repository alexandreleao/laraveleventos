<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        
    $search = request('search');

    if($search){
        $events = Event::where([
            ['title', 'like', '%' .$search. '%']
        ])->get();
    } else {
        $events = Event::all(); 
    }

     return view('welcome',['events' => $events, 'search' =>$search]); 
    }

    public function create()
    {
        return view('events.create');
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasuserjoined = false;

        if($user){

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasuserjoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasuserjoined' => $hasuserjoined ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'date'=>'required',
            'city'=> 'required',
            'private'=>'required',
            'description'=> 'required',
            'items' => 'required'
        ]);

        if($validator->fails()){
            return redirect('events/create')->withErrors($validator)->withInput();
        }
      
       $event = new Event;
    
       $event->title = $request->title;
       $event->date = $request->date;
       $event->city = $request->city;
       $event->private = $request->private;
       $event->description = $request->description;
       $event->items = $request->items;

       //Image Upload
       if($request->hasFile('image') && $request->file('image')->isValid()){
          
           $requestImage = $request->image;
           
           $extension = $requestImage->extension();

           $imageName = md5($requestImage->getClientOriginalExtension(). strtotime("now")). "." . $extension;

           $requestImage->move(public_path('img/events'), $imageName);

           $event->image = $imageName;
        
       }

       $user = auth()->user();
       $event->user_id = $user->id;

       $event->save();
      
       return redirect('/')
       ->with( 'msg ', ' Evento criado com sucesso! '); 
       
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', 

        ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]);
    }
        
        public function destroy($id)
        {      
            try {
                Event::findOrFail($id)->delete();
                return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
            } catch (\Exception $e) {
                return redirect()->back()->with( $e->getMessage(). 'Não foi possível deletar o evento com os participantes!');
            }
        }

        public function edit($id)
        {
            $user = auth()->user();

            $event = Event::findOrFail($id);

            if($user->id != $event->user_id){
                return redirect('/dashboard');
            }

            return view('events.edit', ['event'=> $event]);
        }

        public function update(Request $request,$id)
        {
            $data = $request->all();

            if($request->hasFile('image') && $request->file('image')->isValid()){
            
                $requestImage = $request->image;
                
                $extension = $requestImage->extension();
    
                $imageName = md5($requestImage->getClientOriginalExtension(). strtotime("now")). "." . $extension;
    
                $requestImage->move(public_path('img/events'), $imageName);
    
                $data['image'] = $imageName;
            
            }

            Event::findOrFail($id)->update($data);

            return redirect('/dashboard')->with('msg',  'Evento Editado com sucesso!');

            }


            public function joinEvent($id)
            {
                $user = auth()->user();

                $user->eventsAsParticipant()->attach($id);

                $event = Event::findOrFail($id);

                return redirect('/dashboard')
                ->with('msg', 'Sua presença está confirmada no evento' . $event->title);
            }


            public function leaveEvent($id)
            {
                $user = auth()->user();

                $user->eventsAsParticipant()->detach($id);

                $event = Event::findOrFail($id);

                return redirect('/dashboard')
                ->with('msg', 'Você saiu com sucesso do evento:' . $event->title);
            }
}
