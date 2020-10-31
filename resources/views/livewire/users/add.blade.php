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

                <form method="post" action="{{ route('console.users.add.request') }}" class="text-center border border-light p-5">

                    {{ csrf_field() }}

                    <div class="divider-new black-divider">
                        <h6 class="text-center text-uppercase black-text mx-3">пользователь</h6>
                    </div>

                    <!-- User Name -->
                    <input type="text" class="form-control mb-4"
                           name="name" placeholder="Логин" maxlength="20" minlength="2" required>

                    <!-- User Email -->
                    <input type="email" class="form-control mb-4"
                           name="email" placeholder="Email" maxlength="50" minlength="5" required>

                    <!-- User Phone -->
                    <input type="number" class="form-control mb-4"
                           name="phone" placeholder="Телефон" required>

                    <select name="role" id="roles" class="form-control mb-4" wire:model.debounce.150ms="role">
                        <option value="wholesaler">Оптовик</option>
                        <option value="store">Магазин</option>
                        <option value="user">Пользователь</option>
                        <option value="admin">Адмиин</option>
                    </select>

                    @if ( $role == 'wholesaler' || $role == 'store' )
                        <select name="base_name" class="form-control mb-4">
                            @if ( $role == 'wholesaler' )
                                @foreach( \App\Http\Controllers\Wholesaler\WholesalerController::getAll() as $item )
                                    <option value="{{$item->base_name}}">{{$item->name}}</option>
                                @endforeach
                            @elseif ( $role == 'store' )
                                @foreach( \App\Http\Controllers\Store\StoreController::getAll() as $item )
                                    <option value="{{$item->base_name}}">{{$item->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    @endif

                    <input type="password" class="form-control mb-4 @if($pass != $conf_pass) note-danger @endif"
                           name="password" placeholder="Пароль" wire:model.debounce.500ms="pass" minlength="5" required>

                    @if($pass != $conf_pass)
                        <strong class="text-danger left">пароли должны совпадать</strong>
                    @endif
                    <input type="password" class="form-control mb-4 @if($pass != $conf_pass) note-danger @endif"
                           name="password_confirm" placeholder="Подтвердить пароль" wire:model.debounce.500ms="conf_pass">

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <!-- Send button -->
                        <button class="btn btn-info btn-block" type="submit" @if($pass != $conf_pass) disabled @endif>
                            Сохранить
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
