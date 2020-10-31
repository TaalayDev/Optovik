<div>
    @section('search-form')
        @include('includes.search-form')
    @endsection
    @if ( $filters )
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card content-->
                    <div class="card-body">
                        <select class="browser-default custom-select col-2" id="filter_role">
                            <option value="all">Все</option>
                            <option value="admin">Админстратор</option>
                            <option value="wholesaler">Оптовик</option>
                            <option value="store">Магазин</option>
                            <option value="user">Другие</option>
                        </select>
                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

        </div>
    @endif

    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">

                <!--Card content-->
                <div class="card-body">

                    <!-- Table  -->
                    <table class="table table-hover">
                        <!-- Table head -->
                        <thead class="blue lighten-4">
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Роль</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody id="drivers_tbody">
                        @foreach( $users as $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roleName($user->role) }}</td>
                                <td>{{ $user->stateName($user->state) }}</td>
                                <td>
                                    <a onclick="del({{$user->id}})">
                                        <i class="fas fa-trash text-blue"></i></a> |
                                    <a href="{{ route('console.users.update', $user->id) }}">
                                        <i class="fas fa-pencil-alt text-blue"></i></a> |
                                    <a href="#">
                                        <i class="fas fa-info-circle text-blue"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <!-- Table body -->
                    </table>
                    <!-- Table  -->

                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->
    @push('modals')
    <!-- Delete Central Modal Small -->
        <div class="modal fade" id="delCentralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-sm" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Удалить?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Вы действительно хотите это удалить?
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</a>
                        <a id="modalDelLink" class="btn btn-primary btn-sm" data-dismiss="modal">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Central Modal Small -->
        @endpush
    </div>
    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            $('#filter_role').change(function () {
                livewire.emit('filter', 'role', $(this).val());
            });
        });

        function del(id)
        {
            $("#modalDelLink").on('click', function () {
                console.log(id + ' del');
                livewire.emit('delete', id);
            });
            $("#delCentralModalSm").modal("show");
        }

    </script>
    @endpush
</div>
