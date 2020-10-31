<div>
    @push('styles')
    <style>
        .clickable {
            cursor: pointer;
        }
    </style>
    @endpush
    @if ( $filters )
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card content-->
                    <div class="card-body">

                        <select class="browser-default custom-select col-2" id="filter_state">
                            <option value="0">Все</option>
                            <option value="1">Актив</option>
                            <option value="2">Блок</option>
                        </select>

                        <select class="browser-default custom-select col-2 display-none" id="filter_city">
                            <option value="0">Город</option>
                            @foreach( \App\Http\Controllers\CityController::getAll() as $city )
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
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
                    <table class="table table-hover text-center">
                        <!-- Table head -->
                        <thead class="blue lighten-4">
                        <tr>
                            <th>#</th>
                            <th>Клиент</th>
                            <th>Кол.</th>
                            <th>Сумма</th>
                            <th>Дата</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody id="drivers_tbody">
                        @foreach( $orders as $order )
                            <tr class="clickable" onclick="window.location='{{route('cpanel.wholesaler.orders.view', $order->id)}}';">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->clientName() }}</td>
                                <td>{{ $order->prodCount() }}</td>
                                <td>{{ $order->totalSumm() }}</td>
                                <td>{{ $order->date() }}</td>
                                <td>
                                    <a href="{{route('cpanel.wholesaler.orders.view', $order->id)}}">
                                        <i class="fas fa-eye blue-text"></i></a> |
                                    <a onclick="del({{ $order->id }})">
                                        <i class="fas fa-trash red-text"></i></a>
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
            $('#filter_state').change(function () {
                livewire.emit('filter', 'state', $(this).val());
            });
        });


        function del(id) {
            $("#modalDelLink").on('click', function () {
                console.log(id + ' del');
                livewire.emit('delete', id);
            });
            $("#delCentralModalSm").modal("show");
        }

    </script>
    @endpush
</div>
