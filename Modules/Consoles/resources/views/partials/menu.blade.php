@php
    $linkFather = ($routeDef && !empty($routeDef))?$routeDef:'javascript:void(0);';
@endphp



<li class="{{$second_activ}}">
    <a @if(!$routeDef) class="has-arrow" @endif  href="{{$linkFather}}">
        <div class="parent-icon"><i class="<?=$menu['icon']?>"></i>
        </div>
        <div class="menu-title"><?=__($menu['name_full']);?> </div>
    </a>
    @if(isset($menu_module) && $menu_module&& count($menu_module)>0)
    <ul>
            <?php
        foreach ($menu_module as $md) {

            $routeMd = $md["route"]??'javascript:;';
            $params = $md["params"]??'';
            if($routeMd){
                if($params){
                    $routeMd = route($routeMd,$params);
                }else{
                    $routeMd = route($routeMd);
                }
            }
            $permissionMd = $md["permission"]??"";

            ?>
        {{--@if($permissionMd)
            @can($permissionMd)--}}
                @include('consoles::partials.sub-menu')
    {{--        @endcan
        @else
        @endif --}}
            <?php }?>
    </ul>
    @endif
</li>


{{--@endcan--}}
