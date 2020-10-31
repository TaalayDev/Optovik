<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12">

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

                <form method="post" enctype="multipart/form-data" action="{{ route('wholesalers.add.products.request', \App\Http\Controllers\Wholesaler\WholesalerController::findFirst('base_name', auth()->user()->base_name)) }}" class="text-center border border-light p-5">
                    {{ csrf_field() }}

                    <!-- Name -->
                    <input type="text" class="form-control mb-4"
                           name="name" placeholder="Название" maxlength="20" required>

                    <!-- Info -->
                    <textarea class="form-control mb-4" name="description" placeholder="Описание" maxlength="191"></textarea>

                    <!-- Price -->
                    <input type="number" step="0.01" class="form-control mb-4"
                           name="price" placeholder="Цена" required>

                    <!-- Price -->
                    <input type="number" class="form-control mb-4"
                           name="quantity" placeholder="Количество" required>

                    <!-- Unit -->
                    <select class="form-control mb-4" name="unit">
                        <option value="sht">шт</option>
                        <option value="kг">кг</option>
                        <option value="lt">лт</option>
                    </select>

                    <input type="file" accept="image/*" name="images[]" class="form-control mb-4 clinp"
                           placeholder="Изображения" multiple required>

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
