<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

            <!--Card content-->
            <div class="">

                @if ( $errors->any() )
                    <div class="alert alert-danger">
                        <ol>
                            @foreach( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif

                <form method="post" action="{{ route('stores.add.request') }}" class="text-center border border-light p-5">
                    <div class="divider-new spacing-divider">
                        <h6 class="text-center text-uppercase black-text">Магазин</h6>
                    </div>

                    {{ csrf_field() }}

                    <!-- Name -->
                    <input type="text" class="form-control mb-4"
                           name="name" placeholder="Название" maxlength="20">

                    <!-- Info -->
                    <textarea class="form-control mb-4" name="info" placeholder="Описание" maxlength="191"></textarea>

                    <!-- Phone -->
                    <input type="phone" class="form-control mb-4"
                           name="phone" placeholder="Телефон">

                    <!-- Phone -->
                    <input type="text" class="form-control mb-4"
                           name="address" placeholder="Адрес">

                    <!-- City -->
                    <select class="form-control mb-4" name="city">
                        @foreach( \App\Http\Controllers\CityController::getAll() as $city )
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>

                    <div class="divider-new black-divider">
                        <h6 class="text-center text-uppercase black-text mx-3">пользователь</h6>
                    </div>

                    <!-- User Name -->
                    <input type="text" class="form-control mb-4"
                           name="user_name" placeholder="Логин" maxlength="20" minlength="2" required>

                    <!-- User Email -->
                    <input type="email" class="form-control mb-4"
                           name="user_email" placeholder="Email" maxlength="50" minlength="5" required>

                    <!-- User Phone -->
                    <input type="number" class="form-control mb-4"
                           name="user_phone" placeholder="Телефон" required>

                    <input type="password" class="form-control mb-4 @if($pass != $conf_pass) note-danger @endif"
                           name="user_password" placeholder="Пароль" wire:model.debounce.500ms="pass" minlength="5" required>

                    @if($pass != $conf_pass)
                        <strong class="text-danger left">пароли должны совпадать</strong>
                    @endif
                    <input type="password" class="form-control mb-4 @if($pass != $conf_pass) note-danger @endif"
                           name="user_password_confirm" placeholder="Подтвердить пароль" wire:model.debounce.500ms="conf_pass">

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <!-- Send button -->
                        <button class="btn btn-info btn-block" type="submit" @if($pass != $conf_pass) disabled @endif>Сохранить
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
