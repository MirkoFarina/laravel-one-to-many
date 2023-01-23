<div class="pt-5" id="nav-aside">
    <ul class="m-0 list-unstyled">
        <li class="ps-3 secondary-color">
               USER: {{ Auth::user()->name }}
        </li>
        <li class="ps-3">
            <a href=" {{ route('admin.dashboard') }} "
                class=" {{ Route::CurrentRouteName() === 'admin.dashboard' ? 'active' : '' }} ">
                <i class="fa-solid fa-chart-simple"></i> DASHBOARD
            </a>
        </li>
        <li class="ps-3 secondary-color" >
            <i class="fa-solid fa-table"></i> TABLE :
            <ul class="list-unstyled">
                <li class="ps-3">
                    <a href=" {{ route('admin.project.index') }} "
                        class="  {{ Route::CurrentRouteName() === 'admin.project.index' || Route::CurrentRouteName() === 'admin.project.create' || Route::CurrentRouteName() === 'admin.project.edit' || Route::CurrentRouteName() === 'admin.project.show' || Route::CurrentRouteName() === 'admin.project.groupby' ? 'active' : '' }} ">
                        <i class="fa-solid fa-chart-simple"></i> PROJECTS
                    </a>
                    <ul class="list-unstyled">
                        <li class="ps-3">
                            <a class="{{Route::CurrentRouteName() === 'admin.project.create' ? 'active' : ''}}" href=" {{ route('admin.project.create') }} ">
                                <i class="fa-solid fa-plus"></i>
                                NUOVO
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="ps-3">
                    <a href=" {{ route('admin.type.index') }} ">
                        <i class="fa-solid fa-layer-group"></i>
                        TYPES
                    </a>
                </li>
            </ul>
        </li>
        <li class="ps-3">
            <a class="{{ Route::CurrentRouteName() === 'admin.projects.projects-type' ? 'active' : '' }}" href=" {{route('admin.projects.projects-type')}} ">
                <i class="fa-solid fa-table-list"></i>
                LISTA PER TIPO
            </a>
        </li>
    </ul>
</div>
