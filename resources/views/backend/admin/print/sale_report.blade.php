@extends('backend.admin.print.app')
@section('title','Sale Report')
@push('printcss')

@endpush
@section('content')
    <div class="sub_heading">
        <h3>Sale Report</h3>
        <p class="date">{{ date('d-m-Y h:i:s A') }}</p>
        {{-- @if ($from_date || $category || $search)
            <p> {{ $from_date ?? '' ? "Date: $from_date to $to_date" : '' }}
                {{ $category ?? '' ? "Category: $category->name" : '' }}
                {{ $search ?? '' ? "Search By Keywords: $search" : '' }}
            </p>
        @endif --}}
        <p><strong>Report From:</strong>{{ format_date($data['from_date'])}} to {{format_date($data['to_date'])}}</p>
    </div>

    <div class="body">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th style="text-align: right">Amount </th>
                </tr>
            </thead>
            <tbody>
                @php
                     $total_income =0;
                @endphp
                @foreach ($orders as $key=>$item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ format_date($item->created_at)}} </td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->phone }}</td>
                        <td style="text-align: right">{{  $item->grand_total }}</td>
                    </tr>
                    @php
                        $total_income+=$item->grand_total;
                    @endphp
                @endforeach
                <tr class="total-row">
                    <td colspan="4" class="total-label">Total</td>
                    <td style="text-align: right">{{ formatWithComma($total_income) }}/-</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <p class="in_words">In words: {{ numberToWord($total_income) }} Taka</p>
    </div>
@endsection
