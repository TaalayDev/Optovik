<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

            <!--Card content-->
            <div class="card-body">

                <form method="post" action="{{route('console.users.update.request', $uid)}}" class="text-center border border-light p-5">
                    {{--Body--}}
                    <div class="modal-body">
                        {{ csrf_field() }}

                        {{-- Name --}}
                        <input type="text" class="form-control mb-4"
                               name="name" placeholder="Логин" maxlength="20" value="{{$user->name}}" />
                        {{-- Email --}}
                        <input type="text" class="form-control mb-4"
                                   name="email" placeholder="Email" maxlength="20" value="{{$user->email}}" />
                        <!-- Phone -->
                        <input type="phone" class="form-control mb-4"
                               name="phone" placeholder="Телефон" maxlength="20" value="{{$user->phone}}">

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <!-- Send button -->
                        <button class="btn btn-info btn-block" type="submit">Сохранить
                            <i class="fa fa-save ml-1"></i>
                        </button>
                    </div>
                </form>

                <form method="post" action="{{route('console.users.update.request', $uid)}}" class="text-center border border-light p-5">
                    {{--Body--}}
                    <div class="modal-body">
                        {{ csrf_field() }}

                        {{-- Old Password --}}
                        <input type="password" id="oldpsw" class="form-control mb-4"
                               name="old_password" placeholder="Старый пароль">

                        {{-- New Password --}}
                        <input type="password" class="form-control mb-4"
                               name="password" placeholder="Новый пароль" @if(!$flag) disabled @endif>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <!-- Send button -->
                        <button class="btn btn-info btn-block" type="submit" @if(!$flag) disabled @endif>
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
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                $('#oldpsw').change(function () {
                    livewire.emit('checkPass', $(this).val());
                });
            });
        </script>
    @endpush
</div>
