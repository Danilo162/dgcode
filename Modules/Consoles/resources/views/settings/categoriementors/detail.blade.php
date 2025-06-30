
<h4> {{$data->name}}</h4>
<p> {!! f_TextToHtml($data->description) !!} </p>


<div class="row">
    <div class="col-lg-12">
        <h6>Compétences associées</h6>
        <ul>
            @foreach($allCompences as $compence)
                <li>{{$compence->name}}</li>
            @endforeach
        </ul>
    </div>
</div>
