@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @if(isset($person))
                    Edytuj osobę
                @else
                    Dodaj osobę
                @endif
            </div>

            <div class="panel-body">
                @include('common.errors')
                @if(isset($person))
                    <div id="company_id_helper" style="display: none"><?php echo $person->companyBranch->company_id ?></div>
                    <div id="company_branch_id_helper" style="display: none"><?php echo $person->company_branch_id ?></div>
                    <div id="city_id_helper" style="display: none"><?php echo $person->city_id ?></div>
                    {!! Form::model($person, ['method' => 'PATCH', 'route' => ['person.update', $person->id]]) !!}
                @else
                    {!! Form::open(['route' => 'person.store']) !!}
                @endif

                <div class="form-horizontal">

                <div class="form-group">
                    {!! Form::label('lastname', 'Nazwisko', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('firstname', 'Imię', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('birthdate', 'Data urodzenia', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::date('birthdate', null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('company_id', 'Firma', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::select('company_id',  App\Company::lists('name','id'), 'companyBranch->company->id', array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('company_branch_id', 'Oddział firmy', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::select('company_branch_id', array(), 'company_branch_id', array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('city_id', 'Miejscowość', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::select('city_id',  App\City::lists('name','id'), 'city->id', array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <!-- Save Button -->
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Zapisz
                        </button>
                        <!-- {{ Form::submit('Zapisz', ['name' => 'submit', 'class' => 'btn btn-success']) }} -->

                        <!-- Cancel Button -->
                        <a href="{{ url('/') }}" class="btn btn-default">
                            <i class="fa fa-close"></i> Anuluj
                        </a>
                        </ul>
                    </div>
                </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>

        </div>
    </div>
</div>

<script>
$(function() {

    if ($("#company_id_helper") != undefined) {
        $("[name=company_id]").val($("#company_id_helper").text());
        getBranches($("#company_id_helper").text(), function() {
            if ($("#company_branch_id_helper") != undefined) {
                $("[name=company_branch_id]").val($("#company_branch_id_helper").text());
                $("#company_branch_id_helper").remove();
            }
            $("#company_id_helper").remove();
        });
    }

    if ($("#city_id_helper") != undefined) {
        $("[name=city_id]").val($("#city_id_helper").text());
        $("#city_id_helper").remove();
    }

    //getBranches($("[name=company_id]").val());

    function getBranches(id, callback) {
        $.getJSON(
            "./../companyBranches?id="+id,
            function( data ) {
                $("[name=company_branch_id]").empty();
                html = '';
                $.each(data, function(index, element) {
                    html += '<option value="' + element.id + '">' + element.name + '</option>';
                });
                $("[name=company_branch_id]").append(html);
                callback();
            }
        );
    }

    $("body").on("change", "[name=company_id]", function() {
        console.log("ble");
        getBranches($("[name=company_id]").val());
    });

});
</script>

@endsection
