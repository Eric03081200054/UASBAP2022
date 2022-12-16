<?php
    use App\Models\Employee;
    $Employees = Employee::get();
    $json_data = array();
    foreach ($Employees as $Employee) {
        $json_data[$Employee->id] = $Employee->name;
    }
    $employee_data = json_encode($json_data);
?>

<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee' }}</label>
    <select required name="employee_id" class="form-control" id="employee_id" >
        @foreach (json_decode($employee_data, true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($employee->employee_id) && $employee->employee_id == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
</div>
<div class="form-group {{ $errors->has('nama_karyawan') ? 'has-error' : ''}}">
    <label for="nama_karyawan" class="control-label">{{ 'Nama Karyawan' }}</label>
    <input class="form-control" name="nama_karyawan" type="text" id="nama_karyawan" value="{{ isset($warning_letter->nama_karyawan) ? $warning_letter->nama_karyawan : ''}}" >
    {!! $errors->first('nama_karyawan', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('alasan_sp') ? 'has-error' : ''}}">
    <label for="alasan_sp" class="control-label">{{ 'Alasan Sp' }}</label>
    <input class="form-control" name="alasan_sp" type="text" id="alasan_sp" value="{{ isset($warning_letter->alasan_sp) ? $warning_letter->alasan_sp : ''}}" >
    {!! $errors->first('alasan_sp', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
