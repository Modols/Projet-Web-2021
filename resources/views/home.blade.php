@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card mb-3 rounded-2 border-primary">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{$user->imgPath}}" class="profilePicture" style="width: 250px;" alt="Votre photo de profil">
      </div>
      <div class="col-md-8">
        <div class="card-body rounded-2">
          <div class="card-body rounded-2">
            <h5 class="card-title fs-1 fw-bold text-primary" style="text-shadow: -2px 2px  #1e1e1e;">{{$user->nickname}}</h5>
            <hr>
            <h5 class="text-end fs-3" style="margin-bottom">Crédits: {{$user->credit}} €</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4 ">
      
      <div class="card rounded-2 border-primary">
        <div class="card-body">
          <h5 class="card-title fs-4 text-center text-primary fw-bold">Information personnelles</h5>
          <p class="card-text fs-5">Nom : {{$user->lastName}}</p>
          <p class="card-text fs-5">Prénom : {{$user->firstName}}</p>
          <p class="card-text fs-5">Email : {{$user->email}}</p>
          <p class="card-text fs-5">Date d'anniversaire : {{$user->birthDate}}</p>
          <a class="btn btn-primary text-white fs-6" href="{{ route('admin.users.edit', ['user' => Auth::user()]) }}">
            Modifier le profil
          </a>
        </div>
      </div>
    </div>
    
    <div class="col-sm-8 ">
      <div class="row">
        @foreach ($games as $game)
        <div class="col-sm-4">
          <div class="card " style="width: 15rem;">
            <img src="{{$game->pathImage}}" class="card-img-top" alt="image du jeu">
            <div class="card-body shadow-sm" style="background-color: #333333">
              <h5 class="card-title text-primary fs-4 fw-bold">{{$game->name}}</h5>
              <div class="row justify-content-center mb-3">
                <div class="col-8">
                  <p class="card-text fs-6 fw-light">{{$game->company}}</p>
                </div>
                <div class="col-4">
                  <p class="card-text fs-6 fw-bold">x{{$game->qty}}</p>
                </div>
              </div>
              <a href="{{ route('games.show', ['game' => $game]) }}" class="btn btn-primary text-white mr-2">Plus d'info</a>
              <a href="{{ route('pdf.show', ['myOrder' => $game->myOrder]) }}" class="btn btn-primary text-white">Voir facture</a>
              @if ($user->hasReview($game->id))
              <a href="{{ route('reviews.show', ['review' => $user->getReview($game->id)]) }}" class="btn btn-primary text-white">Voir Avis</a>
              @else
              <a href="{{ route('reviews.create', ['game' => $game]) }}" class="btn btn-primary text-white mt-2">Ajouter Avis</a>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
