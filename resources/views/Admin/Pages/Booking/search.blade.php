@extends('Admin.master')
@section('content')

<a href="" class="btn btn-success m-0" onclick="printContent('printDiv')">
    <span style="font-size: 0.9rem;">
        <i class="fas fa-print"></i>
    </span>
    Report
</a>

<a href="{{ route('bookings.list') }}" class="btn btn-info m-0">
    <span style="font-size: 0.9rem;">
        <i class="fas fa-sync-alt"></i>
    </span>
    Reset
</a>

<div class="container mt-0">
    <div class="table-responsive">
        <div id="printDiv">
            @if($bookings->first())
            <h2 class="text-center mb-2">{{ $bookings->first()->destination }} Booking List (TMS)</h2>
            @else
            <h2 class="text-center mb-2">Not Found</h2>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Package</th>
                        <th>Name</th>
                        <th>Destination</th>
                        <th>Adult</th>
                        <th>Child</th>
                        <th>Room</th>
                        <th>Payment</th>
                        <th>Amount</th>
                        <th>Tran_ID</th>
                        <th>Refund</th>
                        <th>Final Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalFinalAmount = 0;
                    $totalRefund = 0;
                    $totalQuantity = 0;
                    $totalSingleBed = 0;
                    $totalCoupleBed = 0;
                    $totalShareBed = 0;
                    ?>
                    @foreach($bookings as $key => $booking)
                    @if($booking->payment_status === "confirm")
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>TMS- {{ $booking->code }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->destination }}</td>
                        <td>{{ $booking->quantity }}</td>
                        <td>{{ $booking->child }}</td>

                        <td>
                            @if($booking->payment_status === 'confirm' && $booking->status !== 'canceled')
                                @if($booking->chooseroom === "Single Bed Room for Single Person")
                                    Single Bed
                                    <?php $totalSingleBed += ceil(((int)$booking->quantity + (int)$booking->child) / 1); ?>
                                @elseif($booking->chooseroom === "Couple Bed Room for Couple")
                                    Couple Bed
                                    <?php $totalCoupleBed += ceil(((int)$booking->quantity + (int)$booking->child) / 2); ?>
                                @elseif($booking->chooseroom === "Double Bed Room for Share")
                                    Double Bed
                                    <?php $totalShareBed += ceil(((int)$booking->quantity + (int)$booking->child) / 4); ?>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($booking->payment_status === "Pending")
                            <span class="text-danger">Pending</span>
                            @elseif($booking->payment_status === "confirm")
                            <span class="text-success">Confirm</span>
                            @endif
                        </td>
                        <td>{{ $booking->amount }}</td>
                        <td>{{ $booking->transaction_id }}</td>
                        <td>
                            @if($booking->status === 'canceled' && !$booking->refund_processed)
                            <a href="{{ route('refund', $booking->id) }}" class="btn btn-warning">Refund</a>
                            <?php
                                $refundAmount = $booking->amount * 0.8;
                                $totalRefund += $refundAmount;
                                ?>
                            {{ $refundAmount }} BDT
                            @elseif($booking->status === 'canceled' && $booking->refund_processed)
                            <?php
                                $refundAmount = $booking->amount * 0.8;
                                $totalRefund += $refundAmount;
                                ?>
                            {{ $refundAmount }} BDT
                            @else
                            -
                            @endif
                        </td>

                        <td>
                            @if($booking->refund_processed)
                            {{ $booking->amount * 0.2 }} BDT
                            <?php $totalFinalAmount += ($booking->amount * 0.2); ?>
                            @else
                            {{ $booking->amount }} BDT
                            <?php $totalFinalAmount += $booking->amount; ?>
                            @endif
                        </td>
                        <?php
                        if($booking->payment_status === 'confirm' && $booking->status !== 'canceled') {
                            $totalQuantity += ((int)$booking->quantity + (int)$booking->child);
                        }
                        ?>
                    </tr>
                    @endif
                    @endforeach

                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Refund:</strong></td>
                        <td colspan="3">{{ $totalRefund }} BDT</td>
                    </tr>
                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Final Amount:</strong></td>
                        <td colspan="3">{{ $totalFinalAmount }} BDT</td>
                    </tr>
                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Quantity:</strong></td>
                        <td colspan="3">{{ $totalQuantity }} Persons</td>
                    </tr>

                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Single Bed:</strong></td>
                        <td colspan="3">{{ $totalSingleBed }} Rooms</td>
                    </tr>
                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Couple Bed:</strong></td>
                        <td colspan="3">{{ $totalCoupleBed }} Rooms</td>
                    </tr>
                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Double Share Bed:</strong></td>
                        <td colspan="3">{{ $totalShareBed }} Rooms</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('printreport')
    <script type="text/javascript">
        function printContent(el) {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
@endpush
@endsection


