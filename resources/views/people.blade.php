@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">

        <!-- People Table -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title pull-left">Osoby</span>
                <a href="{{ url('/add/person') }}" class="btn btn-default pull-right">
                    <i class="fa fa-plus"></i>
                </a>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">

                @if (count($people) > 0)
                <table class="table table-striped task-table">

                    <thead>
                        <th>Nazwisko</th>
                        <th>Imię</th>
                        <th>Miejscowość</th>
                        <th>Wiek</th>
                        <th>Płeć</th>
                        <th>Firma</th>
                        <th>Oddział firmy</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($people as $person)
                            <tr>
                                <!-- Last Name -->
                                <td class="table-text">
                                    <div>{{ $person->lastname }}</div>
                                </td>
                                <!-- First Name -->
                                <td class="table-text">
                                    <div>{{ $person->firstname }}</div>
                                </td>
                                <!-- City -->
                                <td class="table-text">
                                    <div>{{ $person->city->name }}</div>
                                </td>
                                <!-- Age -->
                                <td class="table-text">
                                    <div>{{ date_diff(date_create($person->birthdate), date_create('today'))->y }}</div>
                                </td>
                                <!-- Sex -->
                                <td class="table-text">
                                    @if (!strcasecmp(mb_substr($person->firstname, -1), "A"))
                                        <div>K</div>
                                    @else
                                        <div>M</div>
                                    @endif
                                </td>
                                <!-- Company -->
                                <td class="table-text">
                                    <div>{{ $person->companyBranch->company->name }}</div>
                                </td>
                                <!-- Company Branch -->
                                <td class="table-text">
                                    <div>{{ $person->companyBranch->name }}</div>
                                </td>

                                <!-- Edit Button -->
                                <td>
                                    <form action="{{ url('editperson/'.$person->id) }}" method="GET">
                                        {!! csrf_field() !!}

                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </form>
                                </td>


                                <!-- Delete Button -->
                                <td>
                                        {!! Form::model($person, ['method' => 'DELETE', 'route' => ['person.destroy', $person]]) !!}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="no-people">
                    <i class="fa fa-info-circle"></i>
                    <h2>Lista jest pusta</h2>
                    <p>Kliknij "+", aby dodać nową osobę.</p>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
