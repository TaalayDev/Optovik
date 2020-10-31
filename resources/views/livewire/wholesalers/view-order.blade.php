<div>
    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12">

            <!--Card-->
            <div class="card mb-4">

                <!-- Card header -->
                <div class="card-header text-center">
                    Заказ #{{$orderId}}
                </div>

                <!--Card content-->
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Клиент: {{$order->clientName()}}</li>
                        <li class="list-group-item">Дата: {{$order->date()}}</li>
                        <li class="list-group-item">Аддресс: </li>
                        <li class="list-group-item">Тел: </li>
                        <li class="list-group-item">Продукты: {{$order->prodCount()}}</li>
                        <li class="list-group-item">Сумма: {{$order->totalSumm()}}</li>
                    </ul>

                </div>

            </div>
            <!--/.Card-->


        </div>
        <!--Grid column-->

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
                            <th>Изоб.</th>
                            <th>Товар</th>
                            <th>Количество</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody id="products_tbody">
                        @php
                            $wopc = new \App\Http\Controllers\Wholesaler\WholesalerOrderProductsController(auth()->user()->base_name);
                            $products = $wopc->findBy('order_id', $orderId);
                        @endphp
                        @foreach( $products as $product )
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td><img src="data:image/png;base64, {{$product->getImage()}}" width="30px" height="30px"></td>
                                <td>{{$product->getName()}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->getPrice()}}</td>
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
    <!--Grid row-->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">

                <!--Card content-->
                <div class="card-body">

                    @if ( $order->state == 1 )
                        <button type="button" class="btn btn-primary" wire:click="complete()">Выполнить</button>
                    @elseif ( $order->state == 0 )
                        <button type="button" class="btn btn-light">Выполнен</button>
                    @endif

                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->
</div>
