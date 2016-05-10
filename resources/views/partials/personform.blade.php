
<?php echo $person ?>

<div class="form-group">
    <label for="person-lastname" class="col-sm-3 control-label">Nazwisko</label>

    <div class="col-sm-6">
        <input type="text" name="lastname" id="person-lastname" class="form-control" value="{{ old('lastname') }}">
    </div>
</div>

<div class="form-group">
    <label for="person-firstname" class="col-sm-3 control-label">Imię</label>

    <div class="col-sm-6">
        <input type="text" name="firstname" id="person-firstname" class="form-control" value="{{ old('firstname') }}">
    </div>
</div>

<div class="form-group">
    <label for="person-birthdate" class="col-sm-3 control-label">Data urodzenia</label>

    <div class="col-sm-6">
        <input type="date" name="birthdate" id="person-birthdate" class="form-control" value="{{ old('birthdate') }}">
    </div>
</div>

<div class="form-group">
    <label for="person-company" class="col-sm-3 control-label">Firma</label>

    <div class="col-sm-6">
        <select name="company_id" id="person-company" class="form-control" value="{{ old('company_id') }}">
            <option value=""></option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="person-company-branch" class="col-sm-3 control-label">Oddział firmy</label>

    <div class="col-sm-6">
        <select name="company_branch_id" id="person-company-branch" class="form-control" value="{{ old('company_branch_id') }}">
        </select>
    </div>
</div>

<div class="form-group">
    <label for="person-city" class="col-sm-3 control-label">Miejscowość</label>

    <div class="col-sm-6">
        <select name="city_id" id="person-city" class="form-control" value="{{ old('city_id') }}">
            <option value=""></option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        <!-- Save Button -->
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Zapisz
        </button>

        <!-- Cancel Button -->
        <a href="{{ url('/') }}" class="btn btn-default">
            <i class="fa fa-close"></i> Anuluj
        </a>
        </ul>
    </div>
</div>
