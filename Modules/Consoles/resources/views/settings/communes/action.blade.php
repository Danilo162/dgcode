
{{--<button data-toggle="tooltip" data-placement="top"   onclick="launchDetailRole('{{$rs->id}}','{{$rs->name}}')" type="button" title="Voir les communes" class=" me-4 btn btn-primary small btn-sm hvr-pulse-grow"><i class="fa fa-arrow-right"></i></button>

<button data-toggle="tooltip" data-placement="top"   onclick="loadModal('{{route('settings.role.form')}}','{{json_encode(["id"=>$rs->id])}}','FORMULAIRE DE RÔLE')" type="button" title="Modifier" class=" me-4 btn btn-success small btn-sm hvr-pulse-grow"><i class="fa fa-edit"></i></button>
@if($rs->total==0)
<button data-toggle="tooltip" data-placement="top"  onclick="deleteAllShowConfirme('{{route('settings.role.destroy')}}','{{$rs->id}}',launchReloadDataTable);" type="button" title="Supprimer"  class=" me-4 btn btn-danger small btn-sm hvr-pulse-grow"><i class="fa fa-remove"></i></button>
@endif--}}

<div class="dropdown">
    <div class="cursor-pointer text-dark  dropdown-toggle dropdown-toggle-nocaret"
    data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical-rounded  font-18"></i>
    </div>
    <div class="dropdown-menu">
      {{--  <a class="dropdown-item"   href="{{route('settings.communes.assignations',['id'=>$rs->id])}}"
        ><i class="bx bx-arrow-to-right me-1 text-primary"></i> Gerer ses communes</a
        >--}}
        <a class="dropdown-item" onclick="loadModal('{{route('settings.communes.form')}}','{{json_encode(["id"=>$rs->id])}}','FORMULAIRE DE communes')"  href="javascript:void(0);"
        ><i class="bx bx-edit-alt me-1 text-success"></i> Modifier</a
        >
        @if($rs->total==0)
            <a class="dropdown-item"
               onclick="deleteAllShowConfirme('{{route('settings.communes.destroy')}}','{{$rs->id}}',launchReloadDataTable);" href="javascript:void(0);"
            ><i class="bx bx-trash me-1 text-danger"></i> Supprimer</a
            >
        @endif
    </div>
</div>

{{--
<div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item"   href="javascript:void(0);"
        ><i class="bx bx-arrow-to-right me-1 text-primary"></i> Voir les communes</a
        >
        <a class="dropdown-item"  href="javascript:void(0);"
        ><i class="bx bx-edit-alt me-1 text-success"></i> Modifier</a
        >
        @if($rs->total==0)
        <a class="dropdown-item"
            href="javascript:void(0);"
        ><i class="bx bx-trash me-1 text-danger"></i> Delete</a
        >
        @endif
    </div>
</div>
--}}
