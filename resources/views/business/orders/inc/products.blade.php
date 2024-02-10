<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('routes.Add Order') }}</h3>


    </div>

    {{-- <div class="card-body table-responsive p-0"> --}}
      
    <form method="POST" action="{{ route('business.orders.orders_store') }}" class='needs-validation'
        novalidate>
        @csrf
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-body">
                    @foreach ($categories as $category)
                        <div class="accordion mb-2" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $category->id }}">
                                    <button class="accordion-button" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}"
                                        aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                                        {{ $category->name }}
                                    </button>
                                </h2>
                               
                                <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $category->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body"> 
                                      <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <th>{{ __('routes.Name') }}</th>
                                            <th>{{ __('routes.Price') }}</th>
                                            <th>{{ __('routes.Quantity') }}</th>
                                            <th>{{ __('routes.Actions') }}</th>
                                        </tr>
                                        <tr>
                                          @foreach ($category->products as $product )
                                          <div class="d-flex" id="product{{ $product->id }}">
                                           <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td> <a class="btn btn-sm btn-success px-1 add_product_btn" 
                                              id="product-{{$product->id }}" 
                                              data-name="{{ $product->name }}"
                                              data-price="{{ $product->sale_price }}"
                                              data-id="{{ $product->id }}"
                                              href="#">{{ __('routes.Add') }}</a></td>
                                           </tr>
                                          </div>
                                        @endforeach
                                        </tr>
        
                                    </table>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
          {{-- </div> --}}
        <div class="col-md-6 card-body row g-3">
            <div class="form-group  col-md-12">
                <label for="client_id">{{ __('routes.Client') }}</label>
                <select name="client_id" id="" class="form-control select2">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <table class="table table-bordered order-list" id="dynamicAddRemove">
                <tr>
                    <th>{{ __('routes.Product') }}</th>
                    <th>{{ __('routes.Quantity') }}</th>
                    <th>{{ __('routes.Price') }}</th>
                    <th>{{ __('routes.Actions') }}</th>
                </tr>

            </table>

            <input type="hidden" name="total_order" class="total_order"/>
            <div class="">

              {{ __('routes.Total') }}: <span class="total-orders"> {{ '0' }}</span>
            </div>
        </div>
      </div></div>


<div class="card-footer">
    <button type="submit" class="btn btn-primary disabled" id="add-order-btn">{{__('routes.Submit')}}</button>
</div>
</form>



{{-- </div> --}}
</div>
</div>

