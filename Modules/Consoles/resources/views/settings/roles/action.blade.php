<div class="dropdown">
    <div class="cursor-pointer text-dark  dropdown-toggle dropdown-toggle-nocaret"
    data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical-rounded  font-18"></i>
    </div>
    <div class="dropdown-menu">
        <a class="dropdown-item"   href="{{route('consoles.settings.roles.assignations',['id'=>$rs->id])}}"
        ><i class="bx bx-arrow-to-right me-1 text-primary"></i> Gerer ses permissions</a
        >
        <a class="dropdown-item" onclick="loadModal('{{route('consoles.settings.roles.form')}}','{{json_encode(["id"=>$rs->id])}}','FORMULAIRE DE ROLE')"  href="javascript:void(0);"
        ><i class="bx bx-edit-alt me-1 text-success"></i> Modifier</a
        >
        @if($rs->total==0)
            <a class="dropdown-item"
               onclick="deleteAllShowConfirme('{{route('consoles.settings.roles.destroy')}}','{{$rs->id}}',launchReloadDataTable);" href="javascript:void(0);"
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
        ><i class="bx bx-arrow-to-right me-1 text-primary"></i> Voir les permissions</a
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
