<form action="{{route('consoles.settings.permissions.store')}}" method="POST" class="form_load">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$data?$data->id:''}}">
    <div class="form-group">
        <label class="form-label" for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="{{$data?$data->name:''}}">
    </div>
    <div class="form-group">
        <label class="form-label" for="nom">Commentaire</label>
        <textarea name="comment" class="form-control" id="comment" rows="3">{{$data?$data->comment:''}}</textarea>
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn btn-outline-secondary" onclick="$('.modal').modal('hide')">Annuler</button>
</form>
