<input type="hidden" name="role_id" value="{{$data->id}}">
<div class="row">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-6">
                <div class="bg-secondary-subtle" style="padding: 8px">
                    <span  style="padding: 8px;background: white;font-size: 18px"> {{$data->name}}</span> | <span class="bg-secondary-subtle"> Permissions assignées: {{count($permissionsByRoles)}}/{{count($permissions)}}</span>
                </div>
            </div>
            <div class="col-4">
                   <span class="form-check">
                <input class="form-check-input" type="checkbox" id="checkAll">
                <label class="form-check-label" for="checkAll">TOUT COCHER</label>
            </span>
            </div>
        </div>
    </div>

</div>
<br>
<br>
<div class="card">
<div class="card-body">
    <div class="row g-2"> <!-- g-2 réduit l'espacement horizontal et vertical entre les colonnes -->
        @foreach($permissions as $perm)
            <div class="col-md-3 col-sm-6 col-12"> <!-- 3 colonnes sur écran moyen, 2 sur petit, 1 sur très petit -->
                <div class="form-check" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{$perm->comment}}">
                    <input  style="cursor: pointer" class="form-check-input permission-checkbox" value="{{$perm->id}}" name="permission[]" type="checkbox" id="permission_{{$perm->id}}" @if(in_array($perm->id, $permissionsByRoles)) checked @endif>
                    <label style="cursor: pointer" class="form-check-label" for="permission_{{$perm->id}}">{{$perm->name}}</label>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>

<br>
<div class="ms-auto">
    <button  class="btn btn-success btn-sm"> <i class="bx bx-save"></i> Enregistrer</button>
</div>

<script>
    $(function () {
        $('[data-bs-toggle="popover"]').popover();
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
    document.getElementById('checkAll').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        let allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        // Si toutes les cases sont cochées, les décocher. Sinon, les cocher.
        checkboxes.forEach(checkbox => {
            checkbox.checked = !allChecked;
        });

        // Modifier le texte du bouton en fonction de l'état des cases
      //  this.textContent = allChecked ? 'Tout cocher' : 'Tout décocher';
    });
</script>
