<link rel="stylesheet" href="{{asset('manages/assets/plugins/select2/select2-v4_1/select2-bootstrap-5-theme.min.css')}}">
<link rel="stylesheet" href="{{asset('manages/assets/plugins/select2/select2-v4_1/select2-bootstrap-5-theme.rtl.min.css')}}">
<link rel="stylesheet" href="{{asset('manages/assets/plugins/select2/select2.min.css')}}">
<form action="{{route('consoles.settings.categoriementors.store')}}" method="POST" class="form_load">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$data?$data->id:''}}">
    <div class="form-group">
        <label class="form-label" for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="{{$data?$data->name:''}}">
    </div>
    <div class="form-group">
        <label class="form-label" for="competences">Compétences</label>
        <select name="competences[]" id="competences" multiple class="form-control">
            @foreach(getCompetences() as $comp)
                <option value="{{ $comp->id }}"
                        @if(isset($allCompetences) && in_array($comp->id, $allCompetences)) selected @endif>
                    {{ $comp->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="description">Commentaire</label>
        <textarea name="description" class="form-control" id="description" rows="5"> {!!$data? $data->description :''!!}</textarea>
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn btn-outline-secondary" onclick="$('.modal').modal('hide')">Annuler</button>
</form>
<script src="{{asset('manages/assets/plugins/select2/select2-v4_1/select2.full.min.js')}}" defer></script>
<script>
    $(document).ready(function() {
        $('#competences').select2({
          /*  theme: 'bootstrap-5',*/
            dropdownParent: $('#modalAll'),
            placeholder: "Sélectionner...",
            allowClear: true
        });
    });
</script>
