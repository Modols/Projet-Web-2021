<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom du Jeu') }}</label>
    
    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $game->name ?? '' }}" required placeholder="League Of Legend" autocomplete="name" autofocus>
        
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>
    
    <div class="col-md-6">
        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $game->price ?? '' }}" required placeholder="80" autocomplete="price" autofocus>
        
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Score') }}</label>
    
    <div class="col-md-6">
        <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $game->score ?? '' }}" required placeholder="17" autocomplete="score" autofocus>
        
        @error('score')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantité') }}</label>
    
    <div class="col-md-6">
        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $game->quantity ?? '' }}" required placeholder="17" autocomplete="quantity" autofocus>
        
        @error('quantity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
    <div class="col-md-6">
        <textarea class="form-control" id="description" rows="3" name="description" required placeholder="Il était une fois...">{{ $game->description ?? '' }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="status" class="col-md-4 col-form-label text-md-right ">Statut</label>
    <div id="status" class="col-md-6">
        <div class="mt-2">
            <input type="radio" name="visible" value="1"
            @if (($game ?? '') && ($game->visible == 1) ) checked @endif>
            <label>Visible</label>
        </div>
        <div class="mt-2">
            <input type="radio" name="visible" value="0" 
            @if (($game ?? '') && ($game->visible == 0) ) checked @endif>
            <label>Caché</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="pathImage" class="col-md-4 col-form-label text-md-right">{{ __('Image du Jeu') }}</label>
    <div class="col-md-6">
        <input id="pathImage" type="file" class="form-control" name="pathImage"
        @if ($update != 'yes') required @endif  >
    </div>
</div>

<div class="form-group row">
    <label for="releaseDate" class="col-md-4 col-form-label text-md-right">{{ __("Date de sortie du jeu") }}</label>
    
    <div class="col-md-6">
        <input id="releaseDate" type="date" class="form-control @error('releaseDate') is-invalid @enderror" name="releaseDate" value="{{ $game->releaseDate ?? '' }}" required autocomplete="releaseDate">
        
        @error('releaseDate')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Editeur du jeu') }}</label>
    
    <div class="col-md-6">
        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ $game->company ?? '' }}" required placeholder="Tencent" autocomplete="company" autofocus>
        
        @error('company')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="pegi" class="col-md-4 col-form-label text-md-right ">Pegi</label>
    <div class="col-md-6">
        <div class="mt-2">
            <select id="pegi" class="custom-select" name="pegi">
                @foreach ($pegi as $int)
                <option @if (($game ?? '') && ($game->pegi == $int)) selected @endif
                    value="{{$int}}">Pegi {{$int}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="genre_id" class="col-md-4 col-form-label text-md-right ">Genre</label>
    <div class="col-md-6">
        <div class="mt-2">
            <select id="genre_id" class="custom-select" name="genre_id">
                @foreach ($genres as $genre)
                <option @if (($game ?? '') && ($game->genre_id == $genre->id)) selected @endif
                    value="{{$genre->id}}">{{$genre->name}} {{$genre->type}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="platform" class="col-md-4 col-form-label text-md-right ">Platforme</label>
    <div class="col-md-6">
        <div class="mt-2">
            <select id="platform" class="custom-select" name="platform">
                <option @if(($game ?? '') && ($game->platform == 'XBOX')) selected @endif value="XBOX">XBOX</option>
                <option @if(($game ?? '') && ($game->platform == 'Playsation 3')) selected @endif value="Playsation 3">Playsation 3</option>
                <option @if(($game ?? '') && ($game->platform == 'Playsation 4')) selected @endif value="Playsation 4">Playsation 4</option>
                <option @if(($game ?? '') && ($game->platform == 'XBOX ONE')) selected @endif value="XBOX ONE">XBOX ONE</option>
                <option @if(($game ?? '') && ($game->platform == 'XBOX 360')) selected @endif value="XBOX 360">XBOX 360</option>
                <option @if(($game ?? '') && ($game->platform == 'Nintendo Wii')) selected @endif value="Nintendo Wii">Nintendo Wii</option>
                <option @if(($game ?? '') && ($game->platform == 'Nintendo Switch')) selected @endif value="Nintendo Switch">Nintendo Switch</option>
                <option @if(($game ?? '') && ($game->platform == 'Playsation 1')) selected @endif value="Playsation 1">Playsation 1</option>
                <option @if(($game ?? '') && ($game->platform == 'PC')) selected @endif value="PC">PC</option>
                <option @if(($game ?? '') && ($game->platform == 'Playsation 2')) selected @endif value="Playsation 2">Playsation 2</option>
            </select>
        </div>
    </div>
</div>