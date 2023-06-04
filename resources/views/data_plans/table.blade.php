<div class="table-responsive text-nowrap">
    <table class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Network</th>
                <th scope="col">Amount</th>
                <th scope="col" class="text-center">Cost Price (&#8358;)</th>
                <th scope="col" class="text-center">Retail Price (&#8358;)</th>
                <th scope="col" class="text-center">Plan Type</th>
                <th scope="col" class="text-center">Validity</th>
                <th scope="col" class="text-center">Plan Code</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $value )
                    
            <tr>
              <td class="text-center">{{ $key + $allData->firstItem() }}</td>
              <th scope="row">{{ $value->network_name }}</th>
              <th scope="row">{{ $value->amount }}</th>
              <td class="text-center">{{ number_format($value->buying_price,0) }}</td>
              <td class="text-center">{{ number_format($value->selling_price,0) }}</td>
              <td class="text-center">{{ $value->plan_type }}</td>
              <td class="text-center">{{ $value->validity }}</td>
              <td class="text-center">{{ $value->plan_id }}</td>
              <td class="text-center">
                  <a class="btn btn-sm btn-primary my-1" href="{{route('stock.edit',$value->id)}}"> <i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-info my-1" href="{{route('inventory.copy',$value->id)}}"> <i class="fa fa-copy"></i></a>
                  <button class="btn btn-sm btn-danger delete1111" data-id="{{ $value->id }}"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          {{ $allData->links() }}
        </ul>
    </nav>