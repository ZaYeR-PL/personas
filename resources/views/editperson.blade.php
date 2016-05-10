@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edytuj osobę
            </div>

            <div class="panel-body">
                @include('common.errors')

                <form action="{{ url('person/'.$person->id) }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    @include('partials.personform')

                </form>
            </div>

        </div>
    </div>
</div>

<script>
$(function() {

    $("body").on("change", "#person-company", function() {
        $.getJSON(
            "\companyBranches?id="+$("#person-company").val(),
            //"{{ url('companyBranches')}}",
            function( data ) {
                $("#person-company-branch").empty();
                html = '';
                $.each(data, function(index, element) {
                    html += '<option value="' + element.id + '">' + element.name + '</option>';
                });
                $("#person-company-branch").append(html);
            }
        );
    });

});
</script>

@endsection
