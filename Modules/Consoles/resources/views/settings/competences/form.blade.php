<form action="{{route('consoles.settings.competences.store')}}" method="POST" class="form_load">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$data?$data->id:''}}">
    <div class="form-group">
        <label class="form-label" for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="{{$data?$data->name:''}}">
    </div>


    <div class="form-group">
        <label class="form-label" for="description">Commentaire</label>
        <textarea name="description" class="form-control" id="description" rows="5"> <?=$data? $data->description :''?></textarea>
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn btn-outline-secondary" onclick="$('.modal').modal('hide')">Annuler</button>
</form>
