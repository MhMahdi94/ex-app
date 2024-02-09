<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Order</h3>


    </div>

    {{-- <div class="card-body table-responsive p-0"> --}}
      
    <form method="POST" action="{{ route('business.orders.orders_store') }}" class='needs-validation'
        novalidate>
        @csrf
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-body">
                    
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Name</th>
                            {{-- <th>Price</th>
                            <th>Quantity</th> --}}
                            <th>Action</th>
                        </tr>
                        
                            @foreach ($services as $service)
                           <tr>
                            <td>{{ $service->name }}</td>
                            {{-- <td>{{ $product->sale_price }}</td> --}}
                            {{-- <td>{{ $product->quantity }}</td> --}}
                            <td> <a class="btn btn-sm btn-success px-1 add_product_btn" 
                              id="service-{{$service->id }}" 
                              data-name="{{ $service->name }}"
                              {{-- data-price="{{ $product->sale_price }}" --}}
                              data-id="{{ $service->id }}"
                             >Add</a></td>
                           </tr>
                        @endforeach
                       

                    </table>
                    {{-- @endforeach --}}



                </div>
            </div>
          {{-- </div> --}}
        <div class="col-md-6 card-body row g-3">
            <div class="form-group  col-md-12">
                <label for="client_id">Client</label>
                <select name="client_id" id="" class="form-control select2">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <table class="table table-bordered order-list" id="dynamicAddRemove">
                <tr>
                    <th>Product</th>
                    {{-- <th>Quantity</th>
                    <th>Price</th> --}}
                    <th>Actions</th>
                </tr>

            </table>
            <div class="">
              {{-- Total: <span class="total-orders"> {{ '0' }}</span> --}}
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
