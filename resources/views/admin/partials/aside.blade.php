<div class="pt-5" id="nav-aside">
    <ul class="m-0 list-unstyled">
        <li class="ps-3">
            <a href="#">
                {{ Auth::user()->name }} :
            </a>
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
            </ul>
        </li>
    </ul>
</div>
