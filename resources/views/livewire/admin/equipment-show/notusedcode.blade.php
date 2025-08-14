<div class="col-span-4">

                                            @isset($cmRequest->materialRequest->batchOrder)
                                            {{-- batchOrder hasOne relationship --}}

                                                    <div class="flex justify-between  bg-blue-100 p-3 my-1 rounded-md text-black">
                                                        <div class="">{{ $cmRequest->materialRequest->batchOrder->batch_no }}</div>
                                                        <div class="">{{ $cmRequest->materialRequest->batchOrder->receiving_date }}</div>

                                                        {{-- batch order items --}}

                                                            @if ($cmRequest->materialRequest->batchOrder->batchOrderitems->isNotEmpty())

                                                                    @foreach ($cmRequest->materialRequest->batchOrder->batchOrderitems as $bOrderItem)
                                                                             <div  class="flex items-center">{{ $bOrderItem->unit_price }}</div>
                                                                             <div  class="flex items-center">{{ $bOrderItem->total }}</div>
                                                                    @endforeach

                                                                 @else

                                                                 <div class="emptyData">BATCH ORDER IETMS NOT FOUND</div>

                                                            @endif


                                                    </div>

                                            @else

                                            {{-- if materialRequest doesn't have batchOrder --}}
                                             <div class="emptyData">BATCH ORDER NOT FOUND</div>

                                            @endisset

                                    </div>
