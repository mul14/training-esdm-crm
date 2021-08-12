@extends('layouts.master')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $key => $customer)
                <tr>
                    <td>{{ $customers->firstItem() + $key }}</td>
                    <td>
                        <a href="/customers/{{$customer->id}}/edit">
                            {{ $customer->name }}
                        </a>
                    </td>
                    <td>
                        <ul>
                            @if ($customer->emails)
                                @foreach($customer->emails as $email)
                                    <li>{{ $email->email }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if ($customer->phones)
                                @foreach($customer->phones as $phone)
                                    <li>{{ $phone->number }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if ($customer->companies)
                                @foreach($customer->companies as $company)
                                    <li>{{ $company->company }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$customers->links()}}

    </div>

@endsection
