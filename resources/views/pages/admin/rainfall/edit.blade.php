<form class="forms" data-url="{{ url('admin/rainfall/'.$data->id) }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.edit')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf
        @method("PUT")
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun </label>
            <div class="col-sm-10">
                <select id="year" class="form-control" name="year" required>
                    <option disabled selected value="">--PILIH--</option>
                    @for ($i = 0; $i <= 5; $i++)
                        <option> {{ (now()->format("Y") - 5) + $i }} </option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Januari </label>
            <div class="col-sm-2">
                <input type="number" name="jan" class="form-control" value="{{ $data->jan }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">Februari </label>
            <div class="col-sm-2">
                <input type="number" name="feb" class="form-control" value="{{ $data->feb }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">Maret </label>
            <div class="col-sm-2">
                <input type="number" name="mar" class="form-control" value="{{ $data->mar }}" required/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">April </label>
            <div class="col-sm-2">
                <input type="number" name="apr" class="form-control" value="{{ $data->apr }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">Mei </label>
            <div class="col-sm-2">
                <input type="number" name="may" class="form-control" value="{{ $data->may }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">Jun </label>
            <div class="col-sm-2">
                <input type="number" name="jun" class="form-control" value="{{ $data->jun }}" required/>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Juli </label>
            <div class="col-sm-2">
                <input type="number" name="jul" class="form-control" value="{{ $data->jul }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">Agustus </label>
            <div class="col-sm-2">
                <input type="number" name="ags" class="form-control" value="{{ $data->ags }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">September </label>
            <div class="col-sm-2">
                <input type="number" name="sep" class="form-control" value="{{ $data->sep }}" required/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Oktober </label>
            <div class="col-sm-2">
                <input type="number" name="oct" class="form-control" value="{{ $data->sep }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">November </label>
            <div class="col-sm-2">
                <input type="number" name="nov" class="form-control" value="{{ $data->nov }}" required/>
            </div>
            <label class="col-sm-2 col-form-label">Desember </label>
            <div class="col-sm-2">
                <input type="number" name="des" class="form-control" value="{{ $data->des }}" required/>
            </div>
        </div>
        


    </div>
    <div class="modal-footer">

        <div class="loading" style="display: none;">
            <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px; margin-right:20px">
            </div>
        </div>

        <div class="button">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-reply-all"></i> @lang('main.button.cancel')</button>
            <button type="submit" class="btn btn-success "> <i class="fa fa-paper-plane"></i> @lang('main.button.save')</button>
        </div>
    </div>
</form>

<script>
    $("#year").val("{{ $data->year }}");
</script>