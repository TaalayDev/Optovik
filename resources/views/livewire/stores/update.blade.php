<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

            <!--Card content-->
            <div class="card-body">

                <form method="post" action="{{route('stores.update.request', $sid)}}" class="text-center border border-light p-5">
                    <!--Body-->
                    <div class="modal-body">
                    {{ csrf_field() }}

                    <!-- Name -->
                        <input type="text" class="form-control mb-4"
                               name="name" placeholder="Название" maxlength="20" value="{{$store->name}}">

                        <!-- Info -->
                        <textarea class="form-control mb-4" name="info" placeholder="Описание" maxlength="191">{{$store->info}}</textarea>

                        <!-- Phone -->
                        <input type="phone" class="form-control mb-4"
                               name="phone" placeholder="Телефон" value="{{$store->phone}}">

                        <!-- Phone -->
                        <input type="text" class="form-control mb-4"
                               name="address" placeholder="Адрес" value="{{$store->address}}">

                        <!-- City -->
                        <select class="form-control mb-4" name="city">
                            @foreach( \App\Http\Controllers\CityController::getAll() as $city )
                                <option value="{{ $city->id }}"
                                        @if ( $city->id == $store->city ) selected @endif>{{ $city->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <!-- Send button -->
                        <button class="btn btn-info btn-block" type="submit">Сохранить
                            <i class="fa fa-save ml-1"></i>
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->
</div>
