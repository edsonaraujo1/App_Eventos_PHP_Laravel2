<?php

namespace App\Http\Controllers;

use Image;
use File;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }else{

            $events = Event::all();

        }

        return view('welcome',
            ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {

        $altura = "200";
	    $largura = "300";

        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $request->image->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $img = \Image::make($requestImage);
            $img->resize(298, 169)->save(public_path('img/events/'.$imageName));
            $event->image = $imageName;

            $manager = new ImageManager(array('driver' => 'GD'));

            // Lendo Imagem
            $imagetxt = $manager->make(public_path('img/events/'.$imageName));

            $imagetxt->insert(public_path('img/watermark.png'), 'bottom-right', 10, 10);

            $imagetxt->save(public_path('img/events/'.$imageName));

            // $imagetxt->text('O topo do mundo',200,10, function($font) {

            //     $font->size(20); //defininindo o tamanho como 20
             
            //     $font->color('#ffffff'); //definindo a cor como branco
             
            //     $font->align('right'); //definindo o alinhamento como centralizado
             
            //  })->save(public_path('img/events/'.$imageName)); //salvando como image3.png

        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id) {

        // Pegar usuario logado
        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {
            $userEvents = $user->eventsAsParticipant->toArray();
            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined  = true;
                }
            }
        }

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard() {

        // Pegar usuario logado
        $user = auth()->user();

        $hasUserJoined = "Não Logado";

        if($user) {
            
            $hasUserJoined = $user->name;
        }
        
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', 
            ['events' => $events,
             'eventsasparticipant' => $eventsAsParticipant,
             'hasuserjoined' => $hasUserJoined]
            );
    }

    public function destroy($id) {

        // Pegar usuario logado
        $user = auth()->user();

        $event = Event::findOrFail($id);
        // Exclui as Imagens do Eventos
        $image_path = public_path('img/events/'.$event->image);

        if(file_exists($image_path)){
            File::delete( $image_path);
        }

        $event->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit($id) {

        // Pegar usuario logado
        $user = auth()->user();

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        // if($user->id != $event->user->user_id){

        //     return redirect('/dashboard');
        // }

        return view('events.edit', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function update(Request $request) {
        
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $request->image->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $img = \Image::make($requestImage);
            $img->resize(298, 169)->save(public_path('img/events/'.$imageName));
            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);

        // Pegar usuario logado
        $user = auth()->user();

        return redirect('/dashboard')->with('msg', 'Evento Alterado com sucesso!');
    }

    public function joinEvent($id) {

        // Pegar usuario logado
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function leaveEvent($id){

        // Pegar usuario logado
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $event->title);
    }
}
