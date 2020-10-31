<div>
    @if ( $filters )
        @push('styles')
        <style>
            .display-none {
                display: none;
            }
        </style>
        @endpush

        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card content-->
                    <div class="card-body">

                        <select class="browser-default custom-select col-2" id="filter_city">
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
                            <th>Имя</th>
                            <th>Город</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody id="drivers_tbody">
                        @foreach( $wholesalers as $wholesaler )
                            <tr>
                                <td>{{ $wholesaler->id }}</td>
                                <td>
                                    {{ $wholesaler->name }}
                                    <a href="tel: {{ $wholesaler->phone }}"><i class="fas fa-phone green-text"></i></a>
                                </td>
                                <td>{{ $wholesaler->cityName() }}</td>
                                <td>{{ $wholesaler->stateName($wholesaler->state) }}</td>
                                <td>
                                    <a onclick="add({{$wholesaler->id}})">
                                        <i class="fas fa-plus-square blue-text"></i></a> |
                                    <a href="#">
                                        <i class="fas fa-info-circle blue-text"></i></a>
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

    </div>
    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            $('#filter_city').change(function () {
                livewire.emit('filter', 'city', $(this).val());
            });
        });

        function add(id) {
            livewire.emit('filter', 'city', $(this).val());
        }

    </script>
    @endpush
</div>